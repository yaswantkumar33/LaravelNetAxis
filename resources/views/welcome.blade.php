<!DOCTYPE html>
<html lang="{{ str_replace('_', '-',app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="assests/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bganimation" id="bganimation">
        <div class="backgroundanime">

        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="display-6 text-decoration-none cuscol2" href="#"><i class="fa-solid fa-id-card"></i><span
                    class="ms-2 fw-bold cuscol1">P</span>ortfolio</a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.html"><button
                                class="btn btn-dark cusbxsha fs-5 fw-bold"><i class="fa-solid fa-house-laptop"></i><span class="ms-1">Home</span></button></a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown mt-2">2
                            <button class="btn btn-dark dropdown-toggle cusbxsha fs-5 fw-bold" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-square-caret-down"></i><span class="ms-1">Assessments</span>
                            </button>
                            <ul class="dropdown-menu cusbg1 cuscol2" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/bootstrapAssesment1/">bootstrap 1</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/bootstrapAssessment2/">bootstrap 2</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize cuscol2 "
                                        href="./assessments/jsAssessment/">js</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/jQueryAssessment/">jQuery</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/modernjsAssesment/">modernjs</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/pluginAssement/">plugin</a>
                                </li>
                                <li><a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/angularMainassesment/">angularjs </a></li>
                                <li><a class="dropdown-item text-capitalize cuscol2"
                                        href="./assessments/phpMainassesment/">PHP</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assigment/"><button
                                class="btn btn-dark cusbxsha fs-5 fw-bold text-capitalize ms-2"><i class="fa-solid fa-file-import"></i><span class="ms-1">assigments</span></button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-5 p-5">

    </div>
    <div class="container-fluid position-absolute mt-5">
        <div class="row   ">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 cusbg2 p-5 rounded-3 cusbxsha">
                <div class="row cusbg1 p-5 shadow-lg rounded-3">
                    <div class="col-md-6">
                        <img src="assests/avatar.png" alt="" class="img imguser" height="250px" width="250px">
                    </div>
                    <div class="col-md-6 text-start">
                        <h3 class="text-capitalize cuscol2"><span class="cuscol1">hello</span> am</h3>
                        <h1 class="text-capitalize cuscol1">yaswant kumar s </h1>
                        <h4 class="text-capitalize cuscol2">full stack web developer <span class="cuscol1">traniee</span></h4>
                        <p class="cuscol2">Netaxis IT Solutions (P) Ltd</p>
                        <div><a href="assessments/"
                                class="btn cusbtn fs-5 fw-bold text-capitalize cusbxsha mx-2 my-2">assessments</a> <a
                                href="assigment/" class="btn fs-5 fw-bold cusbtn text-capitalize cusbxsha  mx-2 my-2">assigment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>

    </div>




    <script src="assests/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
