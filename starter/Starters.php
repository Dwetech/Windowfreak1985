<?php
include '../core.php';

$data = mysql_query('SELECT * FROM starter');
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
    </head>

    <body>
        <?php
        include ROOT_DIR . 'include/header.php';

        include ROOT_DIR . 'include/menu.php';
        ?>

        <!--table lay out div-->
        <div class="container">
            <div class="row topmargin">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p class="addmin"><a href="add-starter.php">add a starter</a></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="editdelete">
                        <li><a href="#">edit</a></li>
                        <li><a href="<?php echo WEBSITE_URL; ?>starter/delete_action.php">delete</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                    <h2>Conversation Starters</h2>
                </div><div class="clearfix"></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php
                        while($result = mysql_fetch_array($data)) {
                        ?>
                        <tr>
                            <td>
                                <p class="tabletext"><?php echo $result['starter']; ?></p>
                            </td>
                            <td class="text-center" style="width:8%;"><input type="checkbox" name="" value="<?php echo $result['id']; ?>" /></td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="pagebtn">
                        <li><a href="#" class="activ">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">Next</a></li>
                        <li><a href="#">Last</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--table lay out div end-->
    </body>
</html>
