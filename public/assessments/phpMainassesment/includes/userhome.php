<?php
// <!-- file inckudes -->
ob_start();
include('./config.php');
include('./header.php');
$errormsg = "";
// get name frinm the session 
if (!empty($_SESSION['u_name'])) {
  $name = $_SESSION['u_name'];
} else {
  header("location:../index.php");
}

if (isset($_GET['logout'])) {
  session_unset();
  header("location:../index.php");
}
if (isset($_GET['fomrbtnac'])) {
  $word = $_GET['s_word'];
  // select wuery for get word 
  $sql = "SELECT * from `dictionary_wordstb` where word='$word'";
  $result = $con->query($sql);
  if (mysqli_num_rows($result)) {
    while ($row = $result->fetch_assoc()) {
      // cehck section whether the word is approved or user created word 
      if ($row['status'] == '1' || $row['username'] == $name) {
        $_SESSION['seword'] = $word;
        header("location:./$word");
      } else {
        header("location:./errorpage.php");
      }
    }
  } else {
    header("location:./errorpage.php");
  }
  // header("location:userpreview.php");
}
?>
<!-- nav bar section  -->
<nav class="navbar cusbg1">
  <div class="container">
    <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">D</span>ictionary</a>
    <h4 class="cuscol1">welcome <span class="text-white"><?php if (!empty($name)) {
                                                            echo $name;
                                                          } else {
                                                            echo "can't get nane";
                                                          }
                                                          ?></span></h4>
    <form  method="get">
      <button class="btn  me-2 p-0"><a href="./addword.php" class="btn cusbg2 col-lg-12 fs-6">+</a></button>
      <button class="btn  p-0  me-2 btn  cuscol1 fw-bold letter fs-3" type="submit" name="logout"><span class="text-white">L</span>ogout</button>
    </form>
  </div>
</nav>
<!-- body section  -->
<div class="container-fluid">
  <div class="row p-5"></div>
  <div class="row mt-5">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 shadow-lg p-5 rounded-3 cusbg2">
      <div class="row text-center cusbg1 cusbxsha py-5  rounded-4 p-3 ">
        <form  method="GET">
          <p class='text-danger'> <?php echo $errormsg; ?> </p>
          <label for="" class="form-label  col-lg-12 text-center">
            <h4 class="fs-1 text-center cuscol2"><span class="cuscol1">S</span>earch word here</h4>
          </label>
          <input type="text" name="s_word" class="form-control col-lg-12 py-3 cusbxsha2" required>
          <button class="btn cusbg2 mt-2 col-lg-12 fs-4 fw-bold cusbxsha" type="submit" name="fomrbtnac">Submit</button>
        </form>
      </div>
    </div>
    <div class="col-lg-4"></div>
  </div>
</div>
<!-- footer add  -->
<?php require_once('./footer.php'); ?>