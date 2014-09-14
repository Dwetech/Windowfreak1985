<?php
/**
 * User: aajahid
 * Date: 9/13/14
 * Time: 6:50 PM
 */
require('core.php');
$session->loginRequired('user',false);
$Form = new Form();
$Email = new Email();

if( !isset( $_POST['submit'] )) {
    redirect('view.php');
} else{

    if( !isset( $_POST['first_name'] ) || empty($_POST['first_name']) ) {
        $Form->setError('error','Fill The form perfectly.');
    }
    if( !isset( $_POST['last_name'] ) || empty($_POST['last_name']) ) {
        $Form->setError('error','Fill The form perfectly.');
    }
    if( !isset( $_POST['lead_result'] ) || empty($_POST['lead_result']) ) {
        $Form->setError('error','Fill The form perfectly.');
    }

    if($_POST['lead_result'] == 'Y'){
        if( !isset( $_POST['call_time'] ) || empty($_POST['call_time']) ) {
            $Form->setError('leadsError','Please select call time and give us your number.');
        }
        if( !isset( $_POST['phone_no'] ) || empty($_POST['phone_no']) ) {
            $Form->setError('leadsError','Please select call time and give us your number.');
        }
    }

    if( $Form->num_errors > 0 ) {
        $Form->return_msg_to('view.php');
    } else {

        $first_name = cleanData($_POST['first_name']);
        $last_name = cleanData($_POST['last_name']);
        $lead_result = cleanData($_POST['lead_result']);
        $call_time = cleanData($_POST['call_time']);
        $phone_no = cleanData($_POST['phone_no']);
        $notes = cleanData($_POST['notes']);

        $leadAdd = insertQuery(TBL_LEADS, array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'lead_result' => $lead_result,
            'call_time' => $call_time,
            'phone_no' => $phone_no,
            'notes' => $notes,
            'create_date' => 'NOW()'
        ));


        if( !$leadAdd ) {
            $Form->setError('error','Database error! Please try again.');
            $Form->return_msg_to('view.php');
        } else {
//
//            if($lead_result == 'Y'){
//
//                $Email->setEmailTo('');
//                $Email->sendMail();
//            }


            $Form->setError('success','New Leads added successfully');
            $Form->return_msg_to('view.php');
        }

    }
}
