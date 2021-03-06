<!DOCTYPE html>
<html lang="en">
<?php
/**
 * Created by PhpStorm.
 * User: huyvo
 * Date: 11/26/17
 * Time: 5:00 PM
 */

/*
include "../src/models/AnObject.php";

$object = new AnObject("Hello", "hello");

$object->echoImage("http://huyvanvo94.com/img/cs.jpg", 100, 100);*/

include '../src/models/Tracking.php';
include '../src/Database.php';
include '../settings.php';
include '../src/product_id_constants.php';


$db = new Database($settings);
$pdo = $db->getPDO();

$results = Tracking::fetchTopFiveMostVisited($pdo);

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Spartan Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-tracker.css" rel="stylesheet">

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
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/public/tracker.php">Tracking
                    <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/public/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/public/login.php">Log In</a>
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
<div class="container">

    <div class="top-five">
        <br>
        <h2 class="m-0 text-center text-black">Most Visited Marketplace Products</h2>
        <br>
        <!-- top five list here -->
        <ul>
            <?php
//            echo count($results);
            foreach ($results as $result){
                $product_name = getProductNameFromId($result['product_real_id']);
                echo "<li>" . $product_name .  " was visited " . $result['instance'] . " times</li>";
            }
            ?>
        </ul>
    </div>

    <div class="top-five-by-company">
        <div class="company">
            <h4>Tutoring</h4>
            <ul>
                <?php
                $count = 0;
                $results = Tracking::fetchTopFiveMostVisitedInEachCompany($pdo, 1);
                foreach($results as $result){
                    $product_id = $result['product_real_id'];
                    if(substr($product_id, -1) == '0'){
                        //case of 30 and 50
                        $product_id = (string) (substr($product_id, 0, 1) . '1' . substr($product_id, -1));
                        $product_name = getProductNameFromId($product_id);
                    }else{
                        $product_name = getProductNameFromId($product_id);
                    }
                    //$product_name = getProductNameFromId($result['product_real_id']);
                    echo "<li>" . $product_name . "</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company" >
            <h4>Gemstones</h4>
            <ul>
                <?php
                $count = 0;
                $results = Tracking::fetchTopFiveMostVisitedInEachCompany($pdo, 2);
                foreach($results as $result){
                    $product_id = $result['product_real_id'];
                    if(substr($product_id, -1) == '0'){
                        //case of 30 and 50
                        $product_id = (string) (substr($product_id, 0, 1) . '1' . substr($product_id, -1));
                        $product_name = getProductNameFromId($product_id);
                    }else{
                        $product_name = getProductNameFromId($product_id);
                    }
                    //$product_name = getProductNameFromId($result['product_real_id']);
                    echo "<li>" . $product_name . "</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company" >
            <h4>Interior Design</h4>
            <ul>
                 <?php
                $count = 0;
                $results = Tracking::fetchTopFiveMostVisitedInEachCompany($pdo, 3);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    echo "<li>" . $product_name . "</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company">
            <h4>Chinese Resturant</h4>
            <ul>
                <?php
                $count = 0;
                $results = Tracking::fetchTopFiveMostVisitedInEachCompany($pdo, 4);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    echo "<li>" . $product_name . "</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company">
            <h4>Construction</h4>
            <ul>
                 <?php
                $count = 0;
                $results = Tracking::fetchTopFiveMostVisitedInEachCompany($pdo, 5);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    echo "<li>" . $product_name . "</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
    </div> <!-- top-five-company -->


    <div class="line"></div>

    <div class="best-reviewed">
        <h2 class="m-0 text-center text-black">Best Reviewed Marketplace Products</h2>
        <br>
        <!-- top five list here -->
        <ul>
             <?php
                $count = 0;
                $results = Tracking::fetchTopFiveBestReview($pdo);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    $avg_review = round($result['avg_review'], 2);
                    echo "<li>" . $product_name . " " . $avg_review . "/5 stars</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
        </ul>
    </div> <!-- best-reviewed -->

    <div class="best-reviewed-by-company">
        <div class="company">
            <h4>Tutoring</h4>
            <ul>
                 <?php
                $count = 0;
                $results = Tracking::fetchTopFiveBestReviewInEachCompany($pdo, 1);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    $avg_review = round($result['avg_review'], 2);
                    echo "<li>" . $product_name . " " . $avg_review . "/5 stars</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company" >
            <h3>Gemstones</h3>
            <ul>
                   <?php
                $count = 0;
                $results = Tracking::fetchTopFiveBestReviewInEachCompany($pdo, 2);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    $avg_review = round($result['avg_review'], 2);
                    echo "<li>" . $product_name . " " . $avg_review . "/5 stars</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company" >
            <h4>Interior Design</h4>
            <ul>
                 <?php
                $count = 0;
                $results = Tracking::fetchTopFiveBestReviewInEachCompany($pdo, 3);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    $avg_review = round($result['avg_review'], 2);
                    echo "<li>" . $product_name . " " . $avg_review . "/5 stars</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company">
            <h4>Chinese Resturant</h4>
            <ul>
                  <?php
                $count = 0;
                $results = Tracking::fetchTopFiveBestReviewInEachCompany($pdo, 3);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    $avg_review = round($result['avg_review'], 2);
                    echo "<li>" . $product_name . " " . $avg_review . "/5 stars</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
        <div class="company">
            <h4>Construction</h4>
            <ul>
                  <?php
                $count = 0;
                $results = Tracking::fetchTopFiveBestReviewInEachCompany($pdo, 5);
                foreach($results as $result){
                    $product_name = getProductNameFromId($result['product_real_id']);
                    $avg_review = round($result['avg_review'], 2);
                    echo "<li>" . $product_name . " " . $avg_review . "/5 stars</li>";
                    if($count++ > 1){
                        break;
                    }
                }
                ?>
            </ul>
        </div>
    </div> <!-- best-reviewed-company -->


</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark" style="position:absolute; bottom:0; width:100%; height:10%">
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
