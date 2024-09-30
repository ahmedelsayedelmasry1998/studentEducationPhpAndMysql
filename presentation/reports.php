<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
?>
<h2>Reports</h2>
<div class="reports">
    <div class="salary">
        <i class="handel-icon fa-solid fa-sack-dollar"></i>
        <h4>Salary</h4>
        <a href="./salary.php">View Salary</a>
    </div>
    <div class="fees">
        <i class="handel-icon fa-solid fa-rss"></i>
        <h4>Fees</h4>
        <a href="./fees.php">View Fees</a>
    </div>
    <div class="marks">
        <i class="handel-icon fa-solid fa-marker"></i>
        <h4>Marks</h4>
        <a href="./marks.php">View Marks</a>
    </div>
    <div class="searchSalary">
        <i class="handel-icon fa-solid fa-magnifying-glass"></i>
        <h4>Search Salary By Date</h4>
        <a href="./searchSalary.php">Search Salary</a>
    </div>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>