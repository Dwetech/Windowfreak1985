<?php
/**
 * User: aajahid
 * Date: 9/13/14
 * Time: 8:30 PM
 */
require('../../core.php');
$session->loginRequired('admin',false);
$Form = new Form();


echo '<pre>';
print_r($_POST);

//Agency ID
if( !isset($_POST['agency_id']) || empty($_POST['agency_id']) ) {
    
    $Form->setError('error','No Agency ID Found!');
    $Form->return_msg_to('user.php');
} else {
    
    $agency_query = mysql_query("SELECT * FROM ".TBL_AGENCY." WHERE id='".cleanData($_POST['agency_id'])."'");

    if( mysql_num_rows($agency_query) < 1 ) {
        
        $Form->setError('error', 'No agency found!');
        $Form->return_msg_to('user.php');
    }
}


// First Name
if( !isset( $_POST['agency_name'] ) || empty($_POST['agency_name']) ) {
    $Form->setError('error','Please write Agency Name');
}
// Last Name
if( !isset( $_POST['primary_contact'] ) || empty($_POST['primary_contact']) ) {
    $Form->setError('error','Please write Primary Contact');
}

// Email
if( !isset( $_POST['email'] ) || empty($_POST['email']) ) {
    $Form->setError('error','Please write agency Email address');
} elseif( !is_valid_email($_POST['email']) ) {
    $Form->setError('error','Please write a valid Email address');
} else {
    $user_check_query = mysql_query('SELECT * FROM '.TBL_AGENCY.' WHERE email="'.cleanData($_POST['email']).'" AND id != "'.cleanData($_POST['agency_id']).'"');
    if( mysql_num_rows($user_check_query) > 0 ) {
        $Form->setError('error','Agency with '.$_POST['email'].' is already exist!');
    }
}

// Phone Number
if( !isset( $_POST['phone_no'] ) || empty($_POST['phone_no']) ) {
    $Form->setError('error','Please write agency Phone Number');
}


/**
 * Error Found!
 * Redirect back to form page
 */
if( $Form->num_errors > 0 ) {
    $Form->return_msg_to('edit_agency.php');
}


$agency_id    = cleanData($_POST['agency_id']);
$agency_name = cleanData($_POST['agency_name']);
$primary_contact  = cleanData($_POST['primary_contact']);
$email      = cleanData($_POST['email']);
$phone_no   = cleanData($_POST['phone_no']);


$update_data = array(
    'agency_name' => $agency_name,
    'primary_contact' => $primary_contact,
    'email' => $email,
    'phone_no' => $phone_no
);

$update = updateQuery(TBL_AGENCY, $update_data, 'id="'.$agency_id.'"');


if( !$update ) {
    $Form->setError('error','Database error! Please try again.');
    $Form->return_msg_to('edit_agency.php');
} else {
    $Form->setError('success','Agency updated successfully');
    $Form->return_msg_to('user.php');
}
