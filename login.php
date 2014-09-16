<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
require('core.php');
$Form = new Form();

if( $session->checklogin() ) {
    if( $_SESSION['loginType'] == 'admin' ){
        redirect('admin/dashboard.php');
    } else {
        redirect('view.php');
    }
}

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
        <script type="text/javascript" src="<?php echo JS; ?>/bootstrap.js"></script>
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
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">

                        <form action="action_login.php" method="post">

                        <ul class="headlogin text-center">
                            <li>
                                <input type="email" name="email" value="<?php echo $Form->value('email') ?>" placeholder="email" class="emailtext" />
                            </li>
                            <li>
                                <input type="password" name="password" value="" placeholder="password" class="passtext" />
                            </li>
                            <li>
                                <input type="submit" value="Login" name="submit" class="loginbtn" /></li>
                            </li>
                            <br>
                            <li style="width: 170px;font-size: 12px">
                                <input type="checkbox" name="remember_me" value="1" class="cbox"/>Keep me logged in
                            </li>
                            <li style="width: 150px">
                            <a href="forgot_password.php" class="keep">forgot your password?</a>
                            </li>
                        </ul>
                        <div class="c"></div>
                        <ul class="keep-forgot">
                            <li></li>
                            </ul>

                        </form>


                    </div>
                </div>
            </div>
        </div>
        <!--header div end-->

        <div class="container" style="margin-top:30px;">

            <?php echo $Form->error('error', 'alert alert-danger alert-dismissible') ?>

            <div class="row banner" >
                <img src="<?php echo WEBSITE_URL . 'upload/' . $banner['file_name']; ?>"  class="img-responsive" />
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center visittext">
                <h3>want to learn more? visit www.yourlifedepartment.com<br/>
                    or call 800-990-9993</h3>
                <p>A SERVICE OF Designs In Life Insurance Marketing, LLC</p>
            </div>

        </div>
    </body>
</html>
