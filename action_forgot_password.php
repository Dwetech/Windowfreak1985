<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('core.php');
$Form = new Form();
$Email = new Email();

if( !isset( $_POST['submit'] )) {
    redirect('forgot_password.php');
} else{

    if( !isset( $_POST['email'] ) || empty($_POST['email']) ) {
        $Form->setError('email','Please write your email address');
    }


    if( $Form->num_errors > 0 ) {
        $Form->return_msg_to('forgot_password.php');
    } else {

        $email = cleanData($_POST['email']);
        $user = mysql_fetch_assoc(mysql_query("SELECT * FROM ".TBL_USER." WHERE email=".$email));


        $Email->setEmailSubject('Forgot Password');
        $Email->setMessage('Your password is '.$user['password']);

        $Email->setEmailTo($email);
        $Email->sendMail();


        $Form->setError('success','Your password has been sent to your email. Please check your mails.');
        $Form->return_msg_to('forgot_password.php');

    }
}
