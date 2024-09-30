<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Manage Staff</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Middle Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone No.</th>
            <th>Qualifaction</th>
            <th>Date Of Joining</th>
            <th>Total Salary</th>
            <th>Paid Salary</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        $fetchStaff = $conn->query("SELECT tbl_staff.photo,tbl_staff.name,tbl_staff.middleName,tbl_staff.staffId,tbl_staff.sex,tbl_staff.phone,tbl_staff.email,tbl_staff.password,tbl_staff.photo,tbl_staff.qualifaction,tbl_staff.totalSalary,tbl_staff.paidSalary,tbl_staff.exp,tbl_staff.address,tbl_staff.state,tbl_staff.city,tbl_staff.type,tbl_branch.city,tbl_tution.tutionId FROM ((
        tbl_staff INNER JOIN tbl_branch USING(branchId))
        INNER JOIN tbl_tution ON tbl_staff.tutionId = tbl_tution.tutionId) WHERE staffActive = 1
        ");
        while($row = $fetchStaff->fetch()):
        ?>
        <tr>
            <td><?php echo $row['staffId']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['middleName']; ?></td>
            <td><?php echo $row['sex']; ?></td>
            <td style="font-size: 7px;"><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['qualifaction']; ?></td>
            <td><?php echo $row['exp']; ?></td>
            <td><?php echo $row['totalSalary']; ?></td>
            <td><?php echo $row['paidSalary']; ?></td>
            <td><img src="<?php echo $row['photo']; ?>" alt=""></td>
            <td>
                <form method="GET" action="./editStaff.php" >
                    <input type="hidden" name="staffId" value="<?php echo $row['staffId']; ?>">
                    <input type="submit" value="Edit" class="editButton">
                </form>
            </td>
            <td>
            <form method="GET" action="./deleteStaff.php">
                    <input type="hidden" name="staffId" value="<?php echo $row['staffId']; ?>">
                    <input type="submit" value="Delete" class="deleteButton">
                </form>
            </td>
        </tr> 
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addStaff.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Staff</a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>