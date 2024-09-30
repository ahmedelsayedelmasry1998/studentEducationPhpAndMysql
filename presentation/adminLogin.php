<?php
session_start();
include_once("../master/sections/header.php");
include_once("../master/sections/connect.php");
?>
<div class="content">
    <h2>Admin Login</h2>
    <div class="loginForm">
        <img src="../master/images/admin_avatar_png.png" alt="">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="email" name="email" placeholder="Email Address ...">
            <input type="password" name="password" placeholder="Password ...">
            <input type="submit" value="Login">
        </form>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $password = $_POST['password'];
        $email = $_POST['email'];
        if (empty($password) || empty($email)) {
            echo "<div class='error'>Please Enter All Data ...</div>";
        } else {
            $fetchAdmin = $conn->query("SELECT * FROM tbl_admin WHERE email = '$email' AND password = '$password'")->fetchAll(PDO::FETCH_ASSOC);
            if (count($fetchAdmin) > 0) {
                $_SESSION['adminId']  = $fetchAdmin[0]['adminId'];
                $_SESSION['fName']    = $fetchAdmin[0]['fName'];
                $_SESSION['lName']    = $fetchAdmin[0]['lName'];
                $_SESSION['email']    = $fetchAdmin[0]['email'];
                $_SESSION['tutionId'] = $fetchAdmin[0]['tutionId'];
                header("location:./dashboard.php");
            } else {
                echo  "<div class='error'>Email Is Not Found ...</div>";
            }
        }
    }
    ?>
</div>
<?php
include_once("../master/sections/footer.php");
include_once("../master/sections/end.php");
?>