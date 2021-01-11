<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "mang_xa_hoi";

// Create connection
$con = new mysqli($servername ,$username,$password,$bd);
// mysqli_query('SET CHARACTER SET UFT8');
// mysqli_query("SET SESSION collation_connection = 'utf8_general_ci' SET UFT8'") or die (mysqli_error());

// // Check connection
// if ($con->connect_error) {
//   die("Connection failed: " . $con->connect_error);
// }
// echo "Connected successfully";
?>