<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('../../core.php');
$session->loginRequired('admin',false);
$Form = new Form();

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
    $user_check_query = mysql_query('SELECT * FROM '.TBL_USER.' WHERE email="'.cleanData($_POST['email']).'"');
    if( mysql_num_rows($user_check_query) > 0 ) {
        $Form->setError('error','User with '.$_POST['email'].' is already exist!');
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


// Agency
if( !isset( $_POST['agency'] ) || empty($_POST['agency']) ) {
    $Form->setError('error','Please select a agency');
}

/**
 * Error Found!
 * Redirect back to form page
 */
if( $Form->num_errors > 0 ) {
    $Form->return_msg_to('add-a-user.php');
}



$first_name = cleanData($_POST['first_name']);
$last_name  = cleanData($_POST['last_name']);
$email      = cleanData($_POST['email']);
$password   = cleanData($_POST['password']);
$phone      = cleanData($_POST['phone']);
$agency     = cleanData($_POST['agency']);


$userAdd = insertQuery(TBL_USER, array(
    'type' => 'user',
    'agency_id' => $agency,
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'password' => $password,
    'phone_no' => $phone,
    'create_date' => 'NOW()'
));

if( !$userAdd ) {
    $Form->setError('error','Database error! Please try again.');
    $Form->return_msg_to('add-a-user.php');
} else {
    $Form->setError('success','New user added successfully');
    $Form->return_msg_to('user.php');
}
