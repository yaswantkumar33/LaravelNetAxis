<?php

// we inclklude the connection file 
include("config.php");
// thn we declare the variables 
$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

// the messages to show inpage 
$error_text = "";
$sucess_text = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {



    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }
    $id = $_GET["id"];

    $sql = "SELECT * FROM usersdata where id = $id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index.php");
        exit;
    }


    $name = $row["username"];
    $email = $row["useremail"];
    $phone = $row["userphone"];
    $address = $row["useraddress"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phonenumber"];
    $address = $_POST["address"];
    
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $error_text .= "oops you need to fill all the fields";
            break;
        }


        $sql = "UPDATE usersdata
            SET username='$name', useremail='$email', userphone='$phone', useraddress='$address'
            WHERE id = $id";

        $result = $con->query($sql);

        if (!$result) {
            $error_text = "query went wrong" . $con->error;
            break;
        }
        $sucess_text = "user detailes has been updated ";



        header("location: index.php");
        exit();
    } while (false);
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
            <h3 class="text-center display-5 text-capitalize">edit user details</h3>
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
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">Name</h5>
                    </label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">E-mail</h5>
                    </label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">PhoneNumber</h5>
                    </label>
                    <input type="number" class="form-control" name="phonenumber" value="<?php echo $phone; ?>">
                </div>
                <div class="row mb-3">
                    <label for="" class="col-form-label ">
                        <h5 class="text-capitalize">Address</h5>
                    </label>
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
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
                        <div class="col-sm-2"><a href="index.php"><button type="submit" class="btn btn-dark text-white col-lg-12 p-2">submit</button></a></div>
                    </div>

                </div>
            </form>
        </div>
    </div>


    <script src="css/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>