<?php 
    session_start();
    include '../src/Database.php';
    include '../settings.php';
    include "../src/models/User.php";   
    
    $db = new Database($settings);
    $pdo = $db->getPDO();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Spartan Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/css/shop-register.css" rel="stylesheet">

  </head>

  <body style="height:100%">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/public/tracker.php">Tracking</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/public/register.php">Register
              <span class="sr-only">(current)</span></a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="/public/login.php">Log In
			  </a>
            </li>
           <?php
                if(isset($_SESSION['user_id'])){
                    echo "<li class='nav-item'>
                 <a class='nav-link' href='/public/index.php?logout'>Log Out</a>
                    </li> ";
                    
                   
                }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="registration-page">
  <div class="form">
    <form class="register-form" action="register.php?process" method = "POST" >
        <input type="text" placeholder="Email" name="email"/>
      <input type="text" placeholder="First Name" name= "firstName"/>
      <input type="text" placeholder="Last Name" name="lastName"/>
      <input type="text" placeholder="Home Phone" name="homePhone"/>
      <input type="text" placeholder="Cell Phone" name="cellPhone"/>
      <input type="password" placeholder="Password" name="pass"/>
      <input type="password" placeholder="Confirm Password" name="confirmPass"/>
      <button>Register</button>
    </form>
      <?php
    if(isset($_GET["process"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $homePhone = $_POST["homePhone"];
        $cellPhone = $_POST["cellPhone"];
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $confirmPassword = $_POST["confirmPass"];
        if($password != $confirmPassword){
            //password fields match
            echo "<p>Passwords don't match</p>";
        }else if(User::checkEmailExists($pdo, $email)){
            //check if email already exists
            echo "<p>Email already exists</p>";
        }else{
            //all gucci
            //static function register($pdo, $email, $password,$lastName,$firstName,$home_number,$mobile_number)
            User::register($pdo, $email, $password, $lastName, $firstName, $homePhone, $cellPhone);
            echo "<p>You've registered successfully</p>";
        }
    }
  
  
  ?>
  </div>
  
 
</div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="position:absolute; bottom:0; width:100%">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Spartan Shop 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>


</html>


