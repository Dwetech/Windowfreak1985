<?php
/**
 * User: aajahid
 * Date: 9/13/14
 * Time: 6:50 PM
 */
require('../../core.php');
$session->loginRequired('admin',false);
$Form = new Form();

if( !isset( $_POST['submit'] )) {
    redirect('view.php');
} else{

    if( !isset( $_POST['description'] ) || empty($_POST['description']) ) {
        $Form->setError('error','Fill The form perfectly.');
    }


    if( !isset( $_FILES['file'] ) || empty($_FILES['file']) ) {
        $Form->setError('error','Fill The form perfectly.');
    } else{
        $Upload = new upload($_FILES['file']);
        if($Upload->extension!="jpg" && $Upload->extension!="jpeg" && $Upload->extension!="png" && $Upload->extension!="jpg"){
            $Form->setError('extension','Only images can be uploaded.');
        }
    }



    if( $Form->num_errors > 0 ) {
        $Form->return_msg_to('add-banner.php');
    } else {


//        save Image
        $Upload->saveImage();

        $file_name = $Upload->basename;
        $description = cleanData($_POST['description']);

        $bannerAdd = insertQuery(TBL_BANNER, array(
            'file_name' => $file_name,
            'description' => $description,
            'create_date' => 'NOW()'
        ));


        if( !$bannerAdd ) {
            $Form->setError('error','Database error! Please try again.');
            $Form->return_msg_to('add-banner.php');
        } else {
            $Form->setError('success','New Banner added successfully');
            $Form->return_msg_to('add-banner.php');
        }

    }
}
