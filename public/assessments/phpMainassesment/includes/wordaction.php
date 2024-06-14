<?php
// we add the config file 
ob_start();
require_once ('config.php');
// print_r($_GET)
// th nwe set the get values ib a var for post process 
$wordid = $_GET['wid'];
$action = $_GET['action'];
// echo $wordid."<br>";
// echo $action;
// thn we chech what the action is 
if ($action == "approve") {
    // update query to approve 
    $sql1 = "UPDATE `dictionary_wordstb` SET status = '1' where wordid='$wordid'";
    $result1 = $con->query($sql1);
    if ($result1) {
        header("location:./adminwordtable.php");
    } else {
        header("location:./errorpage.php");
    }
} elseif ($action == "disapprove") {
    // update query fior the disapprove 
    $sql2 = "UPDATE `dictionary_wordstb` SET status = '0' where wordid='$wordid'";
    $result2 = $con->query($sql2);
    if ($result2) {
        header("location:./adminwordtable.php");
    } else {
        header("location:./errorpage.php");
    }
} elseif ($action == "delete") {
    // query for select  delete  action 
    $sql4 = "SELECT * FROM dictionary_wordstb where wordid = '$wordid'";
    $result4 = $con->query($sql4);
    if ($result4) {
        while ($row = $result4->fetch_assoc()) {
            $word_img = $row['wordimg'];
            // echo $word_img;
            unlink("./assests/images/" . $word_img);
        }
    }
    // query to delete action 
    $sql3 = "DELETE  FROM `dictionary_wordstb` WHERE wordid='$wordid'";
    $result3 = $con->query($sql3);
    if ($result3) {
        header("location:./adminwordtable.php");
    } else {
        header("location:./errorpage.php");
    }
    $sql6 = "DELETE FROM dictionary_commentstb where wordid=$word";
    $result6 = $con->query($sql6);
} else {
    header("location:./errorpage.php");
}
