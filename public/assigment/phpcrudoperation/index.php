<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUDOP</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <div class="row mb-4">
            <h4 class="text-center display-6">list of users</h4>
            <div class="col-lg-3">
                <a href="create.php" class="btn btn-dark text-white">create new user</a>
            </div>
            <div class="col-lg-9"></div>
        </div>


        <div class="row">
            <table class="table">

                <thead>
                    <tr>
                        <td>id</td>
                        <td>Name</td>
                        <td>email</td>
                        <td>Phone Number</td>
                        <td>Adress</td>
                        <td>created at</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    <?php include("config.php") ?>
                    <?php
                    $sql = "SELECT * FROM USERSDATA";
                    $result = $con->query($sql);
                    if (!$result) {
                        die("there is a error check it out ");
                    }
                    while ($row = $result->fetch_assoc()) {
                        echo "
                
                <tr>
                    <td>$row[id]</td>
                    <td>$row[username]</td>
                    <td>$row[useremail]</td>
                    <td>$row[userphone]</td>
                    <td>$row[useraddress]</td>
                    <td>$row[createdat]</td>
                    <td>
                        <a href='edit.php?id=$row[id]' class='btn btn-dark'>edit</a>
                        <a href='delete.php?id=$row[id]' class='btn btn-danger'>delete</a>
                    </td>
                </tr>
                
                
                
                
                ";
                    }

                    ?>

                </tbody>
            </table>
        </div>
        

    </div>

    <!-- <?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
// echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?> -->

    <script src="css/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>