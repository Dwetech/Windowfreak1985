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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - View</title>
        <?php
        include ROOT_DIR . 'include/head.php';
        ?>
        <script type="text/javascript" src="<?php echo JS; ?>/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/script.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/bootstrap.js"></script>
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
                <?php echo $Form->error('success', 'alert alert-success alert-dismissible') ?>
                
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="" style="font-size:26px; line-height:30px;">Add Administrator</h2>
                    <div class="clearfix"></div>
                    <div id="reg">
                        <form action="action_add_administrator.php" method="POST">
                            <input name="first_name" value="<?php echo $Form->value('first_name'); ?>" class="form-control inputone" type="text" placeholder="FIRSTNAME"/>
                            <input name="last_name" value="<?php echo $Form->value('last_name'); ?>" class="form-control" type="text" placeholder="LASTNAME"/>
                            <input name="email" value="<?php echo $Form->value('email'); ?>" class="form-control" type="text" placeholder="Email"/>
                            <input name="password" value="<?php echo $Form->value('password'); ?>" class="form-control" type="text" placeholder="PASSWORD"/>
                            <input name="phone" value="<?php echo $Form->value('phone'); ?>" class="form-control" type="text" placeholder="PHONE NUMBER"/>
                            <select class="form-control" name="receive_email">
                                <option value="Y" <?php echo $Form->value('receive_email') == 'Y' ? 'selected="selected"' : ''; ?>>Yes</option>
                                <option value="N" <?php echo $Form->value('receive_email') == 'N' ? 'selected="selected"' : ''; ?>>No</option>
                            </select>
                            <input name="add_admin" type="submit" value="ADD" class="form-control btn"/>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        </div>

        <!--table lay out div end-->
    </body>
</html>
