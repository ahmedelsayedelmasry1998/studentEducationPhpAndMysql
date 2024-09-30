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
    $studentId = $_POST['studentId'];
    if (empty($fatherName) || empty($motherName) || empty($sex) || empty($phone)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $addStudent = $conn->prepare("UPDATE tbl_student SET name = ? ,fatherName = ? ,matherName = ?,sex=?,phone=?,email=?,password=?,std=?,address=?,state=?,city=?,totalFees=?,paidFees=?,tutionId=?,branchId=? WHERE studentId = $studentId");
        $addStudent->execute([ $name, $fatherName, $motherName, $sex, $phone, $email, $password, $std, $address, $state, $city, $totalFees, $paidFees, $tutionId, $branchId]);
        header("location:./manageStudent.php");
    }

}

if (isset($_GET['studentId'])) {
    $studentId = $_GET['studentId'];
    $fetchStudent = $conn->query("SELECT tbl_student.studentId,tbl_student.photo,tbl_student.studentId,tbl_student.name,tbl_student.fatherName,tbl_student.matherName,tbl_student.sex,tbl_student.phone,tbl_student.email,tbl_student.password,tbl_student.std,tbl_student.address,tbl_student.state,tbl_student.city,tbl_student.totalFees,tbl_student.paidFees,tbl_branch.city,tbl_branch.branchId,tbl_tution.tutionId FROM (( 
     tbl_student INNER JOIN tbl_branch USING(branchId)) 
     INNER JOIN tbl_tution ON tbl_student.tutionId = tbl_tution.tutionId) 
       WHERE studentActive = 1 AND studentId = $studentId")->fetchAll(PDO::FETCH_ASSOC);
}
?>
<h2>Manage Student</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" name="studentId" value="<?php echo $fetchStudent[0]['studentId']; ?>">
        </div>
        <div class="row">
            <span>Name</span>
            <input type="text" name="name" value="<?php echo $fetchStudent[0]['name']; ?>" />
        </div>
        <div class="row">
            <span>Father Name</span>
            <input type="text" name="fatherName" value="<?php echo $fetchStudent[0]['fatherName']; ?>" />
        </div>
        <div class="row">
            <span>Mother Name</span>
            <input type="text" name="motherName" value="<?php echo $fetchStudent[0]['matherName']; ?>" />
        </div>
        <div class="row">
            <span>Sex</span>
            <select name="sex" id="">
                <option <?php if ($fetchStudent[0]['sex'] == 'male') {
                            echo "selected";
                        } ?> value="male">Male</option>
                <option <?php if ($fetchStudent[0]['sex'] == 'female') {
                            echo "selected";
                        } ?> value="female">Female</option>
            </select>
        </div>
        <div class="row">
            <span>Phone</span>
            <input type="text" name="phone" value="<?php echo $fetchStudent[0]['phone']; ?>" />
        </div>
        <div class="row">
            <span>Email</span>
            <input type="email" name="email" value="<?php echo $fetchStudent[0]['email']; ?>" />
        </div>
        <div class="row">
            <span>Password</span>
            <input type="password" name="password" value="<?php echo $fetchStudent[0]['password']; ?>" />
        </div>
        <div class="row">
            <span>Std</span>
            <input type="text" name="std" value="<?php echo $fetchStudent[0]['std']; ?>" />
        </div>
        <div class="row">
            <span>Address</span>
            <input type="text" name="address" value="<?php echo $fetchStudent[0]['address']; ?>" />
        </div>
        <div class="row">
            <span>State</span>
            <input type="text" name="state" value="<?php echo $fetchStudent[0]['state']; ?>" />
        </div>
        <div class="row">
            <span>City</span>
            <input type="text" name="city" value="<?php echo $fetchStudent[0]['city']; ?>" />
        </div>
        <div class="row">
            <span>Total Fee</span>
            <input type="number" name="totalFee" value="<?php echo $fetchStudent[0]['totalFees']; ?>" />
        </div>
        <div class="row">
            <span>Paid Fee</span>
            <input type="number" name="paidFee" value="<?php echo $fetchStudent[0]['paidFees']; ?>" />
        </div>
        <div class="row">
            <span>Branches</span>
            <select name="branchId" id="">
                <?php
                $allBranches = $conn->query("SELECT * FROM tbl_branch WHERE branchActive = 1");
                while ($row = $allBranches->fetch()):
                ?>
                    <option <?php if ($fetchStudent[0]['branchId'] == $row['branchId']) {
                                echo "selected";
                            } ?> value="<?php echo $row['branchId']; ?>"><?php echo $row['state']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="submit" value="Edit Student" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>