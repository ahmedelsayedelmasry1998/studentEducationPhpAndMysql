<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
$studentId = $_GET['studentId'];
$fetchStudent = $conn -> query("SELECT * FROM tbl_student WHERE studentId = $studentId")->fetchAll(PDO::FETCH_ASSOC);
unlink($fetchStudent[0]['photo']);
$deleteStudent = $conn->prepare("UPDATE tbl_student SET studentActive = 0 WHERE studentId = $studentId");
$deleteStudent->execute();
header("location:./manageStudent.php");
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>