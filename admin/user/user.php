<?php
include '../../core.php';
$session->loginRequired('admin');
$Form = new Form();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - Users</title>
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
                <div class="col-md-12">
                    <?php echo $Form->error('success', 'alert alert-success') ?>
                    <?php echo $Form->error('error', 'alert alert-danger') ?>
                </div>
            </div>
            <form action="manage_user_action.php" method="post">
                <div class="row topmargin">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a class="addmin" href="add-a-user.php">add a user</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <ul class="editdelete">
                            <li><input type="submit" name="edit_user" value="edit"/></li>
                            <li><input onclick="return conform('Are you sure you want to delete this user?');" type="submit" name="delete_user" value="delete"/></li>
                        </ul>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                        <h2>Users</h2>
                    </div><div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>first name</th>
                                <th>last name</th>
                                <th>email address</th>
                                <th>password</th>
                                <th>phone</th>
                                <th>agency</th>
                                <th colspan="2">Leads (yes/No)</th>
                            </tr>

                            <?php
                            $user_count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM " . TBL_USER . " WHERE type='user'"));
                            $user_sql = "SELECT u.*, a.agency_name FROM " . TBL_USER . " u LEFT JOIN agency a ON (u.agency_id=a.id) WHERE u.type='user'";

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
                                    <td><?php echo $user_data['agency_name'] ?></td>
                                    <!-- @todo : get leads count -->
                                    <td>12 / 97</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="users[]" value="<?php echo $user_data['id'] ?>" />
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        echo $userPagination->showPagination();
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <!--table lay out div end-->

        <!--table2 agency lay out div-->
        <div class="container">
            <form method="POST" action="<?php echo WEBSITE_URL; ?>admin/user/manage_agency_action.php">
                <div class="row" style="margin-top:20px;">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a href="<?php echo WEBSITE_URL; ?>admin/user/add-an-agency.php">add a agency</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="editdelete">
                            <li><input type="submit" name="edit_agency" value="EDIT"/></li>
                            <li><input onclick="return confirm('Are you sure you want to delete this agency?')" type="submit" name="delete_agency" value="DELETE"/></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                        <h2>Agency</h2>
                    </div><div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Agency name</th>
                                <th>primary contact</th>
                                <th>agency email</th>
                                <th>agency phone </th>
                                <th colspan="2">leads (yes/no)</th>
                            </tr>
                            <?php
                            $agency_count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM " . TBL_AGENCY));
                            $agency_sql = "SELECT * FROM " . TBL_AGENCY . ' ORDER BY id DESC';

                            $agencyPagination = new Pagination();
                            $agencyPagination->limit = 30;
                            $agencyPagination->pageParam = 'agency_page';
                            $agencyPagination->execute($agency_count['total']);

                            $agency_sql .= $agencyPagination->getLimitStr();

                            $agency_query = mysql_query($agency_sql);

                            if (mysql_num_rows($agency_query) > 0) {

                                while ($data = mysql_fetch_assoc($agency_query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['agency_name']; ?></td>
                                        <td><?php echo $data['primary_contact']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['phone_no']; ?></td>
                                        <td class="text-center"><?php echo $data['create_date']; ?></td>
                                        <td class="text-center"><input type="checkbox" name="agency_id[]" value="<?php echo $data['id']; ?>" /></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        echo $agencyPagination->showPagination();
                        ?>
                        <!--                    <ul class="pagebtn">
                                                <li><a href="#" class="activ">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">Next</a></li>
                                                <li><a href="#">Last</a></li>
                                            </ul>-->
                    </div>
                </div>
            </form>
        </div>
        <!--table2 agency lay out div end-->
    </body>
</html>
