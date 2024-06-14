<?php 
$con = mysqli_connect('192.168.7.254','yaswant_juntrdev_usr','CtP4snL70aYzlD4R','yaswant_juntrdev_db',42209);

if(!$con){
    echo "connection error";
}
session_start();

?>