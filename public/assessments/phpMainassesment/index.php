<?php
require_once ('includes/config.php');
ob_start();
// required files here 
require_once ('includes/header.php');
// we declare the empty variable error nmsg
$errmsg = "";
if(isset($_SESSION['u_name']) && $_SESSION['u_name']!="admin"){
    header("location:./includes/userhome.php");
}elseif(isset($_SESSION['u_name'])){
    header("location:./includes/adminwordtable.php");
}
// unset($_SESSION['u_name']);
// and we declare a seession varinbale of the deafult file location 
$_SESSION['enteryurl'] = "PHPsampleassesment/index.php";
// and thn we get the file location of the page the user register
$_SESSION['regyurl'] = $_SERVER['REQUEST_URI'];
// thn we check if the word varibale in the get global cope isset 
if (isset($_GET['s_word'])) {
    // get the word from the the get  
    $word = $_GET['s_word'];
    if ($word == "") {
        $errmsg .= "enter the word";
    } else {
    }
    // query section 
    // we selct the row rom the eords tavle wheere word = user searched word 
    $sql = "SELECT word,status FROM `dictionary_wordstb` where word= '$word'";
    $result = $con->query($sql);
    // th nwe check oif the it has greater than 0 rows 
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['status'] == '1') {
                $_SESSION['seword'] = $row['word'];
                header("location:./includes/$word");
            } else {
                $errmsg .= "You don't have acess to this word ";
            }
        }
        // if not we redirect to the error page 
    }
}
?>
<!-- nav bar section -->
<nav class="navbar navbar-dark bg-dark cusbg1">
    <div class="container">
        <a class=" display-6 cuscol1"> <span class="cuscol2 fw-bold">D</span>ictionary</a>
        <div>welcome guest</div>
        <form class="d-flex my-2">
            <button class="btn  p-0 me-2 "><a href="./includes/register.php" class="btn col-lg-12 fs-3 fw-bold  cuscol1 "><span class="  cuscol2">R</span>egister</a></button>
            <form action="">
                <button class="btn  p-0  me-2" type="submit"><a href="./includes/login.php" class="btn col-lg-12 cuscol1 fw-bold letter fs-3"><span class=" cuscol2">L</span>ogin</a></button>
            </form>
        </form>
    </div>
</nav>

<!-- main container section  -->
<div class="container-fluid">
    <div class="row p-5"></div>
    <div class="row mt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 shadow-lg p-5 rounded-4 cusbg2 ">
            <div class="row text-center  py-5  cusbg1 rounded-4 p-3">
                <form action="" method="GET">
                    <p class=" cuscol1"><?php echo $errmsg; ?></p>
                    <label for="" class="form-label  col-lg-12">
                        <h4 class="fs-1 cuscol1"><span class="cuscol2">S</span>earch</h4>word here!!!
                    </label>
                    <input type="text" name="s_word" class="form-control col-lg-12">
                    <button class="btn cusbg2 cuscol3 mt-3  col-lg-12" type="submit">
                        <h4>Submit</h4>
                    </button>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
        </div>
    </div>
</div>
<!-- we add footer file  -->
<?php
require_once ('includes/footer.php');
?>