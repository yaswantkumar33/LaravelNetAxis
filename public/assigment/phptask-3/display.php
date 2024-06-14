<?php
ob_start();
include ('./header.php');
include ('./config.php');
$sql = "SELECT * FROM movietb";
$result = $con->query($sql);
if ($result) {
} else {
    echo "something went wrong";
}
$username = $_SESSION['uname'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center ">
            <h4 class="display-5 fw-bold mb-3">welcome to thew shows page MR. <span class="text-info"><?php echo $username; ?></span></h4>
        </div>
        <div class="col-lg-5"></div>
        <div class="col-lg-2"><button class="btn btn-dark col-lg-12"><a class="btn btn-dark col-lg-12 p-0" href="myshow.php"><span class="tetx-white fs-4">my shows</span></a></button></div>
        <div class="col-lg-5"></div>
    </div>
    <div class="row p-5">
        <div class="row p-4">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "
            <div class=' col-lg-2 m-2 p-5 mx-4 shadow-lg rounded-5'>
              <div class='row'>
                 <img src='images/$row[moviepic]' class='img-thumbnail p-4s' alt='...'>
              </div>
              <div class='row text-center'>
                  <h5 class='card-title'>$row[movie_name]</h5>
              </div>
              <div class='card-body text-center'>
                 <p>$row[movie_price]$/-</p>
            </div>
            <form>
        
            <button class='btn col-lg-12 '><a href='booking.php?mid=$row[movid]' class='btn btn-dark col-lg-12 px-3 pt-2'>book now</a></button>
            </form>
        </div>";
            }
            ?>
        </div>
    </div>

</div>

<?php include ('./footer.php'); ?>