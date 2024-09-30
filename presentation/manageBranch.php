<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Manage Branch</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Address</th>
            <th>State</th>
            <th>City</th>
            <th>Contact</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
        $fetchBranches = $conn->query("SELECT * FROM tbl_branch WHERE branchActive = 1");
        while($row = $fetchBranches->fetch()):
        ?>
        <tr>
            <td><?php echo $row['branchId']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['state']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td>
                <form method="GET" action="./editBranch.php" >
                    <input type="hidden" name="branchId" value="<?php echo $row['branchId']; ?>">
                    <input type="submit" value="Edit" class="editButton">
                </form>
            </td>
            <td>
            <form method="GET" action="./deleteBranch.php">
                    <input type="hidden" name="branchId" value="<?php echo $row['branchId']; ?>">
                    <input type="submit" value="Delete" class="deleteButton">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addBranch.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Branch</a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>