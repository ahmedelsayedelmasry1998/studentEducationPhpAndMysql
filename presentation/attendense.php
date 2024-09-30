<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Attendense</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Present</th>
        </tr>
        <?php 
        $fetchExpenses = $conn->query("SELECT tbl_attendence.attendenceId ,tbl_attendence.attendence,tbl_student.name FROM ((
        tbl_attendence INNER JOIN tbl_student USING(studentId))
        INNER JOIN tbl_tution ON tbl_attendence.tutionId = tbl_tution.tutionId) WHERE attendenceActive = 1
        ");
        while($row = $fetchExpenses->fetch()):
        ?>
        <tr>
            <td><?php echo $row['attendenceId']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php  if($row['attendence']  == 0) : ?>
            <input type="checkbox" checked>
            <?php else : ?>
                <input type="checkbox" >
                <?php endif; ?>
             </td>
        </tr> 
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addAttendense.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Attendense</a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>