<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('../../core.php');
$session->loginRequired('admin', false);
$Form = new Form();


if (!isset($_GET['id'])) {

    $Form->setError('error', 'No User ID Found!');
    $Form->return_msg_to('administrator.php');
}

$id = cleanData($_GET['id']);
$data = mysql_fetch_object(mysql_query('SELECT * FROM user WHERE id="' . $id . '" AND type="admin"'));


if ($data === FALSE) {

    $Form->setError('error', 'No User ID Found!');
    $Form->return_msg_to('administrator.php');
}


$receive_email = $_GET['receive_email'];


$result = mysql_query('UPDATE `user` SET `receive_email`="' . $receive_email . '" WHERE id="' . $id . '" AND type="admin"');
echo $result;