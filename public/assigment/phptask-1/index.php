<?php
ob_start();
include("datacon.php");
$error = "";
$passhas = "";
if (isset($_POST["submit"])) {
    // print_r($_POST);
    $userName = $_POST["username"];
    $useremail = $_POST["useremail"];
    $userpass = $_POST["userpassword"];
    $repass = $_POST["re_password"];
    $passwordhash = password_hash($userpass, PASSWORD_DEFAULT);
    if (empty($userName) or empty($useremail) or empty($userpass)) {
        $error = "all fields must be filled <br>";
    }
    if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        $error .= "the emial is invalid  <br>";
    }
    if (strlen($userpass) < 8) {
        $error .= "the pass length shopuld be 8 ";
    }
    if ($userpass != $repass) {
        $error .= "the pass is not same ";
    }
    require_once "datacon.php";
    $sql = "SELECT * FROM cart_users WHERE useremail = '$useremail'";
    $result = mysqli_query($con, $sql);
    $rowcount = mysqli_num_rows($result);
    echo "$rowcount";
    if (mysqli_num_rows($result) > 0) {
        $error .= "the email already exist";
    } else {
        // $passhas=$passwordhash; 
        require_once "datacon.php";
        $sql = "INSERT INTO cart_users (username,useremail,userpass) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($con);
        $preparestmt = mysqli_stmt_prepare($stmt, $sql);
        if ($preparestmt) {
            mysqli_stmt_bind_param($stmt, "sss", $userName, $useremail, $userpass);
            mysqli_stmt_execute($stmt);
            $_SESSION['uname'] = $_POST['username'];
            echo "<div class =' alert alert-sucess'>you registed sucessfully</div>";
            header('location:./display.php');
        } else {
            die("oops something went wrong");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php sign-up</title>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="style/nav.css">
</head>

<body>
    <?php include ('nav.php');?>
    <div class="conatainer w-100">
        <div class="row  my-2">
            <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                    <button class="btn btn-dark" id="darkbtn">dark mode </button>
                    <button class="btn btn-light" id="lightbtn">light mode </button>
                </div>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="row col-lg-4 mt-3 shadow p-5">
                        <p class="text-danger">
                            <?php echo $error;
                            echo $passhas; ?></p>
                        <form action="index.php" method="post">
                            <h2 class="text-capitalize text-center">sign up page
                            </h2>
                            <label for="username" class="my-1  p-2">
                                <h4>username</h4>
                            </label>
                            <input type="text" class="form-control p-2" name="username" placeholder="fullname">
                            <label for="userpassword" class="my-1 p-2">
                                <h4>useremail</h4>
                            </label>
                            <input type="email" class="form-control p-2" name="useremail" placeholder="email">
                            <label for="userpassword" class="my-1 p-2">
                                <h4>userpassword</h4>
                            </label>
                            <input type="password" class="form-control p-2" name="userpassword" placeholder="password">
                            <label for="userpassword" class="my-1 p-2">
                                <h4>re-type the pass</h4>
                            </label>
                            <input type="password" class="form-control p-2" name="re_password" placeholder="confrim password">
                            <div class="form-btn mt-3">
                                <input type="submit" name="submit" class="btn btn-dark col-lg-12">
                            </div>
                        </form>
                        <p class="text-capitalize">already have a acoount want to
                            log in <a href="login.php">click me</a></p>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <script src="lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="lib/jquery.min.js"></script>
    <script>
        $('#lightbtn').hide();
        $('#darkbtn').on('click', function() {
            $('body').removeClass('bg-white');
            $('body').addClass('bg-dark');
            $('.row').removeClass('text-black')
            $('.row').addClass('text-info')
            $('#submitbtn').removeClass('btn-dark');
            $('#submitbtn').addClass('btn-info');
            $('#darkbtn').hide();
            $('#lightbtn').show();

        })
        $('#lightbtn').on("click", function() {
            $('body').removeClass('bg-dark');
            $('body').addClass('bg-white');
            $('.row').removeClass('text-info')
            $('.row').addClass('text-black')
            $('#submitbtn').removeClass('btn-info');
            $('#submitbtn').addClass('btn-dark');
            $('#lightbtn').hide();
            $('#darkbtn').show();
        })
    </script>
</body>

</html>