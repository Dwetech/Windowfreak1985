<?php

/*
  Created on : Sep 14, 2014, 1:12:04 PM
  Author        : me@rafi.pro
  Name         : Mohammad Faozul Azim Rafi
 */

require('../../core.php');

$session->loginRequired('admin', false);

$Form = new Form();

if (isset($_POST['delete_agency']) && $_POST['delete_agency'] == 'DELETE') {


    $agency_id = $_POST['agency_id'];

    if (sizeof($agency_id) <= 0) {

        $Form->setError('error', 'Please select an agency to delete!');
        $Form->return_msg_to('user.php');
    }

    foreach ($agency_id as $id) {
        mysql_query("DELETE FROM " . TBL_AGENCY . " WHERE `id`=$id");
    }


    $Form->setError('success', 'Agency(s) deleted successfully!');
    $Form->return_msg_to('user.php');
} else if (isset($_POST['edit_agency']) && $_POST['edit_agency'] == 'EDIT') {

    $agency_id = $_POST['agency_id'];

    if (sizeof($agency_id) <= 0) {

        $Form->setError('error', 'Please select an agency to edit!');
        $Form->return_msg_to('user.php');
    }

    $id = $agency_id[0];

    redirect('edit_agency.php?id=' . $id);
}