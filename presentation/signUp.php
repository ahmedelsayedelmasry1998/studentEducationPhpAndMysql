<?php
session_start();
include_once("../master/sections/header.php");
include_once("../master/sections/connect.php");
?>
<div class="content">
    <h2>Sign Up</h2>
    <div class="rigaster">
        <div class="loginDiv">
            <h3>Welcome</h3>
            <p>Manage your tuition details with us and save your precious time.</p>
            <a href="./adminLogin.php" class="btnLogin">Login</a>
        </div>
        <div class="registarDiv">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" placeholder="First Name ...." name="fName">
                <input type="text" placeholder="Last Name ...." name="lName">
                <input type="email" placeholder="Email Id ...." name="emailId">
                <input type="text" placeholder="Mobile No (With Currently Code) ...." name="mobileNumber">
                <input type="password" placeholder="Password ...." name="password">
                <input type="password" placeholder="Re Enter Password ...." name="rPassword">
                <input type="text" placeholder="Classes Name ...." name="classesName">
                <input type="text" placeholder="Tageline ...." name="tageline">
                <select name="selectCourse" id="">
                    <option value="">-- Select Course --</option>
                    <?php
                    $getAllCourses = $conn->query("SELECT shortName,name FROM tbl_course")->fetchAll(PDO::FETCH_KEY_PAIR);
                    foreach($getAllCourses as $key => $value):
                    ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="text" placeholder="Address ...." name="address">
                <input type="text" placeholder="State ...." name="state">
                <input type="text" placeholder="Pnone Nu. " name="phoneNumber">
                <input type="url" placeholder="Url Of Your Website .... " name="url">
                <input type="submit" value="Registar Admin" class="btnLogin">
            </form>
        </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $emailId = $_POST['emailId'];
        $mobileNumber = $_POST['mobileNumber'];
        $password = $_POST['password'];
        $rPassword = $_POST['rPassword'];
        $classesName = $_POST['classesName'];
        $tageline = $_POST['tageline'];
        $selectCourse = $_POST['selectCourse'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $phoneNumber = $_POST['phoneNumber'];
        $url = $_POST['url'];
        if ($password == $rPassword) {
            $addTution = $conn->prepare("INSERT INTO tbl_tution(tageLine,name,courses,address,state,phone,url) VALUES (?,?,?,?,?,?,?)");
            $addTution->execute([$tageline, $classesName, $selectCourse, $address, $state, $phoneNumber, $url]);
            $fetchTutionId = $conn->query("SELECT tutionId FROM tbl_tution ORDER BY tutionId DESC limit 1")->fetchAll(PDO::FETCH_COLUMN);
            $addAdmin = $conn->prepare("INSERT INTO tbl_admin(fName,lName,address,email,phone,password,tutionId) VALUES (?,?,?,?,?,?,?)");
            $addAdmin->execute([$fName, $lName, $address, $emailId, $mobileNumber, $password, $fetchTutionId[0]]);
           echo "<script>window.location.href='../index.php';</script>";
        } else {
            echo "<div class='error'>Password And Re Password Is Not Matched ...</div>";
        }
    }
    ?>
</div>
<?php
include_once("../master/sections/footer.php");
include_once("../master/sections/end.php");
?>