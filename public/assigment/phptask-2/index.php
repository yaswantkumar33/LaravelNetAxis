<?php
ob_start();
include ('./header.php');
include ('./config.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userrole = $_POST['userrole'];
    // echo "username is :".$name."<br> user email is :".$email."<br> user pass is ".$password."<br>the user role is :".$userrole;
    // echo $userrole;
    if ($userrole == 'student') {
        $sql = "INSERT INTO students (stdname, std_email, std_pass, userrole)
                VALUES ('$name', '$email', '$password','$userrole')";
        if ($con->query($sql) === TRUE) {
            // echo "New record created successfully";
            $_SESSION['std_email'] = $email;
            header("location:./student.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    if ($userrole == 'admin') {
        // header("location:admin.php");
        $sql = "INSERT INTO admindb (ad_name, ad_email, ad_pass, userrole)
                VALUES ('$name', '$email', '$password','$userrole')";
        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
            $_SESSION['ad_email'] = $email;
            header("location:./admin.php?");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
<div class="container ">
    <div class="row mt-5">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 mt-5">
            <div class="row mt-5 border-0 shadow-lg p-4 rounded-5">
                <form action="" method="post">
                    <h4 class="text-center text-capitalize display-6">s<span class="text-danger">i</span>gn up </h4>
                    <label for="Name">
                        <h5>Name</h5>
                    </label>
                    <input type="text" class="form-control" name="name">
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
                        <!-- <option value="admin">Admin</option> -->
                    </select>
                    <input type="submit" name="signup" id="submit" class="btn btn-dark col-lg-12 mt-3">
                    <p class="form-text">already signed <a href="login.php" class="text-decoration-none text-danger fs-5">click </a>to login</p>
                </form>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>



<?php

include ('./footer.php');

?>



<!-- role chossing pannel  -->