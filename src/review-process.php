<?php
    session_start();
    include 'models/Tracking.php';
    include 'Database.php';
    include '../settings.php';
            
            
    $db = new Database($settings);
     $pdo = $db->getPDO();
	 if(isset($_SESSION['FBID'])){
		 $user_id = $_SESSION['FBID'];
		 
	 }else{
		 $user_id = $_SESSION['user_id'];
	 }
     
     $product_id = $_SESSION['product_id'];
     $company_id = $_SESSION['company_id'];
     $rating = $_POST['rating'];
     $review = $_POST["comment"];
     $recommend = $_POST["recommend"];
     //static function insertReviewData($pdo, $company_id, $index, $user_id, $review, $recommend, $rating)
    Tracking::insertReviewData($pdo, $company_id, $product_id, $user_id, $review, $recommend, $rating);
    
    header("location: /");
     
     
     
     //header()

?>