<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('core.php');
$Form = new Form();

if( !isset( $_POST['submit'] )) {
    redirect('login.php');
} else{

    if( !isset( $_POST['email'] ) || empty($_POST['email']) ) {
        $Form->setError('error','Your email or password is incorrect.');
    }
    if( !isset( $_POST['password'] ) || empty($_POST['password']) ) {
        $Form->setError('error','Your email or password is incorrect.');
    }

    if( $Form->num_errors > 0 ) {
        $Form->return_msg_to('login.php');
    } else {

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
        } else{
            $Form->setError('error','Database Error!');
            $Form->return_msg_to('login.php');
        }

    }
}
