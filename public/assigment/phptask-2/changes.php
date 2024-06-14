<?php 
ob_start();
include ('./config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['changes']){
        print_r($_POST);
        $stid = $_POST['idd'];
        $stmk1 = $_POST['mk1'];
        $stmk2 = $_POST['mk2'];
        $stmk3 = $_POST['mk3'];
        $stmk4 = $_POST['mk4'];
        // echo $stid;
        // echo $stmk1;
        // echo $stmk2;
        // echo $stmk3;
        // echo $stmk4;

        // $sql = "SELECT * FROM students WHERE id = '$stid'";
        $sql = "UPDATE students SET physics = '$stmk1',quantum_physics ='$stmk2',cosmology = '$stmk3', electromagnetism = '$stmk4'";
        // $result = $con->query($sql);
        // if($result){
        $result = $con->query($sql);
        if($result){
            // echo "updated done ";
            header("location:./admin.php");

        }else{
            echo "something went wrong";
        }


        // }else{
        //     echo "something went wrong".$con->error;
        // }
    }
}
?>