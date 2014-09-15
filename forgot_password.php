<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('core.php');
$Form = new Form();

$banner = mysql_fetch_assoc(mysql_query('SELECT * FROM ' . TBL_BANNER . ' ORDER BY RAND() LIMIT 1'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - Login</title>
        <?php
        include ROOT_DIR . 'include/head.php';
        ?>
        <script type="text/javascript" src="<?php echo JS; ?>/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/script.js"></script>
    </head>

    <body>
        <!--header div-->
        <div class="header-bg blue">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 centeralign">
                        <a href="#">
                            <img src="img/logo.png" alt="Life Department" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--header div end-->

        <div class="container" style="margin-top:50px;">
            <?php
            if ($Form->error('email', 'alert alert-danger alert-dismissible')) {
                echo $Form->error('email', 'alert alert-danger alert-dismissible');
            } else {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-md-offset-4 text-center visittext">
                    <h4>Forgot Password</h4>

                    <form action="action_forgot_password.php">

    <?php echo $Form->error('email', 'alert alert-danger alert-dismissible') ?>
                        <input name="email" style="width: 90%;margin: 5px 5%;padding: 7px;text-align: center" type="email" placeholder="Email Address"/>
                        <input name="submit" style="width: 90%;margin: 0 5%;padding: 7px;background: #1c8c7e;color: #ffffff" type="submit" value="Send Mail"/>
                    </form>

                </div>
<?php } ?>

        </div>
    </body>
</html>
