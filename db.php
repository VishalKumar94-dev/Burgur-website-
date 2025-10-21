<?php

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "food_project";

$conn = new mysqli($servername,$username,$pass,$dbname);

if($conn->connect_error){
    header("index.php" . connect_error());
    
}

?>

