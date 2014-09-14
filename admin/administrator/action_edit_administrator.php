<?php
require('../../core.php');
$session->loginRequired('admin',false);
$Form = new Form();


//User ID
if( !isset($_POST['id']) || empty($_POST['id']) ) {
    
    $Form->setError('error','No Admin ID Found!');
    $Form->return_msg_to('administrator.php');
} else {
    
    $user_query = mysql_query("SELECT * FROM ".TBL_USER." WHERE id='".cleanData($_POST['id'])."'");

    if( mysql_num_rows($user_query) < 1 ) {
        
        $Form->setError('error', 'No admin found!');
        $Form->return_msg_to('administrator.php');
    }
}


// First Name
if( !isset( $_POST['first_name'] ) || empty($_POST['first_name']) ) {
    $Form->setError('error','Please write user First Name');
}

// Last Name
if( !isset( $_POST['last_name'] ) || empty($_POST['last_name']) ) {
    $Form->setError('error','Please write user Last Name');
}

// Email
if( !isset( $_POST['email'] ) || empty($_POST['email']) ) {
    $Form->setError('error','Please write user Email address');
} elseif( !is_valid_email($_POST['email']) ) {
    $Form->setError('error','Please write a valid Email address');
} else {
    $user_check_query = mysql_query('SELECT * FROM '.TBL_USER.' WHERE email="'.cleanData($_POST['email']).'" AND id != "'.cleanData($_POST['id']).'"');
    if( mysql_num_rows($user_check_query) > 0 ) {
        $Form->setError('error','Admin with '.$_POST['email'].' is already exist!');
    }
}

// Password
if( !isset( $_POST['password'] ) || empty($_POST['password']) ) {
    $Form->setError('error','Please write user password');
}


// Password
if( !isset( $_POST['phone'] ) || empty($_POST['phone']) ) {
    $Form->setError('error','Please write user phone number');
}



/**
 * Error Found!
 * Redirect back to form page
 */
if( $Form->num_errors > 0 ) {
    $Form->return_msg_to('edit_administrator.php?id=' . cleanData($_POST['id']));
}


$id    = cleanData($_POST['id']);
$first_name = cleanData($_POST['first_name']);
$last_name  = cleanData($_POST['last_name']);
$email      = cleanData($_POST['email']);
$password   = cleanData($_POST['password']);
$phone      = cleanData($_POST['phone']);
$receive_email     = cleanData($_POST['receive_email']);


$update_data = array(
    'receive_email' => $receive_email,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'password' => $password,
    'phone_no' => $phone
);

$update = updateQuery(TBL_USER, $update_data, 'id="'.$id.'"');

if( !$update ) {

    $Form->setError('error','Database error! Please try again.');
    $Form->return_msg_to('edit_administrator.php?id=' . cleanData($_POST['id']));
} else {
    
    $Form->setError('success','Admin updated successfully');
    $Form->return_msg_to('administrator.php');
}
