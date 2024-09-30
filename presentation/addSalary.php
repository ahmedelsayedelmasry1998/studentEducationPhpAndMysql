<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $total = $_POST['total'];
    $tutionId = $_SESSION['tutionId'];
    $branchId = $_POST['branchId'];
    $staffId = $_POST['staffId'];
    if (empty($date) || empty($amount)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
       $addSalary = $conn->prepare("INSERT INTO tbl_salary(amt,date,tutionId,staffId,branchId,total ) VALUES (?,?,?,?,?,?)");
       $addSalary->execute([$amount,$date,$tutionId,$staffId,$branchId,$total]);
       header("location:./salary.php");
    }
}
?>
<h2>Salary</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>Date</span>
            <input type="date" name="date" />
        </div>
        <div class="row">
            <span>Amount</span>
            <input type="number" name="amount" />
        </div>
        <div class="row">
            <span>Total</span>
            <input type="number" name="total" />
        </div>
        <div class="row">
            <span>Branches</span>
            <select name="branchId" id="">
                <?php
                $allBranches = $conn->query("SELECT * FROM tbl_branch WHERE branchActive = 1");
                while ($row = $allBranches->fetch()):
                ?>
                    <option value="<?php echo $row['branchId']; ?>"><?php echo $row['state']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="row">
            <span>Staffs</span>
            <select name="staffId" id="">
                <?php
                $allStaffs = $conn->query("SELECT * FROM tbl_staff WHERE staffActive = 1");
                while ($row = $allStaffs->fetch()):
                ?>
                    <option value="<?php echo $row['staffId']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="submit" value="Save Salary" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>