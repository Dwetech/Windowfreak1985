<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
include '../core.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - Dashboard</title>
        <?php
        include ROOT_DIR . 'include/head.php';
        ?>
        <script type="text/javascript" src="<?php echo JS; ?>/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo JS; ?>/script.js"></script>
    </head>

    <body>
        
        <?php
        include ROOT_DIR . 'include/header.php';

        include ROOT_DIR . 'include/menu.php';
        ?>

        <!--table lay out div-->
        <div class="container">

            <?php

            $today_yes = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='Y' AND DATE(`create_date`) = CURDATE()" ));
            $today_no  = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='N' AND DATE(`create_date`) = CURDATE()" ));

            $week_yes  = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='Y' AND YEARWEEK(`create_date`) = YEARWEEK(NOW())" ));
            $week_no   = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='N' AND YEARWEEK(`create_date`) = YEARWEEK(NOW())" ));

            $month_yes = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='Y' AND MONTH(`create_date`) = MONTH(NOW())" ));
            $month_no  = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='N' AND MONTH(`create_date`) = MONTH(NOW())" ));

            $total_yes = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS leads FROM ".TBL_LEADS." WHERE lead_result='Y'"));
            $total_no  = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) AS leads FROM ".TBL_LEADS." WHERE lead_result='N'"));

            ?>

            <div class="row topmargin">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 summary">

                    <h3>Summary</h3>
                    <hr style="height:1px; border-top:1px solid #d2d2d2; width:100%; margin:0px;"/>
                    <table class="table noborder">
                        <tr>
                            <td><span class="leadtitle">Leads Today</span> <span>yes: <?php echo $today_yes['leads'] ?></span> <span>No:<?php echo $today_no['leads'] ?></span></td>
                            <td><span class="leadtitle">Leads This Week</span> <span>yes: <?php echo $week_yes['leads']; ?></span> <span>No: <?php echo $week_no['leads'] ?></span></td>
                            <td><span class="leadtitle">Leads This Month</span> <span>yes: <?php echo $month_yes['leads'] ?></span> <span>No: <?php echo $month_no['leads'] ?></span></td>
                            <td><span class="leadtitle">Total Leads</span> <span>yes: <?php echo $total_yes['leads'] ?></span> <span>No: <?php echo $total_no['leads'] ?></span></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <ul class="editdelete" style="margin-top:90px;">
                        <li><a href="export_csv.php">export to csv</a></li>
                    </ul>
                </div>
            </div>

            <div class="row" style="margin-top:20px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 admin-box">
                    <h2>All Leads</h2>
                </div><div class="clearfix"></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>first name</th>
                            <th>last name</th>
                            <th>phone number</th>
                            <th>time to call</th>
                            <th>yes/no</th>
                            <th>date/time</th>
                            <th>user (first last)</th>
                            <th>agency</th>
                        </tr>
                        <?php

                        $leads_count = mysql_fetch_array(mysql_query("SELECT COUNT(*) as total FROM " . TBL_LEADS . ""));
                        $leads_sql = "SELECT
                                        l.*,
                                        u.first_name as user_first_name,
                                        u.last_name as user_last_name,
                                        a.agency_name
                                     FROM
                                        " . TBL_LEADS . " l
                                     LEFT JOIN ".TBL_USER." u
                                        ON (l.user_id=u.id)
                                     LEFT JOIN ".TBL_AGENCY." a
                                        ON (u.agency_id=a.id)
                                     ORDER BY l.id DESC";

                        $leadsPagination = new Pagination();

                        $leadsPagination->limit = 30;
                        $leadsPagination->pageParam = 'page';

                        $leadsPagination->execute($leads_count['total']);

                        $leads_sql .= $leadsPagination->getLimitStr();

                        $leads_query = mysql_query($leads_sql);

                        while( $leads = mysql_fetch_assoc($leads_query) ) {
                        ?>
                            <tr>
                                <td><?php echo $leads['first_name'] ?></td>
                                <td><?php echo $leads['last_name'] ?></td>
                                <td><?php echo $leads['phone_no'] ?></td>
                                <td><?php echo $leads['call_time'] ?></td>
                                <td><?php echo $leads['lead_result'] == 'Y' ? 'YES -  call them' : 'NO - don\'t call them' ?></td>
                                <td><?php echo $leads['create_date'] ?></td>
                                <td><?php echo $leads['user_first_name'].' '.$leads['user_last_name'] ?></td>
                                <td><?php echo $leads['agency_name'] ?></td>
                            </tr>
                        <?php
                        }


                        ?>


                    </table>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                        echo $leadsPagination->showPagination();
                    ?>
                </div>
            </div>
        </div>
        <!--table lay out div end-->
    </body>
</html>
