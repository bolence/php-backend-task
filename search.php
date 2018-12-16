<?php 
include('config.php');
include(SITE_ROOT . '/includes/start.inc.php'); 

$user = new User();

if( !$user->isLoginIn() ) {
	Redirect::to('index.php');
}


