<!-- to create a new uyser and add to the data base   -->



<?php

// conection file 
include("config.php");

// we declare the emprty variable before 
$name = "";
$email = "";
$phone = "";
$address = "";

$error_text = "";
$sucess_text = "";


// thn if the server request ,ethod is post the below code will run 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // we declare the values to the already defined variables 
    $name = $_POST["name"];
    // echo"$name";
    $email = $_POST["email"];
    $phone = $_POST["phonenumber"];
    $address = $_POST["address"];

    // thn we use do while 
    do {

        // we check whether the post values are empty 
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $error_text .= "oops you need to fill all the fields";
            break;
        }
        // if not the below code will run 
        $sql = "INSERT INTO usersdata (username,useremail,userphone,useraddress)" .
            "VALUES('$name','$email','$phone','$address')";
        // then we insert the post values to table 
        // in result varibale we pass the query to the connection
        $result = $con->query($sql);

        if (!$result) {
            // if the result nis not true  below code will run 
            $error_text = "query went wrong" . $con->error;
            break;
        }
        // thn we empty the variables ans send the sucess message 
        $name = "";
        $email = "";
        $phone = "";
        $address = "";
        $sucess_text = "user added sucessfuly";


        header("location: index.php");
        exit();
    } while (true);
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreatePHP</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <h3 class="text-center display-5 text-capitalize">create new user</h3>
        </div>
        <div class="row p-4 shadow ">

            <?php

            if (!empty($error_text)) {

                echo "
    <div class='alert alert-warning alert-dismissible fade show ' role='alert'>
        <h5>$error_text</h5>
        <button class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

    </div>
    ";
            }
            ?>

            <form action="" method="post">
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">Name</h5>
                    </label>
                    <input type="text" class="form-control" name="name" value="">
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">E-mail</h5>
                    </label>
                    <input type="email" class="form-control" name="email" value="">
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">PhoneNumber</h5>
                    </label>
                    <input type="number" class="form-control" name="phonenumber" value="">
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">Address</h5>
                    </label>
                    <input type="text" class="form-control" name="address" value="">
                </div>
                <?php

                if (!empty($sucess_text)) {

                    echo "
    <div class='alert alert-success alert-dismissible fade show ' role='alert'>
        <h5>$$sucess_text</h5>
        <button class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

    </div>
    ";
                }
                ?>
                <div class="row mb-3">
                    <div class="row">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-2"><a href="index.php" class="btn btn-danger col-lg-12 p-2 mb-2" role="button">cancel</a></div>
                        <div class="col-sm-2">
                            <a href="index.php">
                                <button type="submit" class="btn btn-dark text-white col-lg-12 p-2">submit</button>
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>


    <script src="css/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>