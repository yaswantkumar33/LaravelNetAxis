<?php
// <!-- file inclkudes  -->
ob_start();
require_once ('config.php');
require_once ('header.php');
$_SESSION['regyurl'] = $_SERVER['REQUEST_URI'];
$_SESSION['baurl']=$_SERVER['REQUEST_URI'];
$gettenword = explode(".", basename($_SERVER['REQUEST_URI']))[0];
// echo $gettenword;exit();
// declare the varibales from the seeion
if (isset($_SESSION['u_name'])) {
  $name = $_SESSION['u_name'];
} else {
  $name = "guest";
}
$word = $gettenword;
// init the varibales we need
$wordid;
$wordsyno;
$wordanto;
$cmsmsg = "";
$wordimg;
// select query to show the searched word

$sql = "SELECT * from `dictionary_wordstb` where word ='$word'";
$result = $con->query($sql);
if (mysqli_num_rows($result)>0) {
  while ($row = $result->fetch_assoc()) {
    $wordid = $row['wordid'];
    $wordsyno = $row['synonyms'];
    $wordanto = $row['antonyms'];
    $wordimg = $row['wordimg'];
  }
  $_SESSION['gword']=$word;
}else{
  header("location:./errorpage.php");
}
// json decode section
$danto = json_decode($wordanto);
$dsyno = json_decode($wordsyno);
// querry for comments
$sql2 = "SELECT * FROM `dictionary_commentstb` WHERE word = '$word';";
$result2 = $con->query($sql2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // we get the user comment from the post menthod
  $comment = $_POST['ucomments'];
  // adn we set time to th3 comments
  date_default_timezone_set("Asia/Kolkata");
  $time = date("Y-m-d  h:i:sa ");
  // insert query for new comments
  $sql = "INSERT INTO `dictionary_commentstb` (username,word,comments,status,c_time,wordid)
    VALUES('$name','$word','$comment','0','$time','$wordid')";
  $result = $con->query($sql);
  if ($result) {
    $cmsmsg .= "comments added sucessfully";
  }
}
// date cal section
// $date1 = new DateTime("2007-03-24");
// $date2 = new DateTime("2009-06-26");
// $interval = $date1->diff($date2);

?>
<!-- nav bar section  -->
<nav class="navbar cusbg1">
  <div class="container">
    <a class="cuscol1 display-6 text-decoration-none" href="./userhome.php"> <span class="cuscol2 fw-bold">D</span>ictionary</a>
    <h4 class="cuscol1">welcome <span class="text-white"><?php echo $name; ?></span></span></h4>
    <form class="d-flex">
      <?php
      if($name!="guest"){
        echo "
        <button class='btn  me-2 p-0'><a href='./addword.php' class='btn cusbg2 col-lg-12 fs-6'>+</a></button>
      <button class='btn  p-0 ' type='submit'><a href='../index.php' class='btn col-lg-12 cuscol1 fs-3 fw-bold cusbxsha me-2'><span class='cuscol2'>L</span>ogout</a></button>
        ";
      }else{
        echo "

        <button class='btn  p-0 ' type='submit'><a href='./register.php' class='btn col-lg-12 cuscol1 fs-3 fw-bold cusbxsha me-2'><span class='cuscol2'>R</span>egister</a></button>

        ";
      }
      ?>
      <button class="btn  p-0 " type="submit"><a href="../" class="btn col-lg-12 cuscol1 fs-3 fw-bold cusbxsha"><span class="cuscol2">B</span>ack</a></button>
    </form>
  </div>
</nav>

