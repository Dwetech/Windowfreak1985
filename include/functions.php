<?php

/*
  Created on : Sep 17, 2014, 2:03:50 PM
  Author        : me@rafi.pro
  Name         : Mohammad Faozul Azim Rafi
 */


function getUriSegments()
{
    return explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
}


function getUriSegment($n)
{
    $segs = getUriSegments();
    return count($segs) > 0 && count($segs) >= ($n - 1) ? $segs[$n] : '';
}

