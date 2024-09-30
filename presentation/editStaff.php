<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $middleName = $_POST['middleName'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sex = $_POST['sex'];
    $qualifaction = $_POST['qualifaction'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $totalSalary = $_POST['totalSalary'];
    $paidSalary = $_POST['paidSalary'];
    $exp = $_POST['exp'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $type = $_POST['type'];
    $tutionId = $_SESSION['tutionId'];
    $branchId = $_POST['branchId'];
    $staffId = $_POST['staffId'];
    if (empty($name) || empty($phone) || empty($sex) || empty($password)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $updateStaff = $conn->prepare("UPDATE tbl_staff SET name = ? ,middleName = ? ,phone = ? ,sex = ? ,qualifaction = ? ,email = ? ,password = ? ,totalSalary = ? ,paidSalary = ? ,exp = ? ,address = ? ,state = ? ,city = ? ,type = ? ,tutionId = ? ,branchId = ? WHERE staffId = ?");
        $updateStaff->execute([$name, $middleName, $phone, $sex, $qualifaction, $email, $password, $totalSalary, $paidSalary, $exp, $address, $state, $city,$type, $tutionId, $branchId,$staffId]);
        header("location:./manageStaff.php");
    }

}
if (isset($_GET['staffId'])) {
    $staffId = $_GET['staffId'];
    $fetchStaff = $conn->query("SELECT tbl_staff.branchId,tbl_staff.photo,tbl_staff.name,tbl_staff.middleName,tbl_staff.staffId,tbl_staff.sex,tbl_staff.phone,tbl_staff.email,tbl_staff.password,tbl_staff.photo,tbl_staff.qualifaction,tbl_staff.totalSalary,tbl_staff.paidSalary,tbl_staff.exp,tbl_staff.address,tbl_staff.state,tbl_staff.city,tbl_staff.type,tbl_branch.city,tbl_tution.tutionId FROM ((
        tbl_staff INNER JOIN tbl_branch USING(branchId))
        INNER JOIN tbl_tution ON tbl_staff.tutionId = tbl_tution.tutionId) WHERE staffActive = 1 AND staffId = $staffId")->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h2>Manage Staff</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <span>Name</span>
            <input type="text" name="name" value="<?php echo $fetchStaff[0]['name']; ?>"/>
            <input type="hidden" name="staffId" value="<?php echo $fetchStaff[0]['staffId']; ?>"/>
        </div>
        <div class="row">
            <span>Middle Name</span>
            <input type="text" name="middleName" value="<?php echo $fetchStaff[0]['middleName']; ?>" />
        </div>
        <div class="row">
            <span>Phone</span>
            <input type="text" name="phone" value="<?php echo $fetchStaff[0]['phone']; ?>" />
        </div>
        <div class="row">
            <span>Sex</span>
            <select name="sex" id="">
                <option <?php if($fetchStaff[0]['sex'] =='male'){echo "selected"; } ?> value="male">Male</option>
                <option <?php if($fetchStaff[0]['sex'] =='female'){echo "selected"; } ?> value="female">Female</option>
            </select>
        </div>
        <div class="row">
            <span>Email</span>
            <input type="email" name="email" value="<?php echo $fetchStaff[0]['email']; ?>" />
        </div>
        <div class="row">
            <span>Password</span>
            <input type="password" name="password" value="<?php echo $fetchStaff[0]['password']; ?>" />
        </div>
        <div class="row">
            <span>Qualication</span>
            <input type="text" name="qualifaction" value="<?php echo $fetchStaff[0]['qualifaction']; ?>" />
        </div>
        <div class="row">
            <span>Total Salary</span>
            <input type="number" name="totalSalary" value="<?php echo $fetchStaff[0]['totalSalary']; ?>"/>
        </div>
        <div class="row">
            <span>Paid Salary</span>
            <input type="number" name="paidSalary" value="<?php echo $fetchStaff[0]['paidSalary']; ?>"/>
        </div>
        <div class="row">
            <span>Exp</span>
            <input type="text" name="exp" value="<?php echo $fetchStaff[0]['exp']; ?>"/>
        </div>
        <div class="row">
            <span>Address</span>
            <input type="text" name="address" value="<?php echo $fetchStaff[0]['address']; ?>"/>
        </div>
        <div class="row">
            <span>State</span>
            <input type="text" name="state" value="<?php echo $fetchStaff[0]['state']; ?>"/>
        </div>
        <div class="row">
            <span>City</span>
            <input type="text" name="city" value="<?php echo $fetchStaff[0]['city']; ?>"/>
        </div>
        <div class="row">
            <span>Type</span>
            <input type="text" name="type" value="<?php echo $fetchStaff[0]['type']; ?>"/>
        </div>
        <div class="row">
            <span>Branches</span>
            <select name="branchId" id="">
                <?php
                $allBranches = $conn->query("SELECT * FROM tbl_branch");
                while ($row = $allBranches->fetch()):
                ?>
                    <option <?php if($row['branchId'] ==  $fetchStaff[0]['branchId']){ echo "selected";} ?> value="<?php echo $row['branchId']; ?>"><?php echo $row['state']; ?></option>
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