<?php

require('datacon.php');
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

<body>
  <!-- As a link -->
  <?php

  ob_start();
  include('nav.php');
  $aa = $_SESSION['uname'];
  echo "<div class='row'><h2 class='text-center display-6'>greetings mr. <span class ='text-danger'>$aa</span></h2></div>";
  ?>
  <div class="container-fluid">

    <div class="row">
      <div class="row  my-2">
        <div class="row">
          <div class="col-lg-10"></div>
          <div class="col-lg-2">
            <button class="btn btn-dark" id="darkbtn">dark mode </button>
            <button class="btn btn-light" id="lightbtn">light mode </button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <button class="btn"><a class="btn btn-dark" href="./cart.php">go to cart </a></button>
    <div class="container-fluid  p-5">
      <div class="row">
        <?php foreach ($productdata['datas'] as $val) {
          $pid = $val['productid'];
          $pname = $val['productname'];
          $pimg = $val['productimg'];
          $pprice = $val['productprice'];
          echo "<div class='card col-lg-2 m-5 border-0 shadow p-2'>
        <div class='row'>
          <div class='col-lg-7'>
           <img class='img-fluid' src='./$pimg' alt=''>
          </div>
           <div class='card-body col-lg-5'>
            <h5 class='card-title'>$pname</h5>
            <p class='card-text'>$pprice</p>
            <a href='addcart.php?proid=$pid&username=$aa' id='$pid' class='btn btn-primary col-lg-12'>add</a>
            
            </div>
            <p class='card-text'>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil, quis.</p>
        </div>
        </div>";
        }
        ?>
      </div>
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