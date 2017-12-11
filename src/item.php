<?php  session_start(); 
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Item</title>

    <!-- Bootstrap core CSS -->
    <link href="../../public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../public/css/shop-item.css" rel="stylesheet">

    <!-- ionic icons -->
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body>

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
                         echo "<h5 class='nav-link'>Welcome, $user</h5>";
                    }else if(isset($_SESSION["FBID"])){
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
                    <a class="nav-link" href="../public/tracker.php">Tracking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/register.php">Register</a>
                </li>
               <?php
                if(isset($_SESSION['user_id']) || isset($_SESSION['FBID'])){
					echo "<li class='nav-item'>
                 <a class='nav-link' href='/public/history.php'>Your History</a>
                    </li> ";
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
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Spartan Shop</h1>
            <div class="list-group">

                <a href="index.php?company_id=1" class="list-group-item">Tutoring</a> <!-- Huy company id 1-->
                <a href="index.php?company_id=2" class="list-group-item">Gemstones</a>  <!-- andrew company id 2-->
                <a href="index.php?company_id=3" class="list-group-item">Interior Design</a> <!-- kevin company id 3-->
                <a href="index.php?company_id=4" class="list-group-item">Chinese Food Restaurant</a>  <!-- xuan company id 4-->
                <a href="index.php?company_id=5" class="list-group-item">Construction</a>  <!-- mangesh company id 5-->
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <!-- Dynamically display item -->
            <?php

            $index = $_GET['index'];
            $company_id = $_GET['company_id'];
            $_SESSION['product_id'] = $index;
            $_SESSION['company_id'] = $company_id;


            include 'hash_map_constants.php';
            include 'WebsiteConstants.php';
            include 'models/Tracking.php';
            include 'Database.php';
            include '../settings.php';

            $db = new Database($settings);
            $pdo = $db->getPDO();
            
            if(isset($_SESSION["user_id"])){
                $user = $_SESSION["user_id"];
            }else if(isset($_SESSION["FBID"])){
                $user = $_SESSION["FBID"];
				//$truncated_user = substr($user, 0, 4);
				//echo $truncated_user;
				$username = $_SESSION["FULLNAME"];
				$sql="select * from Users where _id=".$user;
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				
				if(count($stmt->fetchAll()) == 0){
					$sql = "INSERT INTO Users(_id,firstName)
              values (:_id,:firstName)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':_id', $user);
            $stmt->bindValue(':firstName', $username);
            $stmt->execute();
				}
				
            }else{
				$user = 0;
				
			}
            
            Tracking::insertData($pdo, $company_id, $index, $user);
           /*
            if($_SESSION["user_id"]==null){
                echo "debug1";
                
            }else{
                echo $_SESSION["user_id"];
                Tracking::insertData($pdo,$company_id,$index,$_SESSION["user_id"]);
            }
           */ 

            switch ($company_id){
                case WebsiteConstants::$huy_company_id:
                    global $huy_items;
                    appendItem($huy_items[$index]);
                    break;
                case WebsiteConstants::$andrew_company_id:
                    global $andrew_items;
                    appendItem($andrew_items[$index]);
                    break;
                case WebsiteConstants::$xuan_company_id:
                    global $xuan_items;
                    appendItem($xuan_items[$index]);
                    break;
                case WebsiteConstants::$kevin_company_id:
                    global $kevin_items;
                    appendItem($kevin_items[$index]);
                    break;
                case WebsiteConstants::$mangesh_company_id:
                    global $mangesh_items;
                    appendItem($mangesh_items[$index]);
                    break;
                default:
                    echo "Error";
            }


            function appendItem($item){

                $src = $item->getImageUrl();
                $content = $item->getDescription();
                $price = $item->getPrice();
                $title = $item->getTitle();


                echo "<div class=\"card mt-4\">";
                echo "<img class=\"card-img-top img-fluid\" style='max-height:500px; max-width:500px' src=$src alt=\"\">";
                echo "<div class=\"card-body\">";
                echo "<h3 class=\"card-title\">$title</h3>";
                echo "<h4>$price</h4>";
                echo "<p class=\"card-text\">$content</p>";
                echo "<span class=\"text-warning\">&#9733; &#9733; &#9733; &#9733; &#9734;</span>";
                echo "4.0 stars";
                echo "</div>";
                echo "</div>";
            }

            ?>


            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Product Reviews
                </div>
                <div class="card-body">
                   <?php
                        $result = Tracking::fetchReviewData($pdo, $company_id, $index);
                        if(count($result)> 0){
                            foreach($result as $review){
                                echo "<big>".$review['review']."/5 stars</big><p>".$review['review_desc']."</p><small class='text-muted'>Posted by ". $review['firstName'] ."</small><hr>";
                            }
                        }
                   ?>
                    <hr>
                    <?php
                        if(isset($_SESSION["user_id"]) || isset($_SESSION["FBID"])){
                            echo " <div class='form'>
					
                        <br>
                        <form class='review-form' id='review-form' action='review-process.php' method='POST'>
                        <textarea rows='4' cols='50' name='comment' placeholder='Please enter your review here...' required>
					</textarea><br>
                            <select placeholder='Select Rating' name='rating' id='rating' required>
                                <option default>Select Rating</option>
                                <option value='5'>5</option>
                                <option value='4'>4</option>
                                <option value='3'>3</option>
                                <option value='2'>2</option>
                                <option value='1'>1</option>
                            </select>
                            <select name='recommend' id='recommend' required>
                                <option default>Recommendation</option>
                                <option value='yes'>Yes</option>
                                <option value='no'>No</option>
                            </select>
                            <button>submit</button>
                        </form>

                    </div> <!-- end form -->";
                        }
                    
                    ?>
                   
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Spartan Shop 2017</p>
        </div>
        <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="../../public/vendor/jquery/jquery.min.js"></script>
    <script src="../../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
