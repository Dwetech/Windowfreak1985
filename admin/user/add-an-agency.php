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
        include ROOT_DIR . 'include/head.php';
        ?>
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
                <?php
                echo $form->error('agency_error', 'alert alert-danger alert-dismissible');
                echo $form->error('agency_success', 'alert-success alert-dismissible');
                ?>


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="" style="font-size:26px; line-height:30px;">Add Agency</h2>
                    <div class="clearfix"></div>
                    <div id="reg">
                        <form action="<?php echo WEBSITE_URL; ?>admin/user/action_add_agency.php" method="POST">
                            <input name="name" value="<?php echo $form->value('name'); ?>" class="form-control inputone" type="text" placeholder="AGENCY NAME"/>
                            <input name="contact" value="<?php echo $form->value('contact'); ?>" class="form-control" type="text" placeholder="PRIMARY CONTACT"/>
                            <input name="email" value="<?php echo $form->value('email'); ?>" class="form-control" type="text" placeholder="AGENCY Email"/>
                            <input name="phone" value="<?php echo $form->value('phone'); ?>" class="form-control" type="text" placeholder="PHONE"/>
                            <input name="add_agency" type="submit" value="ADD" class="form-control btn"/>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        </div>

        <!--table lay out div end-->
    </body>
</html>
