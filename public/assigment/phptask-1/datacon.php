<?php 

$con = mysqli_connect('192.168.7.254','yaswant_juntrdev_usr','CtP4snL70aYzlD4R','yaswant_juntrdev_db',42209);

if(!$con){
    echo "connection error";
}
session_start();

$dummystr = file_get_contents('./script/productdatas.json');
$productdata = json_decode($dummystr, true);
$pdatas=$productdata['datas'];
// print_r($pdatas);
$_SESSION['arrays']=array();
?>

