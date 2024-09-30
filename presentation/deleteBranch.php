<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
$branchId = $_GET['branchId'];
$deleteBranch = $conn->prepare("UPDATE tbl_branch SET branchActive = 0 WHERE branchId = $branchId");
$deleteBranch->execute();
header("location:./manageBranch.php");
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>