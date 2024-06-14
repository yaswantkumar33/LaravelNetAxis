<?php
ob_start();
include ("./config.php");
include ('./header.php'); ?>

<link rel="stylesheet" href="./css/style.css">
<?php
$lerror = "";
$lmessage = "";
$serror = "";
$smessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // print_r($_POST);
    if ($_POST['submit'] == 'login') {
        if ($_POST['useremail'] == "" or $_POST['userpass'] == "") {
            $lerror .= "all fields must be filled ";
            // echo $lerror;
        } else {
            $email = $_POST['useremail'];
            $pass = $_POST['userpass'];
            $lmessage .= "email is: " . $email . "<br> pass is: " . $pass;
            $sql = "SELECT * FROM mov_users WHERE u_email='$email' AND u_pass = '$pass'";
            $result = $con->query($sql);
            // print_r($result);
            if (mysqli_num_rows($result) > 0) {
                // $lmessage = "sucessfully loged in ";
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['uid'] = $row['userid'];
                    $_SESSION['uemail'] = $row['u_email'];
                    $_SESSION['uname'] = $row['u_name'];
                }
                header("location:./display.php");
            } else {
                $lerror = "no user found" . $con->error;
            }
        }
    }
    if ($_POST['submit'] == 'signup') {
        if ($_POST['sname'] == "" or $_POST['semail'] == "" or $_POST['spass'] == "") {
            $lerror .= "all fields must be filled ";
            // echo $lerror;
        } else {
            $name = $_POST['sname'];
            $email = $_POST['semail'];
            $pass = $_POST['spass'];

            $sql = "INSERT into mov_users(u_email,u_name,u_pass)
            values ('$email','$name','$pass')";
            $result = $con->query($sql);
            if ($result) {
                // echo "the record has been added";
                $_SESSION['uemail'] = $email;
                $_SESSION['uname'] = $name;
                header("location:./display.php");
            } else {
                echo "something went wrong try again";
            }
        }
    }
}
?>
<div class="wrapper  rounded-4">
    <span class="bg-animation"></span>
    <span class="bg-animation2"></span>
    <div class="form-box login">
        <p class="text-danger"><?php echo $lerror; ?></p>
        <p class="text-info" id="message"><?php echo $lmessage; ?></p>
        <h2 class="animation" style="--i:0;">login</h2>
        <form action="index.php" method="post">
            <div class="input-box animation" style="--i:1;">
                <input type="text" required name='useremail' id='username'>
                <label for="username">UserName</label>
            </div>
            <div class="input-box animation" style="--i:2;">
                <input type="password" required name='userpass'>
                <label for="userpass">
                    User Password
                </label>
            </div>
            <button class="btn animation" style="--i:3;"><input type="submit" class="col-lg-12 border-0" name="submit" value="login"></button>
            <div class="logreg-link animation" style="--i:4;">
                <p>don't have a accont <a href="#" class="register-link">sign up</a></p>
            </div>
        </form>
    </div>
    <div class="info-text login">
        <h2 class="animation " style="--i:0;">Welcome Back</h2>
        <p class="animation" style="--i:1;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, dolorem.
        </p>
    </div>
    <!-- registration  -->
    <div class="form-box register">
        <h2 class="animation" style="--i:17;--j:0">Sign Up</h2>
        <form action="index.php" method='post'>
            <div class="input-box animation" style="--i:18;--j:1;">
                <input type="text" required name='sname'>
                <label for="username">UserName</label>
                <i class=""></i>
            </div>
            <div class="input-box animation" style="--i:19;--j:2;">
                <input type="email" required name='semail'>
                <label for="username">UserEmail</label>
                <i class=""></i>

            </div>
            <div class="input-box animation" style="--i:20;--j:3;">
                <input type="password" required name='spass'>
                <label for="userpass">
                    User Password
                </label>
                <i class=""></i>

            </div>
            <button class="btn animation" style="--i:21;--j:4"><input type="submit" class="col-lg-12 border-0" name="submit" value="signup"></button>
            <!-- <input type="submit" class="btn animation" style="--i:21;--j:4;" name='signup'>sign up </input> -->
            <div class="login-link animation" style="--i:22;--j:5;">
                <p>Already have a account<a href="#" class="login-link">log in</a></p>
            </div>
        </form>
    </div>
    <div class="info-text register">
        <h2 class="animation" style="--i:17; --j:0;">Welcome Back</h2>
        <p class="animation" style="--i:18;--j:1;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic, dolorem.</p>
    </div>
</div>
<?php include ('./footer.php'); ?>