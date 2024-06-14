<?php
// <!-- admin word table page  -->
ob_start();
require_once ('./config.php');
require_once ('./header.php');
if(isset($_GET['logout'])){
    session_unset();
    header("location:../index.php");
  
  }
// query to select the word formthe word s table 
if(isset($_SESSION['u_name'])){
$name= $_SESSION['u_name'];
}else{
    header("location:../index.php");
}
$sql = "SELECT * FROM `dictionary_wordstb`";
$result = $con->query($sql);
if ($result) {
}
?>
<!-- nav bar section  -->
<nav class="navbar navbar-dark bg-dark p-3">
    <div class="container">
        <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">A</span>dmin</a>
        <div class="d-flex mt-3 text-center">
            <a href="./adminaddword.php" class="text-decoration-none cuscol2 fs-5          text-capitalize me-3">
                <h4>add word</h4>
            </a>
            <a href="./adminaddsy_anto.php" class="text-decoration-none cuscol2 fs-5     text-capitalize me-3">
                <h4>add synonyms/antonyms</h4>
            </a>
            <a href="./adminwordtable.php" class="text-decoration-none cuscol1 fs-5      text-capitalize me-3">
                <h4>words table</h4>
            </a>
            <a href="./admincomtab.php" class="text-decoration-none cuscol2 fs-5          text-capitalize me-3">
                <h4>comments table</h4>
            </a>
        </div>
        <form action="">
      <button class="btn  p-0  me-2 btn  cuscol1 fw-bold letter fs-3" type="submit" name="logout"><span class="text-white">L</span>ogout</button>
     </form>
    </div>
</nav>
<!-- main body section  -->
<div class="container mt-5 col-lg-12 ">
    <div class="row p-4 shadow-lg cusbg2 rounded-4">
        <table class="cusbg1 cuscol1 text-center text-capitalize rounded-4" ">
            <thead class="">
                <tr class=" fs-5 fw-bold">
            <th scope="col"><span class="cuscol2">W</span>ord <span class='cuscol2'>I</span>d</th>
            <th scope="col"><span class="cuscol2">U</span>ser <span class="cuscol2">N</span>ame</th>
            <th scope="col"><span class="cuscol2">W</span>ord</th>
            <th scope="col"><span class="cuscol2">W</span>ord <span class="cuscol2">I</span>mg</th>
            <th scope="col"><span class="cuscol2">S</span>tatus</th>
            <th scope="col"><span class="cuscol2">A</span>ction</th>
            </tr>
            </thead>

            <tbody class="cuscol2"> <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "
            <tr>
            <td>$row[wordid]</td>
            <td>$row[username]</td>
            <td>$row[word]</td>
            <td>
            <img src='./assests/images/$row[wordimg]' alt='' class=''height='70px'>
            </td>
            <td>$row[status]</td>
            <td>";
// btn toggle section 
                                        if ($row['status'] == "0") {
                                            echo "
                <button class='btn  my-2'>
    <a href='./wordaction.php?wid=$row[wordid]&action=approve' class='row btn cusbg3 cuscol3 fw-bold fs-6 cushov cusbxsha'>Approve</a>
            </button>
                ";
                                        } else {
                                            echo "
                <button class='btn  my-2'>
            
            <a href='./wordaction.php?wid=$row[wordid]&action=disapprove' class='row btn cusbg2 fs-6 fw-bold cuscol3 cushov cusbxsha'>Disaprove</a>
            
            </button>
                
                ";
                                        }


                                        echo "
            <button class='btn  my-2'>
            <a href='./wordaction.php?wid=$row[wordid]&action=delete' class='row btn cusbg4 cuscol2 fs-6 fw-bold cushov cusbxsha'>Delete</a>
            </button>
            </td>
            </tr>
                ";
                                    }
                                    ?>
            </tbody>
        </table>

    </div>

</div>
<?php require_once ('./footer.php'); ?>