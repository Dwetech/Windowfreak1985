<?php

/*
  Created on : Sep 13, 2014, 8:24:06 PM
  Author        : me@rafi.pro
  Name         : Mohammad Faozul Azim Rafi
 */

include '../../core.php';

$form = new Form();

if (isset($_POST['add_agency']) && $_POST['add_agency'] == 'ADD') {


    $name = cleanData($_POST['name']);
    $contact = cleanData($_POST['contact']);
    $email = cleanData($_POST['email']);
    $phone = cleanData($_POST['phone']);
    

    if ($name == '') {
        
        $form->setError('agency_error', 'Agency Name is required!');
        $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
    }
    
    if ($contact == '') {
        
        $form->setError('agency_error', 'Primary Contact is required!');
        $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
    }
    
    if ($email == '' || !is_valid_email($email)) {
        
        $form->setError('agency_error', 'Agency Email is required and must be valid!');
        $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
    }
    
    if ($phone == '') {
        
        $form->setError('agency_error', 'Phone is required!');
        $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
    }



    
        $status = mysql_query("INSERT INTO agency (`agency_name`, `primary_contact`, `email`, `phone_no`, `create_date`) VALUES ('$name', '$contact', '$email', '$phone', NOW())");

        if ($status) {

            $form->setError('agency_success', 'Conversation added successfully!');
            $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
        } else {
            
            $form->setError('agency_error', 'Agency add failed! Please try again.');
            $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
        }
} else {

    $form->return_msg_to(WEBSITE_URL . 'admin/user/add-an-agency.php');
}