<?php
ob_start();
require 'datacon.php';

$itemid = $_GET['pid'];
// echo $itemid;
$uname = $_SESSION['uname'];
$sql = "SELECT * FROM users WHERE username = '$uname'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items = $row['products'];
        $items = json_decode($items, true);
        // print_r($items);

        foreach ($items as $key => $vals) {
            $idd = $vals['productid'];
            // print_r($vals['productid']);
            if($itemid == $idd){
                // echo $key;
                unset($items[$key]);

            }

        }
        // print_r($items);
        $endt = json_encode($items);
        echo  $endt;
        $sql2= "UPDATE users SET products = '$endt' WHERE username = '$uname'";
        if($con->query($sql2)===TRUE){
            // echo "delected sucessfulyy";
            header("location:cart.php");
        }else{
            echo "something went wrong";
        }
    }
}
