<?php

require_once('init.php');

// router instance
$router = new Klein\Klein;

$router->respond('GET', '/users/[i:id]', function ( $request, $response, $id, $service ) {
    return $response->redirect('/views/user/details.php'); 
});


$router->dispatch();



