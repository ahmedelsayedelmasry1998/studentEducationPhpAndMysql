<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
$expensesId = $_GET['expensesId'];
$deleteExpense = $conn->prepare("UPDATE tbl_expenses SET expensesActive = 0 WHERE expensesId = $expensesId");
$deleteExpense->execute();
header("location:./manageExpenses.php");
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>