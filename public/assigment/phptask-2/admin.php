<?php
ob_start();
include ('./config.php');
$ademail = $_SESSION['ad_email'];
// echo $ademail;
$sql = "SELECT * FROM students";
$result = $con->query($sql);
?>
<?php include ('./header.php')?>
<div class="container-fluid">
    <div class="row p-4">
        <div class="collg-12 p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                      <th class="text-center  fs-5">stud id</th>
                      <th class="text-center  fs-5">stud name</th>
                      <th class="text-center  fs-5">stud email</th>
                      <th class="text-center  fs-5">stud m1</th>
                      <th class="text-center  fs-5">stud m2</th>
                      <th class="text-center  fs-5">stud m3</th>
                      <th class="text-center  fs-5">stud m4</th>
                      <th class="text-center  fs-5">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    if($result){
                        while($row= $result->fetch_assoc()){
                            echo "
                            <tr>
                            <td class='text-center'>$row[stdid]</td>
                            <td class='text-center'>$row[stdname]</td>
                            <td class='text-center'>$row[std_emial]</td>
                            <td class='text-center'>$row[physics]</td>
                            <td class='text-center'>$row[quantum_physics]</td>
                            <td class='text-center'>$row[cosmology]</td>
                            <td class='text-center'>$row[electromagnetism]</td>
                            <td class='text-center'><button class='btn'><a href='edit.php?stid={$row['stdid']}' class='btn btn-dark'>edit</a></button>

                            </tr>
                            
                            ";
                            
                        }
                        
                    }else{
                        echo "something went wrong";
                    }
                    ?>
                    
                  </tbody>
                
              </table>

        </div>
    </div>
</div>