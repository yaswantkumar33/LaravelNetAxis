<?php
ob_start();
include ('./header.php');
include ('./config.php');
$error="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        if ($_POST['userrole'] == 'admin') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // echo $email;
            // echo $password;
            $select = mysqli_query($con, "SELECT * FROM std_admin WHERE ad_email = '$email' AND ad_pass = '$password'") or die('oops something went wrong ');
            if (mysqli_num_rows($select) > 0) {
                $_SESSION['ad_email']=$email;
                header("location:./admin.php");
            } else {
                echo "no admin user found";
            }
        }
        if ($_POST['userrole'] == 'student') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($email == ""){
                $error = "the email is empty";
            }
            $select = mysqli_query($con, "SELECT * FROM students WHERE std_emial = '$email' AND std_pass='$password'") or die('oops something went wrong');
            if (mysqli_num_rows($select) > 0) {
                $_SESSION['std_email']=$email;
                header("location:./student.php");
            }
        }
    }
}
?>
<div class="container ">
    <div class="row mt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 mt-5">
            <div class="row mt-5 border-0 shadow-lg p-4 rounded-5">

                <form action="login.php" method="post">
                    <?php echo $error;?>
                    <h4 class="text-center text-capitalize display-6">l<span class="text-danger">o</span>g in</h4>
                    <label for="Email">
                        <h5>E<span class="text-danger">m</span>ail</h5>
                    </label>
                    <input type="email" class="form-control" name="email">
                    <label for="Password">
                        <h5>P<span class="text-danger">a</span>ssword</h5>
                    </label>
                    <input type="password" class="form-control" name="password">
                    <label for="selectrole">
                        <h5>S<span class="text-danger">e</span>lect Role</h5>
                    </label>
                    <select name="userrole" id="userrole" class="form-control">
                        <option value="student">Student</option>
                        <option value="admin">Admin</option>
                    </select>
                    <input type="submit" name="login" id="submit" class="btn btn-dark col-lg-12 mt-3">
                    <p class="form-text">New here!! <a href="index.php" class="text-decoration-none text-danger fs-5">click </a>to sign-up</p>

                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php

include ('./footer.php');

?>