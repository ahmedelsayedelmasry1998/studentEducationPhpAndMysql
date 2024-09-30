<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
$staffId = $_GET['staffId'];
$deleteStaff = $conn->prepare("UPDATE tbl_staff SET staffActive = 0 WHERE staffId = $staffId");
$deleteStaff->execute();
header("location:./manageStaff.php");
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>