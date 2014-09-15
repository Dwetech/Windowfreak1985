<?php

/*
  Created on : Sep 15, 2014, 3:40:02 PM
  Author        : me@rafi.pro
  Name         : Mohammad Faozul Azim Rafi
 */
include '../../core.php';
$session->loginRequired('admin', false);
$Form = new Form();


if (!isset($_POST['id'])) {

    $Form->setError('error', 'You must select a banner to delete!');
    $Form->return_msg_to('banner.php');
}

$id = cleanData($_POST['id']);

$result = mysql_fetch_array(mysql_query('SELECT * FROM ' . TBL_BANNER . ' WHERE id="' . $id . '"'));


if ($result == FALSE) {

    $Form->setError('error', 'Banner id not found!');
    $Form->return_msg_to('banner.php');
}


$delete_result = mysql_query('DELETE FROM ' . TBL_BANNER . ' WHERE id="' . $id . '"');

if ($delete_result) {

    if (file_exists(UPLOAD_DIR . $result['file_name'])) {

        unlink(UPLOAD_DIR . $result['file_name']);
    }
    
    $Form->setError('success', 'Banner delete success!');
    $Form->return_msg_to('banner.php');
}

$Form->setError('success', 'Banner delete failed!');
$Form->return_msg_to('banner.php');
