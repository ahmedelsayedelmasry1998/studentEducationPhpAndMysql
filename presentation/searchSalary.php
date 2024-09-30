<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");

?>
<h2>Search Salary</h2>
<div class="searchSalary">
    <div class="customSearch">
        <span>From : </span> <input type="date" name="" id="date1">
        <span>To : </span> <input type="date" name="" id="date2">
    </div>
    <div id="table">
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
       $sumSalary = $conn->query("SELECT SUM(total) FROM (((
        tbl_salary INNER JOIN tbl_branch USING(branchId))
        INNER JOIN tbl_staff USING(staffId))
        INNER JOIN tbl_tution ON tbl_salary.tutionId = tbl_tution.tutionId)
         ")->fetchAll(PDO::FETCH_COLUMN);
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
        <tr>
            <td style="font-size: 40px;" colspan="5">Total : </td>
            <td style="font-size: 45px;"><?php echo $sumSalary[0]; ?></td>
        </tr>
    </table>
    </div>

</div>
<?php
include_once("../master/sections/footerAdmin.php");?>
<script src="../master/js/search_salary.js"></script>
<?php include_once("../master/sections/endAdmin.php");
?>