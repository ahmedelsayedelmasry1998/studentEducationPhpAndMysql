<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Manage Student</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Std</th>
            <th>Branch</th>
            <th>Phone No.</th>
            <th>Total Fee</th>
            <th>Paid Fee</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
     $fetchStudent = $conn->query("SELECT tbl_student.photo,tbl_student.studentId,tbl_student.name,tbl_student.std,tbl_student.phone,tbl_student.totalFees,tbl_student.paidFees,tbl_branch.city,tbl_tution.tutionId FROM (( 
     tbl_student INNER JOIN tbl_branch USING(branchId)) 
     INNER JOIN tbl_tution ON tbl_student.tutionId = tbl_tution.tutionId) 
       WHERE studentActive = 1");
    while($row = $fetchStudent->fetch()):
        ?>
        <tr>
            <td><?php echo $row['studentId']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><img src="<?php echo $row['photo']; ?>" alt=""></td>
            <td><?php echo $row['std']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['totalFees']; ?></td>
            <td><?php echo $row['paidFees']; ?></td>
            <td>
                <form method="GET" action="./editStudent.php" >
                    <input type="hidden" name="studentId" value="<?php echo $row['studentId'];  ?>">
                    <input type="submit" value="Edit" class="editButton">
                </form>
            </td>
            <td>
            <form method="GET" action="./deleteStudent.php">
                    <input type="hidden" name="studentId" value="<?php echo $row['studentId']; ?>">
                    <input type="submit" value="Delete" class="deleteButton">
                </form>
            </td>
        </tr> 
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addStudent.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Student</a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>