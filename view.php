<?php
/**
 * Created by N0B0DY.
 * User: me@suvo.me
 * Date: 9/15/14
 * Time: 1:41 AM
 */
include 'core.php';
$session->loginRequired('user');
$Form = new Form();

$starter = mysql_fetch_assoc(mysql_query('SELECT * FROM ' . TBL_STARTER . ' ORDER BY RAND() LIMIT 1'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Life Department - View</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo CSS; ?>/bootstrap.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <!--font css-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>

    <!-- style sheet css -->
    <link href="<?php echo CSS; ?>/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo CSS; ?>/style.css" type="text/css"/>
</head>

<body>

<!--header div-->
<div class="header-bg blue">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 centeralign">
                <a href="#">
                    <img src="img/logo.png" alt="Life Department"/>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <ul class="headlogin text-center">
                    <li><a href="#"><?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?></a></li>
                    <li>|</li>
                    <li><a href="<?php echo WEBSITE_URL ?>logout.php">Sign-out <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--header div end-->

<!--table lay out div-->
<div class="container">
    <div class="topmargin">
        <div class="summary">
            <a href=""><img src="img/refeces.jpg" alt="r1" class="pull-left"
                            style="border-radius:5px 0px 0px 5px; border-right:1px solid #d2d2d2;"/></a>

            <p class="tabletext pull-left" style="padding:10px 20px; width:81%;text-align:justify">
                <?php echo $starter['starter']; ?>
            </p>

            <div class="c"></div>
        </div>
    </div>
</div>

<div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2 class="" style="font-size:26px; line-height:30px;">New Leads</h2>

            <div class="clearfix"></div>
            <div id="reg">

                <?php echo $Form->error('error','alert alert-danger') ?>
                <?php echo $Form->error('leadsError','alert alert-danger') ?>
                <?php echo $Form->error('success','alert alert-success') ?>
                <form action="<?php echo WEBSITE_URL ?>action_new_leads.php" method="post">
                    <input name="first_name" value="<?php echo $Form->value('first_name') ?>" class="form-control1 inputone1" type="text" placeholder="FIRSTNAME">
                    <input name="last_name" value="<?php echo $Form->value('last_name') ?>" class="form-control1" type="text" placeholder="LASTNAME">
                    <select name="lead_result" class="form-control1">
                        <option value="">Lead Result</option>
                        <option value="Y" <?php echo $Form->value('lead_result') == 'Y' ? 'selected' : ''; ?>>Yes</option>
                        <option value="N" <?php echo $Form->value('lead_result') == 'N' ? 'selected' : ''; ?>>No</option>
                    </select>
                    <select name="call_time" class="form-control1">
                        <option value="">Time To Call</option>
                        <?php
                        for ($i = 8; $i <= 12; $i++) { ?>
                            <option <?php echo $Form->value('call_time')==timeWatch($i) ? 'selected' : ''; ?>  value="<?php echo timeWatch($i) ?>"><?php echo timeWatch($i) ?></option>
                            <option <?php echo $Form->value('call_time')==timeWatch($i+0.5) ? 'selected' : ''; ?>  value="<?php echo timeWatch($i+0.5) ?>"><?php echo timeWatch($i+0.5) ?></option>
                        <?php }
                        ?>
                        <?php
                        for ($i = 1; $i < 8; $i++) { ?>
                        <option <?php echo $Form->value('call_time')==timeWatch($i) ? 'selected' : ''; ?>  value="<?php echo timeWatch($i) ?>"><?php echo timeWatch($i) ?></option>
                        <option <?php echo $Form->value('call_time')==timeWatch($i+0.5) ? 'selected' : ''; ?>  value="<?php echo timeWatch($i+0.5) ?>"><?php echo timeWatch($i+0.5) ?></option>
                        <?php }
                        ?>
                    </select>
                    <input name="phone_no" value="<?php echo $Form->value('phone_no') ?>" class="form-control1" type="text" placeholder="PHONE NUMBER">
                    <input name="notes" value="<?php echo $Form->value('notes') ?>" class="form-control1" type="text" placeholder="NOTES">
                    <input name="submit" type="submit" value="SUBMIT" class="form-control1 btn1">
                </form>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="margin-top:20px;">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <h2 class="admin-box" style="margin:0px; line-height:30px;">All Leads</h2>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>first name</th>
                        <th>last name</th>
                        <th>phone number</th>
                        <th>time to call</th>
                        <th>yes/no</th>
                        <th>date/time</th>

                    </tr>
                    <?php

                    $count = mysql_fetch_array(mysql_query('SELECT COUNT(*) as total FROM leads WHERE user_id='.$_SESSION['user_id'])) ;
                    $leadsSQL = 'SELECT * FROM ' . TBL_LEADS;
                    $Pagination = new Pagination();
                    $Pagination->limit = 30;
                    $Pagination->pageParam  = 'page';
                    $Pagination->execute($count['total']);
                    $leadsSQL .= $Pagination->getLimitStr();


                    $leadsQuery = mysql_query($leadsSQL);

                    while($leads = mysql_fetch_assoc($leadsQuery)){ ?>
                        <tr>
                            <td><?php echo $leads['first_name'] ?></td>
                            <td><?php echo $leads['last_name'] ?></td>
                            <td><?php echo $leads['phone_no'] ?></td>
                            <td><?php echo $leads['call_time'] ?></td>
                            <td><?php echo $leads['lead_result']=='Y' ? 'YES - call them' : ''; ?></td>
                            <td style="text-align:left;"><?php echo $leads['create_date'] ?></td>

                        </tr>
                    <?php } ?>
                </table>
            </div>

            <?php
            echo $Pagination->showPagination();
            ?>
        </div>


        <?php
        $today_yes = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='Y' AND user_id=".$_SESSION['user_id']." AND DATE(`create_date`) = CURDATE()" ));
        $today_no = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='N' AND user_id=".$_SESSION['user_id']." AND DATE(`create_date`) = CURDATE()" ));

        $week_yes = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='Y' AND user_id=".$_SESSION['user_id']." AND YEARWEEK(`create_date`) = YEARWEEK(NOW())" ));
        $week_no = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='N' AND user_id=".$_SESSION['user_id']." AND YEARWEEK(`create_date`) = YEARWEEK(NOW())" ));

        $month_yes = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='Y' AND user_id=".$_SESSION['user_id']." AND MONTH(`create_date`) = MONTH(NOW())" ));
        $month_no = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as leads FROM ".TBL_LEADS." WHERE lead_result='N' AND user_id=".$_SESSION['user_id']." AND MONTH(`create_date`) = MONTH(NOW())" ));

        ?>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <div id="summ" class="summary">
                <h3>Summary</h3>
                <hr style="height:1px; border-top:1px solid #d2d2d2; width:100%; margin:0px;"/>
                <table class="table noborder">
                    <tr>
                        <td><span class="leadtitle">Leads Today</span> <span>yes: <?php echo $today_yes['leads'] ?></span> <span>No: <?php echo $today_no['leads'] ?></span></td>
                    </tr>
                    <tr>
                        <td><span class="leadtitle">Leads This Week</span> <span>yes: <?php echo $week_yes['leads'] ?></span> <span>No: <?php echo $week_no['leads'] ?></span></td>
                    </tr>
                    <tr>
                        <td><span class="leadtitle">Leads This Month</span> <span>yes: <?php echo $month_yes['leads'] ?></span> <span>No: <?php echo $month_no['leads'] ?></span></td>
                    </tr>

                </table>
            </div>
            <div class="summary" style="margin-top:20px;">
                <h3>Talk to a Specialist</h3>
                <hr style="height:1px; border-top:1px solid #d2d2d2; width:100%; margin:0px;"/>
                <p style="margin:10px;font-size:16px; color:#626262;"><i class="fa fa-phone"></i> 123 1234 1234</p>
            </div>
            <div class="c"></div>
        </div>

    </div>
</div>
</div>
<!--table lay out div end-->
</body>
</html>