<?php
ob_start();
include ('datacon.php');
$proid = $_GET['proid'];
$uname = $_GET['username'];
// echo $proid;
$productemparr = array();
foreach ($pdatas as $val) {
    //  print_r($val[0]);
    $idd = $val['productid'];
    if ($proid == $idd) {
        // // print_r($val);
        // echo "
        // <img src='$val[productimg]' alt=''>";
        array_push($productemparr, $val);
        // print_r($productemparr);
        $encodedata = json_encode($productemparr);
        // echo $encodata . "<br>";
        // print_r(json_decode($encodata));
        $sql = "SELECT products FROM cart_users WHERE username = '$uname'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (isset($row["products"])) {
                    $var1 = $row['products'];
                    $var2 = json_decode($var1, true);
                    array_push($var2, $val);
                    // print_r($var2);
                    $encodata = json_encode($var2);
                    // echo $encodata;
                    $sql = "UPDATE cart_users SET  products='$encodata' WHERE username = '$uname'";
                    // $items = json_decode($encodata);
                    // // print_r($items);
                    // foreach($items as $vals){
                    //     print_r($vals);
                    // }
                    if ($con->query($sql) === TRUE) {
                        echo "updated sucessfully";
                        header("location:display.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                } else {
                    $sql = "UPDATE cart_users SET products = '$encodedata' WHERE username = '$uname'";
                    if ($con->query($sql) === TRUE) {
                        echo "empty is something now ";
                        // header("location:cart.php");
                        header("location:display.php");

                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }                    
                }
            }
        }
    }
}
