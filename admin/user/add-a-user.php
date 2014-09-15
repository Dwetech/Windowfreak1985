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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="" style="font-size:26px; line-height:30px;">Add User</h2>
                    <div class="clearfix"></div>
                    <?php echo $Form->error('error','alert alert-danger alert-dismissible') ?>
                    <div id="reg">

                        <form action="action_add_user.php" method="post">
                            <input name="first_name" class="form-control inputone" type="text" placeholder="FIRSTNAME" value="<?php echo $Form->value('first_name') ?>">
                            <input name="last_name" class="form-control" type="text" placeholder="LASTNAME" value="<?php echo $Form->value('last_name') ?>">
                            <input name="email" class="form-control" type="text" placeholder="Email" value="<?php echo $Form->value('email') ?>">
                            <input name="password" class="form-control" type="text" placeholder="PASSWORD" value="<?php echo $Form->value('password') ?>">
                            <input name="phone" class="form-control" type="text" placeholder="PHONE NUMBER" value="<?php echo $Form->value('phone') ?>">
                            <select name="agency" class="form-control" id="agency">
                                <?php
                                $agency_query = mysql_query("SELECT * FROM ".TBL_AGENCY."");

                                while( $agency = mysql_fetch_assoc($agency_query) ){
                                    ?>
                                    <option value="<?php echo $agency['id'] ?>"><?php echo $agency['agency_name'] ?></option>
                                <?php
                                }

                                ?>
                            </select>
                            <input type="submit" value="ADD" class="form-control btn">
                        </form>
                                                    <div class="clearfix"></div>
                                                    </div>
                                                    </div>
                                                    </div>


                                                    </div>

                                                    <!--table lay out div end-->
                                                    </body>
                                                    </html>
