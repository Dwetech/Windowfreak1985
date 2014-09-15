<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('../core.php');
$session->loginRequired('admin',false);

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=All Leads.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array(
        'Lead Name (last, first)',
        'Lead Phone',
        'Time To Call',
        'Yes/No',
        'Date',
        'Notes',
        'Username(last, first)',
        'User Email',
        'Agency Name',
        'Agency Primary Contact',
        'Agency Email',
        'Agency Phone')
);
$leads_sql = "SELECT
                l.*,
                u.first_name as user_first_name,
                u.last_name as user_last_name,
                u.email as user_email,
                a.agency_name,
                a.primary_contact,
                a.email as agency_email,
                a.phone_no as agency_phone
             FROM
                " . TBL_LEADS . " l
             LEFT JOIN ".TBL_USER." u
                ON (l.user_id=u.id)
             LEFT JOIN ".TBL_AGENCY." a
                ON (u.agency_id=a.id)
             ORDER BY l.id DESC";
$leads_query = mysql_query($leads_sql);

while( $leadsData  = mysql_fetch_assoc($leads_query) ) {
    fputcsv($output, array(
        $leadsData['last_name'].', '.$leadsData['first_name'],
        $leadsData['phone_no'],
        $leadsData['call_time'],
        $leadsData['lead_result'] == 'Y' ? 'YES -  call them' : 'NO - don\'t call them',
        $leadsData['create_date'],
        $leadsData['notes'],
        $leadsData['user_last_name'].', '.$leadsData['user_first_name'],
        $leadsData['user_email'],
        $leadsData['agency_name'],
        $leadsData['primary_contact'],
        $leadsData['agency_email'],
        $leadsData['agency_phone']
        )
    );
}