<?php 
    session_start();
    include '../src/Database.php';
    include '../settings.php';
    include "../src/models/User.php"; 
	include '../src/product_id_constants.php';
    
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
                    <?php
                    $user = null;
                    if(isset($_SESSION["user_name"])){
                        $user = $_SESSION["user_name"];
						$user_id = $_SESSION["user_id"];
                         echo "<h5 class='nav-link'>Welcome, $user</h5>";
                    }else if(isset($_SESSION["FBID"])){
						$user_id = $_SESSION["FBID"];
						$user = $_SESSION["FULLNAME"];
						echo "<h5 class='nav-link'>Welcome, $user</h5>";
					}
                     
                        
                    ?>
                </li>
                <br>
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/public/tracker.php">Tracking</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/public/register.php">Register
              <span class="sr-only">(current)</span></a>
			 </li>
			 "<li class='nav-item active'>
                 <a class='nav-link' href='/public/history.php'>Your History</a>
                    </li> 
            <?php
                if(isset($_SESSION['user_id']) || isset($_SESSION['FBID'])){
                    echo "<li class='nav-item'>
                 <a class='nav-link' href='/public/index.php?logout'>Log Out</a>
                    </li> ";
                }
				else	{
                echo "<li class='nav-item'>
                 <a class='nav-link' href='/public/login.php'>Log In</a>
                    </li> ";
				}
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="registration-page">
		<ul>
		<?php
			echo "<h3>Products Visited Recently:</h3><br>";
			$results = User::history($pdo, $user_id);
			foreach($results as $result){
				$count = 0;
				$product_id = $result['product_real_id'];
                    if(substr($product_id, -1) == '0'){

                        //case of 30 and 50

                        $product_id = (string) (substr($product_id, 0, 1) . '1' . substr($product_id, -1));

                        $product_name = getProductNameFromId($product_id);

                    }else{

                        $product_name = getProductNameFromId($product_id);

                    }
					echo "<li>" . $product_name . "</li>";

				
				
			}
		?>
		</ul>
	
 
</div>
    <!-- /.container -->

    <!-- Footer -->
   <!-- <footer class="py-5 bg-dark" style="position:absolute; bottom:0; width:100%">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Spartan Shop 2017</p>
      </div>
      <!-- /.container -->
  <!--  </footer> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>


</html>


