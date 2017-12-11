<?php 
session_start();
unset($_SESSION['FBID']);
unset($_SESSION['FULLNAME']);
header("Location: fbindex.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
