<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $tutionId = $_SESSION['tutionId'];
    $branchId = $_POST['branchId'];
    $studentId = $_POST['studentd'];
    if (empty($date) || empty($amount)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
       $addFees = $conn->prepare("INSERT INTO tbl_fees(amt,date,tutionId,studentId,branchId ) VALUES (?,?,?,?,?)");
       $addFees->execute([$amount,$date,$tutionId,$studentId,$branchId]);
       header("location:./fees.php");
    }
}
?>
<h2>Fees</h2>
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
            <span>Students</span>
            <select name="studentd" id="">
                <?php
                $allStudents = $conn->query("SELECT * FROM tbl_student WHERE studentActive = 1");
                while ($row = $allStudents->fetch()):
                ?>
                    <option value="<?php echo $row['studentId']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="submit" value="Save Fees" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>