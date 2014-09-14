<?php

require('../../core.php');
$session->loginRequired('admin', false);
$Form = new Form();




if (!isset($_GET['id'])) {

    $Form->setError('error', 'No User ID Found!');
    $Form->return_msg_to('administrator.php');
}

$id = cleanData($_GET['id']);
$data = mysql_fetch_object(mysql_query('SELECT * FROM user WHERE id="' . $id . '"'));



if ($data === FALSE) {

    $Form->setError('error', 'No User ID Found!');
    $Form->return_msg_to('administrator.php');
}


if (isset($_GET['receive_email'])) {
    
    if ($_GET['receive_email'] == 'N') {
        $receive_email = 'N';
    } else {
        $receive_email = 'Y';
    }
} else {
    $receive_email = 'Y';
}


$result = mysql_query('UPDATE `user` SET `receive_email`="' . $receive_email . '" WHERE id="' . $id . '"');
echo $result;