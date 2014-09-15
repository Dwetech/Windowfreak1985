<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
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
        redirect(WEBSITE_URL.'admin/dashboard.php');
    } else {
        redirect('view.php');
    }
}

redirect('login.php');