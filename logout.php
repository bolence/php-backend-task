<?php


include_once('config.php');
include_once('includes/start.inc.php'); 


$user = new User();


$user->loginOut();

Redirect::to('index.php');




