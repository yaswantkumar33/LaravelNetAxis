<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbnmae = "yasdb";


$con = new mysqli($servername, $username, $password, $dbnmae);


if ($con->connect_error) {
  die("connection failed:" . $con->connect_error);
}


?>