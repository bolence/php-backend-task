<?php 
include_once('config.php');
include_once('includes/start.inc.php'); 
$user = new User();

echo var_dump($user->isLoginIn());

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Php backend test - Quantox company</title>
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

    </main>

    <footer class="container">
      <p>&copy; Quantox <?php echo date('Y'); ?></p>
    </footer>

    <!-- Bootstrap core JavaScript -->    
    <script src="vendor/twitter/bootstrap/dist/css/bootstrap.min.js"></script>

  </body>

</html>
