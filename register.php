<?php 
include('config.php');
include(SITE_ROOT . '/includes/start.inc.php'); 


$errors = [];


if(Input::exists()) {

$validate = new Validate();

$validation = $validate->check($_POST, array(
   'name'     => array(
       'required' => true
   ),
   'password' => array(
       'required' => true

   ),
   'confirm_password' => array(
       'required' => true,
       'matches'  => 'password'
   ),
   'name'     => array(
       'required' => true

   )
));


if( $validation->passed() ) {

 $user = new User();

  try {

  $register = $user->createNewUser(array(
                 'name'         => Input::get('name'),
                 'email'        => Input::get('email'),
                 'password'     => Hash::make(Input::get('password')),
                 'created_at'   => date('Y-m-d H:i:s'),
             ));


  Session::flash('home','Hello '.Input::get('name').'. You have been registered and you can now log in');
  Redirect::to('index.php');


  } catch (Exception $e) {
    
    die($e->getMessage());
  
  } 

} else {

foreach($validation->errors() as $error)
{
  $errors[] = $error;
}

}


}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register in - Quantox company</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/twitter/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <style>
    	body {
          padding-top: 3.5rem;
         }
    </style>

  </head>

  <body>


      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/">Quantox</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
         
          <li class="nav-item">
            <a class="nav-link" href="search.php">Search users</a>
          </li>
        
        </ul>
    <ul class="navbar-nav float-right">

    <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
         </li>


         <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
         </li>
      
    </ul>
        
      
      </div>
    </nav>



    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">Hello, guys!</h1>
          <p>Welcome to php backend test. Here you can search registered users. You are just one step from there.</p>
          <p><a class="btn btn-success btn-sm" href="#" role="button">Login with you account &raquo;</a> <a class="btn btn-primary btn-sm" href="#" role="button">Create new account &raquo;</a></p>
          
        </div>
      </div>


      <div class="container">

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <h2>Register your account</h2>

                    <form method="POST">


                       <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name" name="name">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email" name="email">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>


                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
                      </div>

                      <div class="form-check">
                        
                        <button type="submit" class="btn btn-primary float-right">Login</button>
                      </div>
                      
                    </form>



              </div>


            <?php if (!empty($errors)): ?>
    
              <div class="col-md-12" style="padding:10px;">
              
                <div class="alert alert-danger">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 <ul>
                 <?php foreach ($errors as $error) {

                  echo '<li>'.$error.'</li>';



                 } ?>
               </ul>
               </div> 

              </div>

              <?php endif; ?>

        </div>


      </div>

 

    </main>



    <!-- Bootstrap core JavaScript -->    
    <script src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>

  </body>

</html>
