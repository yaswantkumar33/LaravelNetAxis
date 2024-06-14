<?php
ob_start();
include('./config.php');
include('./header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userrole = $_POST['userrole'];
    // echo "username is :".$name."<br> user email is :".$email."<br> user pass is ".$password."<br>the user role is :".$userrole;
    // echo $userrole;
    if ($userrole == 'student') {
        $sql = "INSERT INTO students (stdname, std_emial, std_pass, userrole)
                VALUES ('$name', '$email', '$password','$userrole')";
        if ($con->query($sql) === TRUE) {
            // echo "New record created successfully";
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
            header("location:./admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
}
?>
<?php
include('./footer.php');
?>