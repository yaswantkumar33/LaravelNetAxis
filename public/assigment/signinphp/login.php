<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>

<body>



    <div class="container-fluid">
        <div class="row  my-2">
            <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                    <button class="btn btn-dark" id="darkbtn">dark mode </button>
                    <button class="btn btn-light" id="lightbtn">light mode </button>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="row  my-5">
                    <form action="" method="post" class="p-5">
                        <h1 class="text-capitalize text-center">log in page </h1>
                        <label for="username">
                            <h4 class="text-center text-capitalize">UserName</h4>
                        </label>
                        <input type="text" name="username" id="" class="form-control border-1">
                        <label for="userpass" class="text-capitalize">
                            <h4 class="text-center">UserPass</h4>
                        </label>
                        <input type="text" name="userpass" id="" class="form-control border-1">
                        <input type="submit" value="log-in" class="btn btn-dark col-lg-12 mt-3 fs-5" readonly
                            id="submitbtn">
                    </form>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>


    </div>

    <script src="css/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="jquery.min.js"></script>
    <script>
        $('#lightbtn').hide();
        $('#darkbtn').on('click', function () {
            $('body').removeClass('bg-white');
            $('body').addClass('bg-dark');
            $('.row').removeClass('text-black')
            $('.row').addClass('text-info')
            $('#submitbtn').removeClass('btn-dark');
            $('#submitbtn').addClass('btn-info');
            $('#darkbtn').hide();
            $('#lightbtn').show();
            
        })
        $('#lightbtn').on("click", function () {
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