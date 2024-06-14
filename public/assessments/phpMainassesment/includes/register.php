<?php 
// <!-- file add  -->
ob_start();
include ('./config.php');
require_once ('./header.php');
$errormsg = "";

$entry = $_SESSION['enteryurl'];
$reg = $_SESSION['regyurl'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // print_r($_POST);
    $name = $_POST['username'];
    $pass = $_POST['userpass'];
    // encrypt the pass bt md5 
    $encpass = md5($pass);
    if ($name == "" or $pass == "") {
        $errormsg .= "all fields must be filled";
    } elseif (strlen($name) > 10) {
        $errormsg .= "the username should be short";
    } elseif (strlen($pass) > 8) {
        $errormsg .= " enter pass less than 8 letters";
    } else {
        // seelct query to check if the user name already exists 
        $sql1 = "SELECT username from `dictionary_users` where username='$name'";
        $result1 = $con->query($sql1);
        if (mysqli_num_rows($result1) > 0) {
            $errormsg .= "name already exits";
        } else {
            // insert query to add new user 
            $sql2 = "INSERT INTO `dictionary_users` (username,userpass,entrypath,regpath,isadmin)
        VAlUES('$name','$encpass','$entry','$reg','0')";
            $result2 = $con->query($sql2);
            if ($result2) {
                header("location:./login.php");
            }
        }
    }
}
?>
<!-- main section  -->
<section>
    <div class="f-container mainbox">
        <div>
            <form action="" method="post" class="form cubg">
                <p style="color:red; text-align: center;"><?php echo $errormsg; ?></p>
                <h3 class="cuscol1 fs-3 fw-bold"><span class="cuscol2">R</span>egister</h3>
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
                        <input type="submit" value="Register" class="cusbg1 cuscol1 fs-5 fw-bold">
                    </div>
                </div>
                <SPAN class="cuscol2">Already have account </SPAN><a href="./login.php" class="forgot cuscol1 fw-bold">Login</a>
            </form>
        </div>
    </div>
</section>
<?php include ('./footer.php'); ?>