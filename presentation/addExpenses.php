<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $expenses = $_POST['expenses'];
    $amount = $_POST['amount'];
    $remark = $_POST['remark'];
    $tutionId = $_SESSION['tutionId'];
    $branchId = $_POST['branchId'];
    if (empty($expenses) || empty($amount) || empty($remark)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
       $addExpense = $conn->prepare("INSERT INTO tbl_expenses(expenses,amt,remark,branchId,tutionId ) VALUES (?,?,?,?,?)");
       $addExpense->execute([$expenses,$amount,$remark,$branchId,$tutionId]);
       header("location:./manageExpenses.php");
    }
}
?>
<h2>Manage Expenses</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>Expenses</span>
            <input type="text" name="expenses" />
        </div>
        <div class="row">
            <span>Amount</span>
            <input type="number" name="amount" />
        </div>
        <div class="row">
            <span>Remark</span>
            <input type="text" name="remark" />
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
        <input type="submit" value="Save Expenses" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>