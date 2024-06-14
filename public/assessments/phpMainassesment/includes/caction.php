<?php
// <!-- comments action page   -->
ob_start();
require_once ('./config.php');
// we get id from the get method 
$comid = $_GET['wid'];
// as well as action aslo 
$action = $_GET['action'];
// and we do the process depending upon the action 
if ($action == "approve") {
    // query 
    $sql1 = "UPDATE `dictionary_commentstb` SET status = '1' where comid='$comid'";
    $result1 = $con->query($sql1);
    if ($result1) {
        header("location:./admincomtab.php");
    } else {
        header("location:./errorpage.php");
    }
} elseif ($action == "disapprove") {
    $sql2 = "UPDATE `dictionary_commentstb` SET status = '0' where comid='$comid'";
    $result2 = $con->query($sql2);
    if ($result2) {
        header("location:./admincomtab.php");
    } else {
        header("location:./errorpage.php");
    }
} elseif ($action == "delete") {
    $sql3 = "DELETE  FROM `dictionary_commentstb` WHERE comid='$comid'";
    echo $sql3;
    $result3 = $con->query($sql3);
    if ($result3) {
        header("location:./admincomtab.php");
    } else {
echo"ohh shit";
        // header("location:errorpage.php");
    }
} else {
    header("location:./errorpage.php");
}
