<?php

session_start();
ini_set('display_errors', 1);

/**
 * Globals settings for db
 */
$GLOBALS['config'] = array(
    'mysql'    => array(
        'host'          => '127.0.0.1',
        'username'      => 'root',
        'password'      => 'root',
        'db'            => 'quantox'
    )
);

/**
 * Autoload register all classes
 */
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});


