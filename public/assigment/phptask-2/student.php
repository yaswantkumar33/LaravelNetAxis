<?php
ob_start();
include ('./config.php');
$stdemailk = $_SESSION['std_email'];
// echo "the student email is " . $stdemailk;

$sql = "SELECT * FROM students WHERE std_email = '$stdemailk'";

include './header.php';
?>



<div class="container-fluid">
    <div class="row center">
        <h6 class="text-center display-6 my-4">student profile</h6>
        <?php
        $result = $con->query($sql);
        if ($result) {
            // echo "all ok ";
        } else {
            echo "something went wrong";
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stdname = $row['stdname'];
                $stdemail = $row['std_email'];
                $stdmark1 = $row['physics'];
                $stdmark2 = $row['quantum_physics'];
                $stdmark3 = $row['cosmology'];
                $stdmark4 = $row['electromagnetism'];
                echo "
            <div class='col-lg-5 m-3 border-0 p-4 shadow-lg rounded-5'>
                <div class='row'>
                    <h4 class='text-center col-lg-12 bg-white text-dark p-3 '>N<span class='text-danger'>a</span>me: {$stdname}</h4>
                    <h4 class='text-center col-lg-12 bg-white text-dark p-3 '>E<span class='text-danger'>m</span>ail: {$stdemail}</h4>
                    <h4 class='text-center col-lg-12 bg-white text-dark p-3 '>a<span class='text-danger'>d</span>dress: toyko,japan</h4>
                    <h4 class='text-center col-lg-12 bg-white text-dark p-3 '>a<span class='text-danger'>g</span>e: 21</h4>
                </div>
            </div>
            <div class='col-lg-6 m-3 border-0 p-5 shadow-lg bg-secondary rounded-5'>
                <div class='row'>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                              <th scope='col'>physics</th>
                              <th scope='col'>quantum_physics</th>
                              <th scope='col'>cosmology</th>
                              <th scope='col'>electromagnetism</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{$stdmark1}</td>
                              <td>{$stdmark2}</td>
                              <td>{$stdmark3}</td>
                              <td>{$stdmark4}</td>
                            </tr>
                          </tbody>
                      </table>
                </div>
            </div>                
                    ";
            }
        }
        ?>

    </div>

</div>