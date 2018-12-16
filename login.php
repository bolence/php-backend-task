<?php
require_once('templates/header.php');
require_once('init.php');

use Rakit\Validation\Validator;
use Classes\User;

if($_POST){

$validator = new Validator;

// define validation rules
$validation = $validator->make($_POST, [
    'email'                 => 'required|email',
    'password'              => 'required|min:6',

]);

$validation->validate();

if ($validation->fails()) {
 
    $errors = $validation->errors();
    $errors = $errors->firstOfAll();

} else {

  $user = new User($db);

  $login = $user->loginUser( clean($_POST['email']), clean($_POST['password']) );

  $login ? Redirect::to('index.php') : $errors = ['message' => 'We couldn`t login at this time.'];
 
}

}


?>

<main>

      <div class="container">

        <div class="row">

          <?php require_once 'templates/login_form.php'; ?>

          


        </div>


      </div>

 

    </main>


   <?php require_once('templates/footer.php'); ?>




