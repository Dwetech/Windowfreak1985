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

$id = (int)$_GET['id'];
if (!$id) {
    $form->return_msg_to(WEBSITE_URL . 'starter/starters.php');
}
$data = mysql_fetch_object(mysql_query('SELECT * FROM starter WHERE id=' . $id));
if (!$data) {
    $form->return_msg_to(WEBSITE_URL . 'starter/starters.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - View</title>
        <?php
        include ROOT_DIR . '/include/head.php';
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


        <!--table lay out div-->
        <div class="container">

            <div style="margin-top:20px;">
                
                <?php echo $form->error('starter_error', 'alert alert-danger alert-dismissible'); ?>
                <?php echo $form->error('starter_success', 'alert alert-success alert-dismissible'); ?>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="" style="font-size:26px; line-height:30px;">Edit Starter</h2>
                    <div class="clearfix"></div>

                    <div id="reg">
                        <form action="edit_action.php" method="POST">
                            <input class="control inputone specific" type="text" placeholder="CONVERSATION STARTER TEXT" name="starter" value="<?php echo $data->starter; ?>"/>
                            <input type="hidden" name="starter_id" value="<?php echo $data->id; ?>"/>
                            <input type="submit" name="edit_starter" value="EDIT" class="form-control btn"/>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


        </div>

        <!--table lay out div end-->
    </body>
</html>
