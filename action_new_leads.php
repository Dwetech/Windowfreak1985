<?php

/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('core.php');
$session->loginRequired('user', false);
$Form = new Form();
$Email = new Email();

if (!isset($_POST['submit'])) {

    redirect('view.php');
} else {

    if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
        $Form->setError('error', 'Please write your first name.');
    }
    if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
        $Form->setError('error', 'Please write your last name.');
    }
    if (!isset($_POST['lead_result']) || empty($_POST['lead_result'])) {
        $Form->setError('error', 'Please select a lead result.');
    }

    if ($_POST['lead_result'] == 'Y') {
        if (!isset($_POST['call_time']) || empty($_POST['call_time'])) {
            $Form->setError('leadsError', 'Please select call time and give us your number.');
        }
        if (!isset($_POST['phone_no']) || empty($_POST['phone_no'])) {
            $Form->setError('leadsError', 'Please select call time and give us your number.');
        }
    }

    if ($Form->num_errors > 0) {

        $Form->return_msg_to('view.php');
    } else {

        $first_name = cleanData($_POST['first_name']);
        $last_name = cleanData($_POST['last_name']);
        $lead_result = cleanData($_POST['lead_result']);
        $call_time = cleanData($_POST['call_time']);
        $phone_no = cleanData($_POST['phone_no']);
        $notes = cleanData($_POST['notes']);

        $leadAdd = insertQuery(TBL_LEADS, array(
            'user_id' => $_SESSION['user_id'],
            'first_name' => $first_name,
            'last_name' => $last_name,
            'lead_result' => $lead_result,
            'call_time' => $call_time,
            'phone_no' => $phone_no,
            'notes' => $notes,
            'create_date' => 'NOW()'
        ));


        if (!$leadAdd) {

            $Form->setError('error', 'Database error! Please try again.');
            $Form->return_msg_to('view.php');
        } else {

            if ($lead_result == 'Y') {

                $leadData = mysql_fetch_object(mysql_query("SELECT agency.agency_name, leads.first_name, leads.last_name, leads.phone_no, leads.call_time, leads.notes FROM leads LEFT JOIN user ON user.id = leads.user_id LEFT JOIN agency ON agency.id = user.agency_id WHERE leads.id = $leadAdd"));
                
                $Email->setEmailSubject('A new lead has been submitted.');
                $Email->setMessage("A new lead has been submitted for agency <b>$leadData->agency_name</b> by <b>$leadData->first_name $leadData->last_name</b> with following info:<br/><br/>"
                        . "<b>Phone       :</b> $leadData->phone_no <br/>"
                        . "<b>Time to Call:</b> $leadData->call_time <br/>"
                        . "<b>Note         :</b> $leadData->notes. ");
                
                $sentMailQuery = mysql_query("SELECT email FROM user WHERE type='admin' AND receive_email ='Y'");

                while ($sentMail = mysql_fetch_assoc($sentMailQuery)) {

                    $Email->setEmailTo($sentMail['email']);
                    $Email->sendMail();
                }
            }


            redirect('view.php?leads=success');
        }
    }
}
