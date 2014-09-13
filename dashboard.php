<?php
include '/core.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Life Department - Dashboard</title>
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
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 summary">

                    <h3>Summary</h3>
                    <hr style="height:1px; border-top:1px solid #d2d2d2; width:100%; margin:0px;"/>
                    <table class="table noborder">
                        <tr>
                            <td><span class="leadtitle">Leads Today</span> <span>yes: 2</span> <span>No:10</span></td>
                            <td><span class="leadtitle">Leads This Week</span> <span>yes: 2</span> <span>No:10</span></td>
                            <td><span class="leadtitle">Leads This Month</span> <span>yes: 2</span> <span>No:10</span></td>
                            <td><span class="leadtitle">Total Leads</span> <span>yes: 2</span> <span>No:10</span></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <ul class="editdelete" style="margin-top:90px;">
                        <li><a href="#">export to csv</a></li>
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
                        <tr>
                            <td>Michael</td>
                            <td>Smith</td>
                            <td>555-123-4567</td>
                            <td>8:00am</td>
                            <td>YES - call them</td>
                            <td style="text-align:left;">1/1/14 - 10:49am</td>
                            <td style="text-align:left;">Angela Martin</td>
                            <td>Engle insurance</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
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
                            <td>&nbsp;</td>
                        </tr>
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
