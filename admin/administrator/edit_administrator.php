<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
include '../../core.php';
$session->loginRequired('admin');

$Form = new Form();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    
    $Form->setError('error', 'No admin ID found!');
    $Form->return_msg_to('administrator.php');
}


$id = cleanData($_GET['id']);

$admin_query = mysql_query("SELECT * FROM " . TBL_USER . " WHERE id = '" . $id . "' LIMIT 1");

if (mysql_num_rows($admin_query) < 1) {
    
    $Form->setError('error', 'No admin found with given ID!');
    $Form->return_msg_to('administrator.php');
}


$admin_data = mysql_fetch_assoc($admin_query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - Edit Administrator</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo CSS; ?>/bootstrap.css" type="text/css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

        <!--font css-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

        <!-- style sheet css -->
        <link href="<?php echo CSS; ?>/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="<?php echo WEBSITE_URL ?>style.css" type="text/css"/>
        <script type="text/javascript" src="<?php echo JS; ?>/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/script.js"></script>
    </head>

    <body>

        <?php
        include ROOT_DIR . 'include/header.php';

        include ROOT_DIR . 'include/menu.php';
        ?>


        <!--header div end-->


        <!--table lay out div-->
        <div class="container">

            <div style="margin-top:20px;">
                <?php echo $Form->error('error', 'alert alert-danger alert-dismissible') ?>
                <?php echo $Form->error('success', 'alert-success alert-dismissible') ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="" style="font-size:26px; line-height:30px;">Add Administrator</h2>
                    <div class="clearfix"></div>
                    <div id="reg">
                        <form action="action_edit_administrator.php" method="POST">
                            <input name="first_name" value="<?php echo $Form->value('first_name', $admin_data['first_name']); ?>" class="form-control inputone" type="text" 
                                   placeholder="FIRSTNAME"/>
                            <input name="last_name" value="<?php echo $Form->value('last_name', $admin_data['last_name']); ?>" class="form-control" type="text" placeholder="LASTNAME"/>
                            <input name="email" value="<?php echo $Form->value('email', $admin_data['email']); ?>" class="form-control" type="text" placeholder="Email"/>
                            <input name="password" value="<?php echo $Form->value('password', $admin_data['password']); ?>" class="form-control" type="text" placeholder="PASSWORD"/>
                            <input name="phone" value="<?php echo $Form->value('phone', $admin_data['phone_no']); ?>" class="form-control" type="text" placeholder="PHONE NUMBER"/>
                            <select class="form-control" name="receive_email">
                                <option value="Y" <?php echo $Form->value('receive_email', $admin_data['receive_email']) == 'Y' ? 'selected="selected"' : ''; ?>>Yes</option>
                                <option value="N" <?php echo $Form->value('receive_email', $admin_data['receive_email']) == 'N' ? 'selected="selected"' : ''; ?>>No</option>
                            </select>
                            <input type="hidden" name="id" value="<?php echo $admin_data['id']; ?>"/>
                            <input name="edit_admin" type="submit" value="EDIT" class="form-control btn"/>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        </div>

        <!--table lay out div end-->
    </body>
</html>
