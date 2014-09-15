<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
include '../../core.php';
$session->loginRequired('admin');
$form = new Form();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - View</title>
        <?php
        include ROOT_DIR . '/include/head.php';
        ?>
    </head>

    <body>

        <?php
        include ROOT_DIR . 'include/header.php';

        include ROOT_DIR . 'include/menu.php';
        ?>


        <!--table lay out div-->
        <div class="container">

            <div style="margin-top:20px;">

                <?php echo $form->error('starter_error', 'alert alert-danger'); ?>
                <?php echo $form->error('starter_success', 'alert alert-success'); ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="" style="font-size:26px; line-height:30px;">Add Starter</h2>
                    <div class="clearfix"></div>

                    <div id="reg">
                        <form action="<?php echo WEBSITE_URL; ?>admin/starter/add_action.php" method="POST">
                            <input class="control inputone specific" type="text" placeholder="CONVERSATION STARTER TEXT" name="starter"/>
                            <input type="submit" name="submit_starter" value="ADD" class="form-control btn"/>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        </div>

        <!--table lay out div end-->
    </body>
</html>
