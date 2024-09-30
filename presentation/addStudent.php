<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fatherName = $_POST['fatherName'];
    $name = $_POST['name'];
    $motherName = $_POST['motherName'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $std = $_POST['std'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $totalFees = $_POST['totalFee'];
    $paidFees = $_POST['paidFee'];
    $tutionId = $_SESSION['tutionId'];
    $branchId = $_POST['branchId'];
    if (empty($fatherName) || empty($motherName) || empty($sex) || empty($phone)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $photo = $_FILES['photo'];
        $dis = dirname(__FILE__, 2) . "/upload_files/" . $photo['name'];
        $imgPath = "../upload_files/" . $photo['name'];
        move_uploaded_file($photo['tmp_name'], $dis);
        $addStudent = $conn->prepare("INSERT INTO tbl_student(photo,name,fatherName,matherName,sex,phone,email,password,std,address,state,city,totalFees,paidFees,tutionId,branchId) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $addStudent->execute([$imgPath, $name, $fatherName, $motherName, $sex, $phone, $email, $password, $std, $address, $state, $city, $totalFees, $paidFees, $tutionId, $branchId]);
        header("location:./manageStudent.php");
    }
}
?>
<h2>Manage Student</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <span>Photo</span>
            <input type="file" name="photo">
        </div>
        <div class="row">
            <span>Name</span>
            <input type="text" name="name" />
        </div>
        <div class="row">
            <span>Father Name</span>
            <input type="text" name="fatherName" />
        </div>
        <div class="row">
            <span>Mother Name</span>
            <input type="text" name="motherName" />
        </div>
        <div class="row">
            <span>Sex</span>
            <select name="sex" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="row">
            <span>Phone</span>
            <input type="text" name="phone" />
        </div>
        <div class="row">
            <span>Email</span>
            <input type="email" name="email" />
        </div>
        <div class="row">
            <span>Password</span>
            <input type="password" name="password" />
        </div>
        <div class="row">
            <span>Std</span>
            <input type="text" name="std" />
        </div>
        <div class="row">
            <span>Address</span>
            <input type="text" name="address" />
        </div>
        <div class="row">
            <span>State</span>
            <input type="text" name="state" />
        </div>
        <div class="row">
            <span>City</span>
            <input type="text" name="city" />
        </div>
        <div class="row">
            <span>Total Fee</span>
            <input type="number" name="totalFee" />
        </div>
        <div class="row">
            <span>Paid Fee</span>
            <input type="number" name="paidFee" />
        </div>
        <div class="row">
            <span>Branches</span>
            <select name="branchId" id="">
                <?php
                $allBranches = $conn->query("SELECT * FROM tbl_branch");
                while ($row = $allBranches->fetch()):
                ?>
                    <option value="<?php echo $row['branchId']; ?>"><?php echo $row['state']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="submit" value="Save Student" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>