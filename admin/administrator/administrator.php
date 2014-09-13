<?php
include '/core.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department</title>
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
                    <p class="addmin">add an administrator</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <ul class="editdelete">
                        <li><a href="#">edit</a></li>
                        <li><a href="#">delete</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                    <h2>Administrators</h2>
                </div><div class="clearfix"></div>
                <div class="table-responsive" style="border-bottom-left-radius:5px;">
                    <table class="table table-striped">
                        <tr>
                            <th>first name</th>
                            <th>last name</th>
                            <th>email address</th>
                            <th>password</th>
                            <th>phone</th>
                            <th colspan="2">receive ‘yes’ emails?</th>
                        </tr>
                        <tr>
                            <td>William</td>
                            <td>Steffenauer</td>
                            <td>william@designsinlife.com</td>
                            <td>password1234</td>
                            <td>555-123-4567</td>
                            <td><input type="radio" name="" value="Yes" class="radio-btn" />YES</td>
                            <td><input type="checkbox" name="" value="" /></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="pagebtn">
                        <li><a href="#" class="activ">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">Next</a></li>
                        <li><a href="#">Last</a></li>
                    </ul><div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--table lay out div end-->
    </body>
</html>
