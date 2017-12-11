<?php
$db_host="localhost";
$db_user="demo";
$db_pw="demo";
$db_name="test";

$conn=new mysqli($db_host,$db_user,$db_pw,$db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>