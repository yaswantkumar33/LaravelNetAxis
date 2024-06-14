<?php
ob_start();
include('./config.php');
include('./header.php');
$errormsg = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $pass = $_POST['userpass'];
    $encyptpass = md5($pass);
    // select query to check if the user alredy register 
    $sql = "SELECT username,userpass,isadmin from `dictionary_users` where username='$name' and userpass='$encyptpass'";
    $result = $con->query($sql);
    if (mysqli_num_rows($result) > 0) {
        // echo "logged in ";
        // session_unset();
        // session_destroy();
        // session_start();
        // $testname="mike";
        $_SESSION['u_name'] = $name;
        while ($row = $result->fetch_assoc()) {
            // if is admin redirect t to th admin page 
            if ($row['isadmin'] == '1') {
                header("location:./adminwordtable.php");
            } else {
                
                header("location:./userhome.php");
            }
        }
    } else {
        $errormsg .= "user not found";
    }
}
?>
<!-- main section  -->
<section>

    <div class="f-container mainbox">
        <div>
            <form  method="post" class="form cubg">
                <p style="color:#ffcb74;" class="text-center"><?php echo $errormsg; ?></p>
                <h3 class="cuscol1 fs-3 fw-bold"><span class="cuscol2">l</span>og in</h3>
                <div class="inputbox">
                    <p class="fs-4 cuscol2 mb-1"><span class="cuscol1 fw-bold span">u</span>sername</p>
                    <div class="box">
                        <div class="icon cuscol3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </div>
                        <input type="text" name="username" required>
                    </div>
                </div>
                <div class="inputbox">
                    <p class="fs-4 cuscol2 mb-1"><span class="cuscol1 fw-bold span">P</span>assword</p>
                    <div class="box">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg></div>
                        <input type="password" name="userpass">
                    </div>
                </div>

                <div class="inputbox">
                    <div class="box">
                        <input type="submit" value="Login" class="cusbg1 cuscol1 fs-5 fw-bold" name ="loginbtn">
                    </div>
                </div>
                <span class="cuscol1">dont't have account </span><a href="./register.php" class=" cuscol2 text-decoration-none">Register here</a>
            </form>
        </div>
    </div>

</section>
<?php
require_once ('./footer.php');
?>