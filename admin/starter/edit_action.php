<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */

include '../../core.php';
$session->loginRequired('admin', false);
$form = new Form();


if (!isset($_POST['starter_id'])) {

    $form->setError('starter_error', 'Please select a starter!');
    $form->return_msg_to('starters.php');
}

if (isset($_POST['delete_starter']) && $_POST['delete_starter'] == 'DELETE') {


    $starter_id = $_POST['starter_id'];

    if (sizeof($starter_id) <= 0) {

        $form->setError('starter_error', 'Please select a conversation to delete!');
        $form->return_msg_to('starters.php');
    }

    foreach ($starter_id as $id) {
        mysql_query("DELETE FROM starter WHERE `id`=$id");
    }


    $form->setError('starter_success', 'Conversation(s) deleted successfully!');
    $form->return_msg_to('starters.php');
} else if (isset($_POST['edit_starter']) && $_POST['edit_starter'] == 'EDIT') {

    $starter_id = $_POST['starter_id'];

    if (sizeof($starter_id) <= 0) {

        $form->setError('starter_error', 'Please select a conversation to edit!');
        $form->return_msg_to('starters.php');
    }

    $id = is_array($starter_id) ? $starter_id[0] : $starter_id;


    if (is_array($starter_id)) {

        $form->return_msg_to('edit-starter.php?id=' . $id);
    } else {

        $starter = cleanData($_POST['starter']);
        
        if($starter == '') {
            
            $form->setError('starter_error', 'You cannot create empty conversation!');
            $form->return_msg_to('edit-starter.php?id=' . $id);
        }
        
        $result = mysql_query('UPDATE starter SET `starter`="' . $starter . '" WHERE id=' . $id);
        if (!$result) {

            $form->setError('starter_error', 'Conversation edit failed! Please try again.');
            $form->return_msg_to('edit-starter.php?id=' . $id);
        } else {

            $form->setError('starter_success', 'Conversation updated successfully!');
            $form->return_msg_to('starters.php');
        }
    }
} else {

    $form->return_msg_to('starters.php');
}