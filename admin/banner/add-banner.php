<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
include '../../core.php';
$session->loginRequired('admin',false);
$Form = new Form();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Life Department - View</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo CSS; ?>/bootstrap.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <!--font css-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

    <!-- style sheet css -->
    <link href="<?php echo CSS; ?>/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo WEBSITE_URL ?>style.css" type="text/css"/>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="" style="font-size:26px; line-height:30px;">Add Banner</h2>

            <div class="clearfix"></div>

            <div id="regg">

                <?php echo $Form->error('error','alert alert-danger') ?>
                <?php echo $Form->error('success','alert alert-success') ?>
                <?php echo $Form->error('extension','alert alert-danger') ?>
                <form action="action_add_banner.php" method="post" enctype="multipart/form-data">
                    <input name="file" type="file" style="position: inherit;float: left;padding: 5px;background: #1c8c7e;color: #ffffff">
                    <input name="description" value="<?php echo $Form->value('description') ?>" type="text" placeholder="DESCRIPTION" style="position: inherit;float: left">
                    <input name="submit" type="submit" value="ADD" class="form-control btnnn" style="position: inherit;float: left">
                </form>

                <div class="clearfix"></div>

            </div>
        </div>
    </div>


</div>

<!--table lay out div end-->
</body>
</html>
