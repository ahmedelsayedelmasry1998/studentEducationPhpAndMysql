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
    $expensesId = $_POST['expensesId'];
    if (empty($expenses) || empty($amount) || empty($remark) ) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $updateExpenses = $conn->prepare("UPDATE tbl_expenses SET expenses = ? ,amt = ? ,remark = ? ,tutionId = ? ,branchId = ? WHERE expensesId = ?");
        $updateExpenses->execute([$expenses, $amount, $remark, $tutionId, $branchId,$expensesId]);
        header("location:./manageExpenses.php");
    }

}
if (isset($_GET['expensesId'])) {
    $expensesId = $_GET['expensesId'];
    $fetchExpenses = $conn->query("SELECT  tbl_expenses.branchId,tbl_expenses.expensesId,tbl_expenses.expenses,tbl_expenses.amt,tbl_expenses.remark,tbl_expenses.expensesId,tbl_branch.city,tbl_tution.tutionId FROM (( 
        tbl_expenses INNER JOIN tbl_branch USING(branchId))
        INNER JOIN tbl_tution ON tbl_expenses.tutionId = tbl_tution.tutionId )
         WHERE expensesActive = 1 AND expensesId = $expensesId")->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h2>Manage Expenses</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>Expenses</span>
            <input type="text" name="expenses" value="<?php echo $fetchExpenses[0]['expenses'] ?>" />
            <input type="hidden" name="expensesId" value="<?php echo $fetchExpenses[0]['expensesId'] ?>" />
        </div>
        <div class="row">
            <span>Amount</span>
            <input type="number" name="amount" value="<?php echo $fetchExpenses[0]['amt'] ?>" />
        </div>
        <div class="row">
            <span>Remark</span>
            <input type="text" name="remark" value="<?php echo $fetchExpenses[0]['remark'] ?>" />
        </div>
        <div class="row">
            <span>Branches</span>
            <select name="branchId" id="">
                <?php
                $allBranches = $conn->query("SELECT * FROM tbl_branch");
                while ($row = $allBranches->fetch()):
                ?>
                    <option <?php if($row['branchId'] == $fetchExpenses[0]['branchId']){ echo "selected"; } ?> value="<?php echo $row['branchId']; ?>"><?php echo $row['state']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="submit" value="Update Expenses" class="">
    </form>
</div>

<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>