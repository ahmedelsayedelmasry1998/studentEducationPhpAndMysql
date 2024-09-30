<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if($_SERVER['REQUEST_METHOD'] =="POST")
{
    $tutionId= $_POST['tutionId'];
    $name= $_POST['name'];
    $tageLine= $_POST['tageLine'];
    $email= $_POST['emailTution'];
    $address= $_POST['addressTution'];
    $phone= $_POST['mobileTution'];
    $editTution = $conn->prepare("UPDATE tbl_tution SET name = ?,tageLine = ? ,email = ? ,address = ?,phone = ? WHERE tutionId = ?");
    $editTution->execute([$name,$tageLine,$email,$address,$phone,$tutionId]);
    $adminId= $_POST['adminId'];
    $fName= $_POST['fName'];
    $lName= $_POST['lName'];
    $phoneAdmin= $_POST['mobile'];
    $emailAdmin= $_POST['email'];
    $addressAdmin= $_POST['address'];
    $editAdmin = $conn->prepare("UPDATE tbl_admin SET fName = ?,lName = ? ,email = ? ,address = ?,phone = ? WHERE adminId = ?");
    $editAdmin->execute([$fName,$lName,$emailAdmin,$addressAdmin,$phoneAdmin,$adminId]);
    header("location:./profile.php");
}
$tutionId = $_SESSION['tutionId'];
$studentCount = $conn->query("SELECT COUNT(studentId) FROM tbl_student WHERE studentActive=1")->fetchAll(PDO::FETCH_COLUMN);
$staffCount = $conn->query("SELECT COUNT(staffId) FROM tbl_staff WHERE staffActive=1")->fetchAll(PDO::FETCH_COLUMN);
$branchCount = $conn->query("SELECT COUNT(branchId) FROM tbl_branch WHERE branchActive=1")->fetchAll(PDO::FETCH_COLUMN);
$selectTutionAdmin = $conn->query("SELECT tbl_admin.adminId,
tbl_admin.fName,tbl_admin.lName,tbl_admin.phone,tbl_admin.email,tbl_admin.address as ad,tbl_tution.tutionId,tbl_tution.name,tbl_tution.tageLine,tbl_tution.address,tbl_tution.phone as ph FROM (tbl_admin INNER JOIN tbl_tution USING(tutionId)) WHERE tbl_admin.tutionId=$tutionId ")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Profile</h2>
<div class="profile">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="tution">
        <div class="logo">
            <img height="250px;width:100%" src="../master/images/admin_avatar_png.png" alt="">
        </div>
        <div class="info">
            <h3>Tution Info</h3>
            <div class="row">
                <span>Tution Name</span>
                <input type="text" name="name" value="<?php echo $selectTutionAdmin[0]['name']; ?>">
                <input type="hidden" name="tutionId" value="<?php echo $selectTutionAdmin[0]['tutionId']; ?>">
            </div>
            <div class="row">
                <span>Tage Line</span>
                <input type="text" name="tageLine" value="<?php echo $selectTutionAdmin[0]['tageLine']; ?>">
            </div>
            <div class="row">
                <span>Email</span>
                <input type="email" name="emailTution" value="<?php echo $selectTutionAdmin[0]['email']; ?>">
            </div>
            <div class="row">
                <span>Address</span>
                <input type="text" name="addressTution" value="<?php echo $selectTutionAdmin[0]['address']; ?>">
            </div>
            <div class="row">
                <span>Mobile</span>
                <input type="text" name="mobileTution" value="<?php echo $selectTutionAdmin[0]['phone']; ?>">
            </div>
        </div>
    </div>
    <div class="profileAction">
        <div class="actions">
        <h3>Activity</h3>
            <table>
                <tr>
                    <td>Students</td>
                    <td><?php echo $studentCount[0]; ?></td>
                </tr>
                <tr>
                    <td>Staffs</td>
                    <td><?php echo $staffCount[0]; ?></td>
                </tr>
                <tr>
                    <td>Branches</td>
                    <td><?php echo $branchCount[0]; ?></td>
                </tr>
            </table>
        </div>
        <div class="info">
            <h3>Admin Info</h3>
        <div class="row">
                <span>First Name</span>
                <input type="text" name="fName" value="<?php echo $selectTutionAdmin[0]['fName']; ?>">
                <input type="hidden" name="adminId" value="<?php echo $selectTutionAdmin[0]['adminId']; ?>">
            </div>
            <div class="row">
                <span>Last Name</span>
                <input type="text" name="lName" value="<?php echo $selectTutionAdmin[0]['lName']; ?>">
            </div>
            <div class="row">
                <span>Mobile</span>
                <input type="number" name="mobile" value="<?php echo $selectTutionAdmin[0]['ph']; ?>">
            </div>
            <div class="row">
                <span>Email</span>
                <input type="email" name="email" value="<?php echo $selectTutionAdmin[0]['email']; ?>">
            </div>
            <div class="row">
                <span>Address</span>
                <input type="text" name="address" value="<?php echo $selectTutionAdmin[0]['ad']; ?>">
            </div>
            <input class="" type="submit" value="Save">
        </div>
    </div>
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>