<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
?>
<h2>Manage Branch</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>Address</span>
            <input type="text" name="address" />
        </div>
        <div class="row">
            <span>State</span>
            <select name="state" id="">
                <option value="Gujarat">Gujarat</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Rajasthan">Rajasthan</option>
            </select>
        </div>
        <div class="row">
            <span>City</span>
            <input type="text" name="city" />
        </div>
        <div class="row">
            <span>Contact</span>
            <input type="text" name="contact" />
        </div>
        <input type="submit" value="Save Branch" class="">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $address = $_POST['address'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $tutionId = $_SESSION['tutionId'];
        if (empty($address) || empty($state) || empty($city) || empty($contact)) {
            echo "<div class='error'>Please Enter All Data ...</div>";
        } else {
            $addBranch = $conn->prepare("INSERT INTO tbl_branch(address,state,city,phone,tutionId) VALUES (?,?,?,?,?)");
            $addBranch->execute([$address,$state,$city,$contact,$tutionId]);
            header("location:./manageBranch.php");
        }
    }
    ?>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>