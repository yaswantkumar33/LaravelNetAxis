<?php 
ob_start();
include 'nav.php';
include 'datacon.php';
$name = $_SESSION['uname'];
// echo $name;
$sql = "SELECT * FROM cart_users WHERE username = '$name'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="style/nav.css">
</head>

<body class="bg-sdark">
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-11"></div>
            <div class="col-lg-1">
                <button class="btn btn-dark" id="darkbtn">dark mode </button>
                <button class="btn btn-light" id="lightbtn">light mode </button>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row ">
            <p class="text-center display-6">welcome <span class="text-danger display-4"><?php echo $name; ?></span></p>
            <h1 class="display-6 text-capitalize text-center">cart</h1>
        </div>
        <div class="row">
            <?php
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $items = $row['products'];
                    $items = json_decode($items, true);
                    // print_r($it);
                    // print_r($items);
                    if (isset($items)) {
                        usercart();
                    }
                }
            } else {
                echo "no data found";
            }
            ?>

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










<?php
function usercart()
{
    global $items;
    foreach ($items as $vals) {
        echo "
                <div class='card col-lg-2 m-3 border-0 shadow'>
                <div class='row p-3'>
                <div class='col-lg-7'>
                <img src='$vals[productimg]' class='img-fluid' alt='...'>
                </div>
                   <div class='col-lg-5'>
                         <p class='card-text text-capitalize'>$vals[productname]</p>
                         <p class='card-text text-capitalize'>$vals[productprice]</p>
                         <button class='btn '><a href='delete.php?pid=$vals[productid]' class='btn btn-dark col-lg-12'>delete</a></button>
                         </div>
                   </div>
                </div>
            ";
    }
}

?>