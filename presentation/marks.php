<?php
 include_once("../master/sections/headerAdmin.php");
 include_once("../master/sections/links.php");
 include_once("../master/sections/content.php");
 ?>
 <h2>Marks</h2>
 <div class="manage">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>ENG</th>
            <th>GRAMER</th>
            <th>MATHS</th>
            <th>SCI</th>
            <th>SS</th>
            <th>ENV</th>
            <th>G.K</th>
            <th>HINDI</th>
            <th>COMPUTER</th>
            <th>GUJ</th>
        </tr>
        <?php 
     $fetchMarks = $conn->query("SELECT tbl_marks.marksId,tbl_marks.eng1,tbl_marks.gramer,tbl_marks.maths,tbl_marks.sci,tbl_marks.ss,tbl_marks.env,tbl_marks.gk,tbl_marks.hindi,tbl_marks.computer,tbl_marks.guj,tbl_student.name FROM (
     tbl_marks INNER JOIN tbl_student USING(studentId))  WHERE studentActive = 1");
    while($row = $fetchMarks->fetch()):
        ?>
        <tr>
            <td><?php echo $row['marksId']; ?></td>
            <td style="font-size: 15px;"><?php echo $row['name']; ?></td>
            <td><?php echo $row['eng1']; ?></td>
            <td><?php echo $row['gramer']; ?></td>
            <td><?php echo $row['maths']; ?></td>
            <td><?php echo $row['sci']; ?></td>
            <td><?php echo $row['ss']; ?></td>
            <td><?php echo $row['env']; ?></td>
            <td><?php echo $row['gk']; ?></td>
            <td><?php echo $row['hindi']; ?></td>
            <td><?php echo $row['computer']; ?></td>
            <td><?php echo $row['guj']; ?></td>
        </tr> 
        <?php endwhile; ?>
    </table>
 </div>
<div class="add">
<a href="./addMark.php" class="addButton"><i class="fa-solid fa-plus"></i> Add New Mark</a>
<a href="#"  onclick="window.print();"  class="print"><i class="fa-solid fa-print"></i> Print Marks</a>
</div>
 <?php
 include_once("../master/sections/footerAdmin.php");
 include_once("../master/sections/endAdmin.php");
 ?>