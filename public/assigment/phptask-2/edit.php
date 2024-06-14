<?php
ob_start();
include ('./config.php');
// print_r($_GET);
$idd = $_GET['stid'];
// echo $idd;
$name = '';
$email = '';
$mk1 = '';
$mk2 = '';
$mk3 = '';
$mk4 = '';
$sql = "SELECT * FROM students where stdid = '$idd'";
$result = $con->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    $name = $row['stdname'];
    $email = $row['std_email'];
    $mk1 = $row['physics'];
    $mk2 = $row['quantum_physics'];
    $mk3 = $row['cosmology'];
    $mk4 = $row['electromagnetism'];
    $stdimg = $row['std_img'];
} else {
    echo "not ok man !!!!!";
}




if (isset($_POST['img_submit'])) {
    if ($_FILES['img_file']['error'] === 4) {
        echo "oops image fiole do not exisit";
    } else {
        $filename = $_FILES['img_file']['name'];
        $filesize = $_FILES['img_file']['size'];
        $filelocname = $_FILES['img_file']['tmp_name'];
        $validformate = ['jpg', 'jpeg', 'png'];
        $imageformate = explode(".", $filename);
        $imageformate = strtolower(end($imageformate));
        // echo $imageformate;
        // exit;
        if (!in_array($imageformate, $validformate)) {
            echo "
       <script> alert('invalid file formate ')</script>";
        } else if ($filesize > 10000000) {
            echo "<script>alert('size of the file is lager than we expected ')</script>";
        } else {
            $newimgname = uniqid();
            $newimgname .= '.' . $imageformate;
            move_uploaded_file($filelocname, 'images/' . $newimgname);
            $sqlauery = "UPDATE students SET std_img = '$newimgname' WHERE id = $idd";
            mysqli_query($con, $sqlauery);
            header("location:./edit.php?stid=$idd");
        }
    }
}


?>
<?php include ('./header.php'); ?>
<div class="container-fluid">
    <div class="row mx-5">

        <div class="col-lg-5 m-3 shadow shadow-lg rounded-5 p-4">
            <form action="changes.php" method="post">
                <h6 class="text-center display-6">student marks</h6>
                <input type="text" value="<?php echo $idd; ?>" name="idd" hidden>
                <label for="">mrk1</label>
                <input type="number" class='form-control' value="<?php echo $mk1; ?>" name="mk1">
                <label for="">mrk2</label>
                <input type="number" class='form-control' value="<?php echo $mk2; ?>" name="mk2">
                <label for="">mrk3</label>
                <input type="number" class='form-control' value="<?php echo $mk3 ?>" name="mk3">
                <label for="">mrk4</label>
                <input type=" number" class='form-control' value="<?php echo $mk4 ?>" name="mk4">
                <input type="submit" name="changes" id="" class="btn btn-dark mt-3 col-lg-12" value='save changes'>
            </form>
        </div>
        <div class="col-lg-6  m-3 shadow-lg rounded-5 p-4">
            <div class="row">
                <h5 class="display-6 text-center">student profile</h5>
            </div>
            <div class="row">
                <div class="col-lg-7"><img src="images/<?php echo$stdimg;?>" alt="" class="img-fluid">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="img_file" accept=".jpg,.jpeg,.png" class="form-control mt-2">
                        <input type="submit" name="img_submit" class='btn btn-dark mt-2 col-lg-12'>
                    </form>
                </div>
                <div class="col-lg-5">
                    <h4 class="text-start">Name: <?php echo $name; ?></h4>
                    <h4 class="text-start">Email:<?php echo $email; ?></h4>

                </div>
            </div>

        </div>

    </div>

</div>