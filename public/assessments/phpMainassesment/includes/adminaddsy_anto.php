<?php
ob_start();
require_once('./config.php');
require_once('./header.php');
if (isset($_SESSION['u_name'])) {
    $name = $_SESSION['u_name'];
} else {
    header("location:../index.php");
}
$sucessmsg = "";
$errmsg = "";
if (isset($_GET['logout'])) {
    session_unset();
    header("location:../index.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // print_r($_POST);
    $wordid = $_POST['word_id'];
    $newqord = $_POST['n_word'];
    $typeofadd = $_POST['typeofadd'];

    $sql0 = "SELECT synonyms,antonyms from `dictionary_wordstb` where wordid = '$wordid'";
    $result0 = $con->query($sql0);
    if (mysqli_num_rows($result0) > 0) {
        while ($row = $result0->fetch_assoc()) {
            $word_anto = $row['antonyms'];
            $word_syno = $row['synonyms'];
        }
        $rawensyno = json_decode($word_syno, true);
        $rawenanto = json_decode($word_anto, true);
        if ($typeofadd == "Antonyms") {
            array_push($rawenanto, $newqord);
            $enandata = json_encode($rawenanto);
            $sql1 = "UPDATE `dictionary_wordstb` SET antonyms='$enandata' where wordid='$wordid'";
            $result1 = $con->query($sql1);
            if ($result1) {
                $sucessmsg .= "antonyms added sucessfully";
            } else {
                echo "something went wrong in the anto add";
            }
        }
        if ($typeofadd == "Synonyms") {
            array_push($rawensyno, $newqord);
            $ensydata = json_encode($rawensyno);
            $sql2 = "UPDATE `dictionary_wordstb` SET synonyms='$ensydata' where wordid='$wordid'";
            $result2 = $con->query($sql2);
            if ($result2) {
                $sucessmsg .= "synonyms added sucessfully";
            } else {
                echo "something went wrong in the anto add";
            }
        }
    } else {
        $errmsg .= "word id not found";
    }
}
?>
<!-- nav bar section  -->
<nav class="navbar navbar-dark bg-dark  p-3">
    <div class="container">
        <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">A</span>dmin</a>
        <div class="d-flex mt-3">
            <a href="./adminaddword.php" class="text-decoration-none text-white    fs-5  text-capitalize me-3">
                <h4>add word</h4>
            </a>
            <a href="./adminaddsy_anto.php" class="text-decoration-none cuscol1  fs-5 text-capitalize me-3">
                <h4>add synonyms/antonyms</h4>
            </a>
            <a href="./adminwordtable.php" class="text-decoration-none text-white  fs-5  text-capitalize me-3">
                <h4>words table</h4>
            </a>
            <a href="./admincomtab.php" class="text-decoration-none text-white     fs-5  text-capitalize me-3">
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
        <div class="col-lg-4 cusbg2 p-5 rounded-4 shadow-lg ">
            <div class="row text-center cusbg1 py-5 rounded-4 p-3 cusbxsha2">
                <form action="" method="post" enctype="multipart/form-data">
                    <p class='text-info'>
                        <?php
                        if (isset($sucessmsg)) {
                            echo $sucessmsg;
                        }
                        if (isset($errmsg)) {
                            echo $errmsg;
                        }
                        ?>
                    </p>
                    <label for="" class="form-label text-white col-lg-12 cusbxsha2 rounded-3 mb-3">
                        <h4 class="cuscol1 fs-1"><span class="cuscol2">E</span>nter word ID</h4>
                    </label>
                    <input type="number" name="word_id" class="form-control col-lg-12" min=1>
                    <label for="">
                        <h5 class="text-center text-capitalize cuscol1 my-3">enter <span class="cuscol2">word</span> here</h5>
                    </label>
                    <input type="text" name="n_word" class="form-control col-lg-12">
                    <label for="" class="cuscol1 fs-5 my-2">Click below to <span class='cuscol2'>select</span></label>
                    <select name="typeofadd" id="" class="form-select mt-3 cuscol3 fs-5 fw-bold cusbg2 border-0" required>
                        <option value="Antonyms">Antonyms</option>
                        <option value="Synonyms">Synonyms</option>
                    </select>
                    <button class="btn cusbg1 mt-1 col-lg-12 fs-4 fw-bold cusbxsha2 cuscol1" type="submit">Add</button>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php require_once('./footer.php'); ?>