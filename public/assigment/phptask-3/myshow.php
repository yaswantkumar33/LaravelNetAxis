<?php
ob_start();
include ('./header.php');
include ('./config.php');
$uid = $_SESSION['uid'];
$useremail = $_SESSION['uemail'];
// echo $useremail;

$sql =  "SELECT mvb_table.movname,mvb_table.movprice,mvb_table.movid,mvb_table.movpic,mvb_table.userid
FROM mov_users INNER JOIN mvb_table ON mov_users.userid = mvb_table.userid where mvb_table.userid='$uid'";
$result = $con->query($sql);
// if ($result) {
// }
?>
<div class="container">
    <div class="row mt-5 p-5"></div>
    <div class="row mt-4 p-2"></div>
    <div class="row mt-5">
        <div class="col-lg-12 rounded-5 shadow-lg bg-white p-3 mt-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">
                            <h5 class='display-6'>mov name </h5>
                        </th>
                        <th scope="col">
                            <h5 class='display-6'>mov price</h5>
                        </th>
                        <th scope="col">
                            <h5 class='display-6'>movid </h5>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                        <td>
                        <img src='images/$row[movpic]' alt='' height='60px' class=''>
                        </td>
                        <td>
                        $row[movname]</td>
        <td>$row[movprice]</td>
        <td>$row[movid]</td>
        </tr>
        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>



    </div>
</div>















<?php include 'footer.php'; ?>