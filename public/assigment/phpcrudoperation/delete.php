<?php 

// here we get the id from the index.php by parsin it in the href "?$row["id"]"
if(isset($_GET["id"])){

    // if we get the id we do the below things 

$id=$_GET["id"];
// we declare $id = get id 
include ("config.php");
// we include the connection file 

// here hte sql query 
$sql= "DELETE FROM usersdata WHERE id = $id";
// thn we send the sql query to the con 
$con->query($sql);
}
// after all this we redirect to main oage 
header("location: index.php");
exit;
?>
