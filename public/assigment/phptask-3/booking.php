<?php
ob_start();
include ('./config.php');
// print_r($_GET);
$movid = $_GET['mid'];
echo $movid;
$userid;
$mname = "";
$mprice = "";
$useremail= $_SESSION['uemail'];

$sql0= "SELECT userid FROM mov_users where u_email ='$useremail'";
$result0=$con->query($sql0);
if($result0){
    while($row = $result0->fetch_assoc()){
        $userid=$row['userid'];
        // echo$userid;
    }
}
$sql = "SELECT * from movietb where movid = '$movid'";
$result = $con->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $mname = $row['movie_name'];
        $mprice = $row['movie_price'];
        $mpic=$row['moviepic'];
        $sql2 = "INSERT INTO mvb_table(movname,movprice,userid,movid,movpic)
        values('$mname','$mprice','$userid','$movid','$mpic')";
        $result2 = $con->query($sql2);
        if ($result2) {
            header("location:./display.php");
            // echo 'movie added sucessfully';
        } else {
            echo 'something went wrong' . $con->error;
        }
    }
} else {
    echo "something went wrong " . $con->error;
}
?>
<?php include ('./header.php'); ?>
<?php include ('./footer.php'); ?>