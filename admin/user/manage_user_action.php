<?php

require('../../core.php');

$session->loginRequired('admin', false);

$Form = new Form();


if (!isset($_POST['users'])) {

    $Form->setError('error', 'Please select a user!');
    $Form->return_msg_to('user.php');
}


if (isset($_POST['delete_user'])) {

    $users = $_POST['users'];

    if (sizeof($users) <= 0) {

        $Form->setError('error', 'Please select a user to delete!');
        $Form->return_msg_to('user.php');
    }

    foreach ($users as $user_id) {
        mysql_query("DELETE FROM " . TBL_USER . " WHERE `id`=$user_id");
    }


    $Form->setError('success', 'User(s) deleted successfully!');
    $Form->return_msg_to('user.php');
} elseif (isset($_POST['edit_user'])) {

    $users = $_POST['users'];

    if (sizeof($users) <= 0) {

        $Form->setError('error', 'Please select a user to Edit!');
        $Form->return_msg_to('user.php');
    }

    $id = $users[0];

    redirect('edit_user.php?id=' . $id);
}
redirect('user.php');
