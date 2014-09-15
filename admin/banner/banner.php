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
        <title>Life Department - Banners</title>
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

        <!--table lay out div-->
        <div class="container">


            <form action="action_delete_banner.php" method="post">

                <div class="row topmargin">

                    
                    <?php echo $Form->error('success', 'alert alert-success') ?>
                    <?php echo $Form->error('error', 'alert alert-danger') ?>

                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a href="add-banner.php" class="addmin">Upload a banner</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="editdelete">
                            <li><input onclick="return confirm('Are you sure you want to delete this banner?')" type="submit" name="delete_banner" value="DELETE"/></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                        <h2>Banners</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>file name</th>
                                <th colspan="2">description</th>
                            </tr>

                            <?php
                            $bannerQuery = mysql_query("SELECT * FROM " . TBL_BANNER);


                            $count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM " . TBL_BANNER));
                            $bannerSQL = 'SELECT * FROM ' . TBL_BANNER;
                            $Pagination = new Pagination();
                            $Pagination->limit = 30;
                            $Pagination->pageParam = 'page';
                            $Pagination->execute($count['total']);
                            $bannerSQL .= $Pagination->getLimitStr();


                            $bannerQuery = mysql_query($bannerSQL);

                            while ($banner = mysql_fetch_assoc($bannerQuery)) {
                                ?>
                                <tr>
                                    <td><?php echo $banner['file_name'] ?></td>
                                    <td><?php echo $banner['description'] ?></td>
                                    <td class="text-center"><input type="checkbox" name="id" value="<?php echo $banner['id']; ?>" /></td>
                                </tr>

                            <?php } ?>
                        </table>
                    </div>

                    <?php
                    echo $Pagination->showPagination();
                    ?>
                </div>
            </form>
        </div>
        <!--table lay out div end-->
    </body>
</html>
