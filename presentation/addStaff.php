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
    if (empty($name) || empty($phone) || empty($sex) || empty($password)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $photo = $_FILES['photo'];
        $dis = dirname(__FILE__, 2) . "/upload_files/" . $photo['name'];
        $imgPath = "../upload_files/" . $photo['name'];
        move_uploaded_file($photo['tmp_name'], $dis);
        $addStaff = $conn->prepare("INSERT INTO tbl_staff(photo,name,middleName,phone,sex,qualifaction,email,password,totalSalary,paidSalary,exp,address,state,city,type,tutionId,branchId) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $addStaff->execute([$imgPath, $name, $middleName, $phone, $sex, $qualifaction, $email, $password, $totalSalary, $paidSalary, $exp, $address, $state, $city,$type, $tutionId, $branchId]);
        header("location:./manageStaff.php");
    }
}
?>
<h2>Manage Staff</h2>
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
            <span>Middle Name</span>
            <input type="text" name="middleName" />
        </div>
        <div class="row">
            <span>Phone</span>
            <input type="text" name="phone" />
        </div>
        <div class="row">
            <span>Sex</span>
            <select name="sex" id="">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
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
            <span>Qualication</span>
            <input type="text" name="qualifaction" />
        </div>
        <div class="row">
            <span>Total Salary</span>
            <input type="number" name="totalSalary" />
        </div>
        <div class="row">
            <span>Paid Salary</span>
            <input type="number" name="paidSalary" />
        </div>
        <div class="row">
            <span>Exp</span>
            <input type="text" name="exp" />
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
            <span>Type</span>
            <input type="text" name="type" />
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