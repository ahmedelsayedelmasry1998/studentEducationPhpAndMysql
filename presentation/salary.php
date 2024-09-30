<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Salary</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Amount</th>
            <th>Total</th>
        </tr>
        <?php 
     $fetchSalary = $conn->query("SELECT tbl_salary.salaryId,tbl_salary.date,tbl_salary.amt,tbl_salary.total,tbl_staff.name,tbl_branch.state,tbl_tution.email FROM (((
     tbl_salary INNER JOIN tbl_branch USING(branchId))
     INNER JOIN tbl_staff USING(staffId))
     INNER JOIN tbl_tution ON tbl_salary.tutionId = tbl_tution.tutionId)
     ");
    while($row = $fetchSalary->fetch()):
        ?>
        <tr>
            <td><?php echo $row['salaryId']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['amt']; ?></td>
            <td><?php echo $row['total']; ?></td>
        </tr> 
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addSalary.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Salary</a>
<a href="" onclick="window.print()" class="print">View Report <i class="fa-solid fa-arrow-right"></i></a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>