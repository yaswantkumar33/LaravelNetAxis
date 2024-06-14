<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="crudopyas";


$con = new mysqli($servername,$username,$password,$dbname);

if($con->connect_error){
    die("connection is failed check it again ". $con->connect_error);
}

?>