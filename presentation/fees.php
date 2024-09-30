<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Latest 5 Fees</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Branch Name</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Total Fees</th>
        </tr>
        <?php 
     $fetchFees = $conn->query("SELECT tbl_fees.feesId,tbl_fees.date,tbl_fees.amt,tbl_branch.state,tbl_student.name,tbl_student.totalFees FROM ((
     tbl_fees INNER JOIN tbl_branch USING(branchId))
     INNER JOIN tbl_student USING(studentId)) ORDER BY feesId DESC LIMIT 5");
    while($row = $fetchFees->fetch()):
        ?>
        <tr>
            <td><?php echo $row['feesId']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['amt']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['totalFees']; ?></td>
        </tr> 
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addFees.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Fees</a>
<a href="" onclick="window.print()" class="print">View Report <i class="fa-solid fa-arrow-right"></i></a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>