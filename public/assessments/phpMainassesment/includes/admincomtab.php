  <?php
  ob_start();
  require_once ('./config.php');
  require_once ('./header.php');
  if(isset($_GET['logout'])){
    session_unset();
    header("location:../index.php");
  
  }

  if(isset($_SESSION['u_name'])){
    $name= $_SESSION['u_name'];
    }else{
        header("location:../index.php");
    }

  $sql = "SELECT * FROM `dictionary_commentstb`";
  $result = $con->query($sql);
  if ($result) {
  }
  ?>
  <!-- nav section  -->
  <nav class="navbar navbar-dark bg-dark p-3">
    <div class="container">
      <a class="cuscol1 display-6 text-decoration-none"> <span class="cuscol2 fw-bold">A</span>dmin</a>
      <div class="d-flex mt-3">
        <a href="./adminaddword.php" class="text-decoration-none cuscol2 fs-5     text-capitalize me-3">
          <h4>add word</h4>
        </a>
        <a href="./adminaddsy_anto.php" class="text-decoration-none cuscol2 fs-5 text-capitalize me-3">
          <h4>add synonyms/antonyms</h4>
        </a>
        <a href="./adminwordtable.php" class="text-decoration-none cuscol2 fs-5 text-capitalize me-3">
          <h4>words table</h4>
        </a>
        <a href="./admincomtab.php" class="text-decoration-none cuscol1   fs-5   text-capitalize me-3">
          <h4>comments table</h4>
        </a>
      </div>
      <form action="">
      <button class="btn  p-0  me-2 btn  cuscol1 fw-bold letter fs-3" type="submit" name="logout"><span class="text-white">L</span>ogout</button>
     </form>
    </div>
  </nav>
  <!-- comments table section  -->
  <div class="container mt-4 col-lg-12">
    <div class="row comtab cusbxsha">
      <table class="cusbg1   cuscol2 text-center text-capitalize">

        <thead class=''>
          <tr>
            <th scope=" " class="cuscol1 fs-5"><span class="cuscol2">c</span>ommentid</th>
            <th scope=" " class="cuscol1 fs-5"><span class="cuscol2">u</span>sername</th>
            <th scope=" " class="cuscol1 fs-5"><span class="cuscol2">w</span>ord</th>
            <th scope=" " class="cuscol1 fs-5"><span class="cuscol2">c</span>omments</th>
            <th scope=" " class="cuscol1 fs-5"><span class="cuscol2">s</span>tatus</th>
            <th scope=" " class="cuscol1 fs-5"><span class="cuscol2">a</span>ction</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $result->fetch_assoc()) {
            echo "
  <tr>
            <td>$row[comid]</td>
            <td>$row[username]</td>
            <td>$row[word]</td>
            <td>$row[comments]</td>
            <td>$row[status]</td>
            <td>";

            // button if else toggle section 
            if ($row['status'] == "0") {
              echo "
              <button class='btn  me-2 mb-2'>
              <a href='./caction.php?wid=$row[comid]&action=approve' class='row btn cusbg3 cuscol3 fw-bold fs-6 cushov cusbxsha'>Approve</a>
              </button>
              ";
            } else {
              echo "
              <button class='btn  me-2 mb-2'>
              <a href='./caction.php?wid=$row[comid]&action=disapprove' class='row btn cusbg2 fw-bold fs-6 cushov cusbxsha'>Disapprove</a>
              </button>
              ";
            }
            echo "
            <button class='btn me-3  mb-2'>
            <a href='./caction.php?wid=$row[comid]&action=delete' class='row btn cusbg4 cushov cuscol2 fs-6 fw-bold cusbxsha'>Delete</a>
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