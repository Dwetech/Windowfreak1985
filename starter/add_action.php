<?php

/*
  Created on : Sep 13, 2014, 6:31:54 PM
  Author        : me@rafi.pro
  Name         : Mohammad Faozul Azim Rafi
 */

include '../core.php';

$form = new Form();

if (isset($_POST['submit_starter']) && $_POST['submit_starter'] == 'ADD') {

    $starter = cleanData($_POST['starter']);

    if ($starter != '') {

        $status = mysql_query("INSERT INTO starter (`starter`, `create_date`) VALUES ('$starter', NOW())");

        if ($status) {

            $form->setError('starter_success', 'Conversation added successfully!');
            $form->return_msg_to(WEBSITE_URL . 'starter/add-starter.php');
        }
    } else {

        $form->setError('starter_error', 'Please enter some value!');
        $form->return_msg_to(WEBSITE_URL . 'starter/add-starter.php');
    }
} else {

    $form->return_msg_to(WEBSITE_URL . 'starter/add-starter.php');
}