<?php
/**
 * User: aajahid
 * Date: 9/13/14
 * Time: 6:50 PM
 */
require('core.php');

if( !isset( $_POST['email'] ) || !isset($_POST['password']) ) {
    return('login.php');
}

$email = cleanData($_POST['email']);
$password = cleanData($_POST['password']);
$remember_me = isset( $_POST['remember_me'] ) ? true : false;

$login = $session->login($email,$password,$remember_me);

if($login) {
    if( $_SESSION['loginType'] == 'admin' ){
        redirect('dashboard.php');
    } else {
        redirect('view.php');
    }
}

redirect('login.php');