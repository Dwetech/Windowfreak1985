<?php

require('../../core.php');

$session->loginRequired('admin', false);

$Form = new Form();


if (!isset($_POST['id'])) {

    $Form->setError('error', 'Please select a admin!');
    $Form->return_msg_to('administrator.php');
}

if (isset($_POST['delete_admin']) && $_POST['delete_admin'] == 'DELETE') {


    $id = $_POST['id'];

    if (sizeof($id) <= 0) {

        $Form->setError('error', 'Please select an admin to delete!');
        $Form->return_msg_to('administrator.php');
    }

    foreach ($id as $id) {
        mysql_query("DELETE FROM " . TBL_USER . " WHERE `id`=$id");
    }


    $Form->setError('success', 'Admin(s) deleted successfully!');
    $Form->return_msg_to('administrator.php');
} else if (isset($_POST['edit_admin']) && $_POST['edit_admin'] == 'EDIT') {

    $id = $_POST['id'];

    if (sizeof($id) <= 0) {

        $Form->setError('error', 'Please select an admin to edit!');
        $Form->return_msg_to('administrator.php');
    }

    $id = $id[0];

    redirect('edit_administrator.php?id=' . $id);
}