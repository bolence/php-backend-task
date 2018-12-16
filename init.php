<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./vendor/autoload.php'); // autoload composer classes
require_once('./functions/helpers.php');

use Classes\MysqlClass;
use Classes\Redirect;

// load env file config
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

//instance of db class
$db = new MysqlClass();

