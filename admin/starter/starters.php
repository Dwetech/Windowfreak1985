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

$count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM starter"));
$sql = 'SELECT * FROM starter ORDER BY id DESC';

$pagination = new Pagination();
$pagination->limit = 10;
$pagination->execute($count['total']);
$sql .= $pagination->getLimitStr();

$data = mysql_query($sql);
?>
<a href="../../alex/image_description.php"></a>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - Starters</title>
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

            <form action="edit_action.php" method="POST">
                <div class="row topmargin">
                    
                    <?php echo $form->error('starter_error', 'alert alert-danger alert-dismissible'); ?>
                    <?php echo $form->error('starter_success', 'alert alert-success alert-dismissible'); ?>


                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p class="addmin"><a href="add-starter.php">add a starter</a></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="editdelete">
                            <li><input name="edit_starter" type="submit" value="EDIT"/></li>
                            <li><input onclick="return confirm('Are you sure you want to delete selected conversation(s)?');" name="delete_starter" type="submit" value="DELETE"/></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                        <h2>Conversation Starters</h2>
                    </div><div class="clearfix"></div>
                    <div class="table-responsive">
                        <?php if (mysql_num_rows($data) > 0) { ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php
                                while ($result = mysql_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <p class="tabletext"><?php echo $result['starter']; ?></p>
                                        </td>
                                        <td class="text-center" style="width:8%;">
                                            <input type="checkbox" name="starter_id[]" value="<?php echo $result['id']; ?>" />
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>
                        <?php } ?>
                        <?php echo $pagination->showPagination(); ?>
                    </div>
                    <!--                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <ul class="pagebtn">
                                                <li><a href="#" class="activ">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">Next</a></li>
                                                <li><a href="#">Last</a></li>
                                            </ul>
                                        </div>-->
                </div>
            </form>
        </div>
        <!--table lay out div end-->
    </body>
</html>
