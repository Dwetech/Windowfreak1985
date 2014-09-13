<?php

/*
Constant.php
All constact define here
All right reserved. Copyright Abdullah Al Jahid
*/

// Database Table definition
define ( 'DB_HOST', 'localhost' );
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', '' );
define ( 'DB_NAME', 'life_department_db' );


define ( 'TBL_USER', 'user' );
define ( 'TBL_AGENCY', 'agency' );
define ( 'TBL_STARTER', 'starter' );
define ( 'TBL_LEADS', 'leads' );


// Website URL
define ( 'WEBSITE_URL', 'http://localhost/dwetech-traffic/' );

// cookie
define ( 'COOKIE_EXPIRE', 60*60*24*15 ); // seconds * Minutes * Hours * days


//define ( 'ADMIN_URL', WEBSITE_URL );


// Directory Constant
define('CSS' , WEBSITE_URL.'css');
define('JS' , WEBSITE_URL.'js');
define('IMG' , WEBSITE_URL.'img');



?>
