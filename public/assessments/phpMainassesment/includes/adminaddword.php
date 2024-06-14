<?php
// <!-- file adds  -->
ob_start();
require_once('./config.php');
require_once('./header.php');
// get user name form the session 
if (isset($_SESSION['u_name'])) {
    $name = $_SESSION['u_name'];
} else {
    header("location:../index.php");
}
$name = $_SESSION['u_name'];
// declar8ing the eroor and sucess msg 
$errormsg = "";
$sucessmsg = "";
// echo $name;
// if s3er request === post 
if (isset($_GET['logout'])) {
    session_unset();
    header("location:../index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // we get the word from the post method 
    $word = $_POST['new_word'];
    // select query 
    $sql0 = "SELECT word from `dictionary_wordstb` where word='$word'";
    $result0 = $con->query($sql0);

    if (mysqli_num_rows($result0) > 0) {
        $errormsg .= "the word already there!! add something else";
    } else {
        $syno = array();
        $processed = json_encode($syno);
        // file upload section 
        if ($_FILES['wordimg']['error'] === 4) {
            echo "oops image fiole do not exisit";
        } else {
            $filename = $_FILES['wordimg']['name'];
            $filesize = $_FILES['wordimg']['size'];
            $filelocname = $_FILES['wordimg']['tmp_name'];
            $validformate = ['jpg', 'jpeg', 'png'];
            $imageformate = explode(".", $filename);
            $imageformate = strtolower(end($imageformate));
            if (!in_array($imageformate, $validformate)) {
                echo "
        <script> alert('invalid file formate ')</script>";
            } else if ($filesize > 10000000) {
                echo "<script>alert('size of the file is lager than we expected ')</script>";
            } else {
                $newimgname = uniqid();
                $newimgname .= '.' . $imageformate;
                move_uploaded_file($filelocname, 'assests/images/' . $newimgname);
            }
        }

        $sql = "INSERT INTO `dictionary_wordstb` (username,word,antonyms,synonyms,wordimg,status)
Values('$name','$word','$processed','$processed','$newimgname','0')";
        $result = $con->query($sql);
        if ($result) {
            $sucessmsg .= "word added sucessfully";
            header("location:./adminwordtable.php");
        } else {
            header("location:./errorpage.php");
        }
    }
}

?>
<!-- nav bar section  -->
<nav class="navbar cusbg1 p-3">
    <div class="container">
        <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">A</span>dmin</a>
        <div class="d-flex mt-3">
            <a href="./adminaddword.php" class="text-decoration-none cuscol1   fs-5  text-capitalize me-3">
                <h4>add word</h4>
            </a>
            <a href="./adminaddsy_anto.php" class="text-decoration-none text-white fs-5 text-capitalize me-3">
                <h4>add synonyms/antonyms</h4>
            </a>
            <a href="./adminwordtable.php" class="text-decoration-none text-white  fs-5 text-capitalize me-3">
                <h4>words table</h4>
            </a>
            <a href="./admincomtab.php" class="text-decoration-none text-white  fs-5    text-capitalize me-3">
                <h4>comments table</h4>
            </a>
        </div>
        <form action="">
            <button class="btn  p-0  me-2 btn  cuscol1 fw-bold letter fs-3" type="submit" name="logout"><span class="text-white">L</span>ogout</button>
        </form>
    </div>
</nav>
<!-- body section  -->
<div class="container-fluid">
    <div class="row p-5"></div>
    <div class="row mt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 cusbg2 p-5 rounded-3 shadow-lg">
            <div class="row text-center cusbg1 py-5  rounded-4 p-3 cusbxsha2">
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="cuscol1"><?php echo $errormsg;
                                        echo $sucessmsg ?></p>
                    <label for="" class="form-label text-white col-lg-12 cusbxsha2 rounded-3 mb-3">
                        <h4 class="cuscol1 fs-1"><span class="cuscol2">A</span>dd word here!!!</h4>
                    </label>
                    <input type="text" name="new_word" class="form-control col-lg-12 cusbxsha2">
                    <label for="" class="cuscol2 fs-4">Add <span class="cuscol1">word</span> img here!</label>
                    <input type="file" name="wordimg" class="form-control col-lg-12 mt-3" accept=".jpg, .jpeg">
                    <button class="btn cuscol1 cusbg1  mt-2 col-lg-12 fs-4 fw-bold cusbxsha2" type="submit">Add Word </button>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php require_once('./footer.php'); ?>