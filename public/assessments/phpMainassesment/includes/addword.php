<?php
ob_start();
include ('./config.php');
include ('./header.php');
if(isset($_SESSION['u_name'])){
    $name = $_SESSION['u_name'];
}else{
    header("location:../index.php");
}
$sucessmsg = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $word = $_POST['s_word'];
    $wordanto = $_POST['an_word'];
    $wordsyno = $_POST['sy_word'];
    $name = $_SESSION['u_name'];
    $synoarr = array($wordsyno);
    $arranto = array($wordanto);
    // print_r($arranto);
    $enantoarr = json_encode($arranto);
    $ensynoarr = json_encode($synoarr);
    // echo $enantoarr;
    // echo $ensynoarr;
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
    // querry section 
    $sql = "SELECT * FROM `dictionary_wordstb` where word='$word'";
    $result = $con->query($sql);
    // echo $result;
    if (mysqli_num_rows($result) == 0) {
        $sql2 = "INSERT INTO `dictionary_wordstb`(username,word,antonyms,synonyms,wordimg,status)
        VALUES('$name','$word','$enantoarr','$ensynoarr','$newimgname','0')";
        $result2 = $con->query($sql2);
        if ($result2) {
            $sucessmsg .= "word added sucessfully";
        } else {
            echo "shittt";
        }
    } else {
        echo "word already exist you cant add it again ";
    }
}
?>
<nav class="navbar cusbg1">
    <div class="container">
        <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">D</span>ictionary</a>
        <h4 class="cuscol1">welcome <span class="text-white"><?php echo $name; ?></span></span></h4>
        <form class="d-flex">
            <button class="btn  p-0 " type="submit"><a href="login.php" class="btn col-lg-12 cuscol1 fs-2 fw-bold cusbxsha2"><span class="cuscol2">L</span>ogout</a></button>
        </form>
    </div>
</nav>
<div class="container-fluid">
    <div class="row p-5"></div>
    <div class="row mt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 cusbg2 p-5 rounded-3 shadow-lg">
            <div class="row text-center bg-dark py-5 rounded-4 p-3 ">
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="text-info">
                        <?php echo $sucessmsg; ?>
                    </p>
                    <label for="" class="form-label text-white col-lg-12">
                        <h4 class="cuscol1 fs-1"><span class="cuscol2">A</span>dd word here!!!</h4>
                    </label>
                    <input type="text" name="s_word" class="form-control col-lg-12 mb-3  cusbxsha2">
                    <label for="" class="text-white"> Add Word Antonym!</label>
                    <input type="text" name="an_word" class="form-control col-lg-12 mb-3 cusbxsha2">
                    <label for="" class="text-white">Add Word Synonym!</label>
                    <input type="text" name="sy_word" class="form-control col-lg-12 mb-3 cusbxsha2">
                    <label for="">
                        <h4 class="text-white my-2"><span class="cuscol1">Add </span>img to word here</h4>
                    </label>
                    <input type="file" name="wordimg" class="form-control col-lg-12 cusbxsha2" accept=".jpg, .jpeg, .png">
                    <button class="btn cusbg2 cuscol3 mt-2 col-lg-12 fs-5 fw-bold cusbxsha" type="submit">Add</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php
include ('./footer.php');
?>