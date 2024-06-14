<?php
ob_start();
include ('./header.php');
include ('./config.php');
$movid = $_GET['mid'];
$sql = "SELECT * from movietb where movid = '$movid'";
$result = $con->query($sql);
if ($result) {
}
?>
<div class="container-fluid p-5">
    <div class="row p-3">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 shadow-lg rounded-bottom-5 p-4">
            <div class="row">
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='col-lg-12 text-center'>
                       <h2 class='text-center text-capitalize'>$row[movie_name]</h2>
                       <img src='images/$row[moviepic]' alt='' class='img-thumbnail my-2'>
                    </div>
                    <div class='col-lg-12 text-center'>
                    <h5>$row[movie_price]$/-</h5>
                    <p class='text-capitalize fs-5'>this movie is a documentry about the great hack happen in the american histry,some scences had been cut fort he public safety,most of the story line made bvased on the true story </p>
                    <form method='get'>
                    <input type='number' class='form-control' min=0 name='numtic'>
                    <button class='btn btn-dark col-lg-12 my-4' type='submit' name='submit'>book now</button>
                    </form>
                    </div>
                    ";
                }
                ?>

            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>