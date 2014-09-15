<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 11:37 AM
 */

include 'core.php';

if(isset($_SESSION['loginType'])) {
    if( $_SESSION['loginType'] == 'admin' ){
        redirect(WEBSITE_URL.'admin/dashboard.php');
    } else {
        redirect('view.php');
    }
}

redirect('login.php');