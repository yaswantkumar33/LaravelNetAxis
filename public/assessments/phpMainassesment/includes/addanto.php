<?php
ob_start();
include ('./config.php');
include ('./header.php');

$back=$_SESSION['baurl'];
if(isset($_SESSION['u_name'])){
    $name = $_SESSION['u_name'];
}else{
    header("location:../index.php");
}
$word = $_SESSION['gword'];
$sucessmsg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $newanto = $_POST['a_word'];
    // echo $newanto;
    $sql = "SELECT antonyms from `dictionary_wordstb` where word = '$word'";
    $result = $con->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $raw = $row['antonyms'];
            $processed = json_decode($raw, true);
            // print_r($processed);
            array_push($processed, $newanto);
            // print_r($processed);
            $enco = json_encode($processed);
            // echo $enco;
            $sql2 = "UPDATE `dictionary_wordstb` set antonyms='$enco' where word = '$word'";
            $result2 = $con->query($sql2);
            if ($result) {
                // echo "all okay yopoo!!!!";
            }
        }
    }
}
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">D</span>ictionary</a>
        <h4 class="cuscol1">welcome <span class="cuscol2"><?php echo $name; ?></span></span></h4>
        <form class="d-flex">
            <button class="btn  p-0 " type="submit"><a href="./login.php" class="btn col-lg-12 cuscol1 fw-bold fs-3"><span class="cuscol2 fs-4">L</span>ogout</a></button>
            <button class="btn  p-0 " type="submit"><a href="<?php echo $_SESSION['baurl'];?>" class="btn col-lg-12 cuscol1 fw-bold fs-3"><span class="cuscol2 fs-4">B</span>ack</a></button>

        </form>
    </div>
</nav>
<div class="container-fluid">
    <div class="row p-5"></div>
    <div class="row mt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="row text-center bg-dark py-5 mt-5 rounded-4 p-3 shadow-lg">
                <form action="" method="post">
                    <p class="text-info">
                        <?php echo $sucessmsg; ?>
                    </p>
                    <label for="" class="form-label text-white col-lg-12">
                        <h4><span class="cuscol1">A</span>dd Antonyms <span class="cuscol1">to</span></span> <?php echo $word; ?></h4>
                    </label>
                    <input type="text" name="a_word" class="form-control col-lg-12">
                    <button class="btn cusbg2 fs-4 fw-bold mt-2 col-lg-12" type="submit">Add Antonymss</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php
include ('./footer.php');
?>
