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
        <div class="row">
            <div class="col-lg-11"></div>
            <div class="col-lg-1">
                <button class="btn btn-dark" id="darkbtn">dark mode </button>
                <button class="btn btn-light" id="lightbtn">light mode </button>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5">
        <div class="row">
            <p class="text-center display-6">welcome <span class="text-danger display-4"><?php echo $name; ?></span></p>
            <h1 class="display-6 text-capitalize text-center">cart</h1>
        </div>
