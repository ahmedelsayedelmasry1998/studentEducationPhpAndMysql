<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Manage Expensies</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Branch</th>
            <th>Expenses</th>
            <th>Amount</th>
            <th>Remark</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        $fetchExpenses = $conn->query("SELECT tbl_expenses.expensesId,tbl_expenses.expenses,tbl_expenses.amt,tbl_expenses.remark,tbl_expenses.expensesId,tbl_branch.city,tbl_tution.tutionId FROM (( 
        tbl_expenses INNER JOIN tbl_branch USING(branchId))
        INNER JOIN tbl_tution ON tbl_expenses.tutionId = tbl_tution.tutionId )
         WHERE expensesActive = 1");
        while($row = $fetchExpenses->fetch()):
        ?>
        <tr>
            <td><?php echo $row['expensesId']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['expenses']; ?></td>
            <td><?php echo $row['amt']; ?></td>
            <td><?php echo $row['remark']; ?></td>
            <td>
                <form method="GET" action="./editExpenses.php" >
                    <input type="hidden" name="expensesId" value="<?php echo $row['expensesId']; ?>">
                    <input type="submit" value="Edit" class="editButton">
                </form>
            </td>
            <td>
            <form method="GET" action="./deleteExpenses.php">
                    <input type="hidden" name="expensesId" value="<?php echo $row['expensesId']; ?>">
                    <input type="submit" value="Delete" class="deleteButton">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addExpenses.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Expenses</a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>