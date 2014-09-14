<?php
include '../../core.php';
$session->loginRequired('admin');

$Form = new Form();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department</title>
        <?php
        include ROOT_DIR . 'include/head.php';
        ?>
        <script type="text/javascript" src="<?php echo JS; ?>/jquery.min.js"></script>
    </head>

    <body>

        <?php
        include ROOT_DIR . 'include/header.php';

        include ROOT_DIR . 'include/menu.php';
        ?>

        <!--table lay out div-->
        <div class="container">
            <?php echo $Form->error('error', 'alert alert-danger') ?>
            <?php echo $Form->error('success', 'alert alert-success') ?>
            <form action="manage_admin_action.php" method="POST">
                <div class="row topmargin">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a href="<?php echo WEBSITE_URL; ?>admin/administrator/add-a-administrator.php">add an administrator</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="editdelete">
                            <li><input type="submit" name="edit_admin" value="EDIT"/></li>
                            <li><input onclick="return confirm('Are you sure you want to delete this admin?');" type="submit" name="delete_admin" value="DELETE"/></li>
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
                            </tr>‌
                            <?php
                            $user_count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM " . TBL_USER . " WHERE type='admin' AND id!='" . $_SESSION['user_id'] . "'"));
                            $user_sql = "SELECT u.* FROM " . TBL_USER . " u WHERE u.type='admin' AND id!='" . $_SESSION['user_id'] . "' ORDER BY u.id DESC";

                            $userPagination = new Pagination();

                            $userPagination->limit = 30;
                            $userPagination->pageParam = 'user_page';

                            $userPagination->execute($user_count['total']);

                            $user_sql .= $userPagination->getLimitStr();

                            $user_query = mysql_query($user_sql);

                            while ($user_data = mysql_fetch_assoc($user_query)) {
                                ?>
                                <tr>
                                    <td><?php echo $user_data['first_name'] ?></td>
                                    <td><?php echo $user_data['last_name'] ?></td>
                                    <td><?php echo $user_data['email'] ?></td>
                                    <td><?php echo $user_data['password'] ?></td>
                                    <td><?php echo $user_data['phone_no'] ?></td>
                                    <td>
                                        <?php
                                        if ($user_data['receive_email'] == 'Y') {
                                            ?>
                                            <input onchange="update_admin('<?php echo $user_data['id']; ?>', 'N')" type="checkbox" checked 
                                                   name="receive_email" value="N" />YES
                                                   <?php
                                               } else {
                                                   ?>
                                            <input onchange="update_admin('<?php echo $user_data['id']; ?>', 'Y')" type="checkbox" 
                                                   name="receive_email" value="Y" />YES
                                                   <?php
                                               }
                                               ?>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo $user_data['id']; ?>" />
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        echo $userPagination->showPagination();
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <!--table lay out div end-->
    </body>
    <script>
        function update_admin(id, receive) {

            $.ajax({
                url: 'action_update_administrator.php?id=' + id + '&receive_email=' + receive,
                type: 'GET',
                success: function (rslt) {
                    
                    if (rslt == false || rslt == 0) {
                        alert('Update failed! Please try again.');
                    }
                    
                    window.location.href = 'administrator.php';
                }
            });
        }
    </script>
</html>
