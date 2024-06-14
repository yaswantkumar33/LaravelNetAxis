<?php 
// db connection section 
// servername--192.168.7.254;
// username--yaswant_juntrdev_usr;
// pass--CtP4snL70aYzlD4R;
// db name--yaswant_juntrdev_db;
// port---42209
$con = mysqli_connect('192.168.7.254','yaswant_juntrdev_usr','CtP4snL70aYzlD4R','yaswant_juntrdev_db',42209);

if(!$con){
    echo "connection error";
}
// condition to strat section if the session is not start in the page 
session_start(); 

  