<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $tutionId = $_SESSION['tutionId'];
    $branchId = $_POST['branchId'];
    if (empty($address) || empty($state) || empty($city) || empty($contact)) {
       header("location:./manageBranch.php");
    } else {
        $updateBranch = $conn->prepare("UPDATE tbl_branch SET address = ? ,state = ? ,city = ? ,phone = ? ,tutionId= ? WHERE branchId = ?");
        $updateBranch->execute([$address,$state,$city,$contact,$tutionId,$branchId]);
        header("location:./manageBranch.php");
    }
}

if (isset($_GET['branchId'])) {
    $branchId = $_GET['branchId'];
    $fetchBranch = $conn->query("SELECT * FROM tbl_branch WHERE branchId = $branchId")->fetchAll(PDO::FETCH_ASSOC);
} 
?>
<h2>Manage Branch</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>Address</span>
            <input type="text" name="address" value="<?php echo $fetchBranch[0]['address']; ?>" />
            <input type="hidden" name="branchId" value="<?php echo $fetchBranch[0]['branchId']; ?>" />
        </div>
        <div class="row">
            <span>State</span>
            <select name="state" id="">
                <option <?php if($fetchBranch[0]['state'] == "Gujarat") { echo "selected";} ?> value="Gujarat">Gujarat</option>
                <option <?php if($fetchBranch[0]['state'] == "Maharashtra") { echo "selected";} ?> value="Maharashtra">Maharashtra</option>
                <option <?php if($fetchBranch[0]['state'] == "West Bengal") { echo "selected";} ?>  value="West Bengal">West Bengal</option>
                <option <?php if($fetchBranch[0]['state'] == "Rajasthan") { echo "selected";} ?> value="Rajasthan">Rajasthan</option>
            </select>
        </div>
        <div class="row">
            <span>City</span>
            <input type="text" name="city" value="<?php echo $fetchBranch[0]['city']; ?>"  />
        </div>
        <div class="row">
            <span>Contact</span>
            <input type="text" name="contact" value="<?php echo $fetchBranch[0]['phone']; ?>"  />
        </div>
        <input type="submit" value="Edit Branch" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>