<?php include( 'functions.php'); ?>
<!--menu div-->
<div class="menu-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="menu">
                    <li><a style="<?php echo getUriSegment(3) == 'dashboard.php' ? 'text-decoration: underline' : ''; ?>" 
                           href="<?php echo WEBSITE_URL; ?>admin/dashboard.php">dashboard</a></li>
                    <li><a style="<?php echo getUriSegment(3) == 'user' ? 'text-decoration: underline' : ''; ?>" 
                           href="<?php echo WEBSITE_URL; ?>admin/user/user.php">users</a></li>
                    <li><a style="<?php echo getUriSegment(3) == 'starter' ? 'text-decoration: underline' : ''; ?>" 
                           href="<?php echo WEBSITE_URL; ?>admin/starter/starters.php">starters</a></li>
                    <li><a style="<?php echo getUriSegment(3) == 'banner' ? 'text-decoration: underline' : ''; ?>" 
                           href="<?php echo WEBSITE_URL; ?>admin/banner/banner.php">banners</a></li>
                    <li><a style="<?php echo getUriSegment(3) == 'administrator' ? 'text-decoration: underline' : ''; ?>" 
                           href="<?php echo WEBSITE_URL; ?>admin/administrator/administrator.php">administrators</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--menu div end-->