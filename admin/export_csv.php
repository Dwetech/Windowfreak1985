<?php
/**
 * User: aajahid
 * Date: 9/14/14
 * Time: 5:14 PM
 */
require('../core.php');
$session->loginRequired('admin',false);

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=All Leads.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('FIRST NAME', 'LAST NAME', 'PHONE NUMBER', 'TIME TO CALL', 'YES/NO', 'DATE/TIME', 'USER(FIRST LAST)', 'AGENCY'));
$leads_sql = "SELECT
                l.*,
                u.first_name as user_first_name,
                u.last_name as user_last_name,
                a.agency_name
             FROM
                " . TBL_LEADS . " l
             LEFT JOIN ".TBL_USER." u
                ON (l.user_id=u.id)
             LEFT JOIN ".TBL_AGENCY." a
                ON (u.agency_id=a.id)
             ORDER BY l.id DESC";
$leads_query = mysql_query($leads_sql);

while( $leadsData  = mysql_fetch_assoc($leads_query) ) {
    fputcsv($output, array($leadsData['first_name'], $leadsData['last_name'], $leadsData['phone_no'], $leadsData['call_time'], $leadsData['lead_result'] == 'Y' ? 'YES -  call them' : 'NO - don\'t call them', $leadsData['create_date'], $leadsData['user_first_name'].' '.$leadsData['user_last_name'], $leadsData['agency_name']));
}