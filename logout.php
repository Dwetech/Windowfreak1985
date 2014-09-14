<?php
/**
 * User: aajahid
 * Date: 9/13/14
 * Time: 6:50 PM
 */
require('core.php');

$logout = $session->logout();
redirect('login.php');