<!-- body section  -->
<div class="container-fluid ">
  <!-- word details section  -->
  <div class="container   p-4 mt-3 shadow-lg cusbg1 rounded-3">
    <div class="row">
      <div class="col-lg-7  p-5">
        <div class="card p-2">
          <img src="./assests/images/<?php echo $wordimg; ?>" class="card-img-fluid" alt="...">
        </div>
      </div>
      <div class="col-lg-5 cusbg2 p-3 rounded-3">
        <div class="row cusbg1 text-white py-2 rounded-3 cusbxsha">
          <h3 class="text-center text-capitalize cuscol1 "><span class="cuscol2">w</span>ord detailes</h3>
        </div>
        <div class="row mt-2">
          <h3 class="text-capitalize">word id :<?php echo $wordid; ?>
          </h3>
          <h3 class="text-capitalize">word :<?php echo $word; ?></h3>
          <h3 class="text-capitalize">synonyms :</h3><p class="fs-4 w-25"><?php
                                                foreach ($dsyno as $val) {
                                                  echo "$val,";
                                                }
                                                ?></p>
          <h3 class="text-capitalize">antonyms :<?php foreach ($danto as $val) {
                                                  echo "<span>$val,</span>";
                                                } ?></h3>
        </div>
        <div class="row mt-3">
          <?php
          if (isset($_SESSION['u_name'])) {
            echo "
            <div class='col-lg-12'>
            <button class='btn  col-lg-5 mx-3 '><a href='./addsyno.php' class='btn cusbg1 cuscol1 col-lg-12 row fs-4 cusbxsha'>Add Synoyms</a></button>
            <button class='btn  col-lg-5 mx-3'><a href='./addanto.php' class='btn col-lg-12 row cusbg1 cuscol2 fs-4 cusbxsha'>Add Antonyms</a></button>
          </div>
            ";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- comment section  -->
  <div class="container  mt-5 p-3">
    <div class="row ">
      <?php
      if (isset($_SESSION['u_name'])) {
        echo "
        <div class='row  col-lg-5 p-3 cusbg1 rounded-3  cusbxsha mb-2'>
        <h1 class='text-capitalize text-center cuscol1'>comments</h1>
        <form action='' method='post'>
          <h6 class='text-success'><?php echo $cmsmsg; ?></h6>
          <label for='' class='text-capitalize'>enter your comments here</label>
          <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='ucomments'></textarea>
          <input type='submit' name='csubmit' id='' class='btn cusbg2 cuscol3 fw-bold fs-6 mt-2 cusbxsha2' value='comment'>
        </form>
      </div>
        ";
      }



      ?>
      <?php
      if (isset($_SESSION['u_name'])) {
        echo " <div class='col-lg-1'>
        </div>
        <div class='row col-lg-6 shadow-lg  p-3 rounded-3 border cusbxsha' style='height: 320px; overflow:auto;'>
        <h2 class='text-center text-capitalize cusbg1 p-1 cuscol1 rounded-4 cusbxsha'>comments</h2>
        <div class='row'>'";
        while ($row = $result2->fetch_assoc()) {
          if ($row['status'] == '1' || $row['username'] == $name) {
            $a = new DateTime($row['c_time']);
            $b = new DateTime();
            $interval = $a->diff($b);
            echo "
              <div class='row mt-2'>
                <div class='col-lg-2 text-center'>

                <img src='./assests/images/user2.png' alt='' class='  ' height='50px'>
                <p class='text-center'>$row[username]</p>
              </div>
              <div class='col-lg-6'>$row[comments]</div>
              <div class='col-lg-4'>
                <div class='row'>
                   <div class='text-center col-lg-12'>$row[c_time]</div>
                   <div class='col-lg-4'></div>
                   <div class='col-lg-8'>$interval->days days ago</div>
                </div>
              </div>

            </div>
              ";
          }
        }
      }else{
        echo "
        <div class='container   mt-5 p-3'>
        <div class='row p-5 shadow cusbg1 shadow-lg rounded-3'>
            <div class='col-lg-5'></div>
            <div class='col-lg-2  cusbg2 shadow-lg rounded-3 mb-3'>
                <h3 class='text-capitalize text-center cucol1 fs-2'>comments</h3>
            </div>
            <div class='col-lg-5'></div>

        ";
        while ($row = $result2->fetch_assoc()) {
                if ($row['status'] == '1') {
                    echo "<div class='row p-2 cusbxsha mt-2'>
        <div class='col-lg-2 '>
        <img src='./assests/images/user2.png' alt='' class='img rounded-5' height='60px'></div>
                        <div class='col-lg-2 cuscol2 fs-5'>$row[username]</div>
                        <div class='col-lg-8 cuscol1 fs-5 text-center'>$row[comments]</div>
                    </div>";
                }
            }

       echo "
       </div>
       </div>
       ";
      }
      ?>

      <!-- other comments  -->


    </div>
  </div>
</div>
</div>

</div>
<?php require_once ('footer.php'); ?>
