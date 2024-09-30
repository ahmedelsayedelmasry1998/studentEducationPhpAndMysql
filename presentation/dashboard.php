 <?php
    include_once("../master/sections/headerAdmin.php");
    include_once("../master/sections/links.php");
    include_once("../master/sections/content.php");
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $noticeTitle = $_POST['noticeTitle'];
        $noticeBody = $_POST['noticeBody'];
        $recipient = $_POST['recipient'];
        $tutionId = $_SESSION['tutionId'];
        $date =date("Y/m/d");
        $time =date("h:i:sa");
        $addNotice = $conn->prepare("INSERT INTO tbl_notice(noticeHead,noticeBody,recipient,date,time,tutionId) values (?,?,?,?,?,?)"); 
        $addNotice->execute([$noticeTitle,$noticeBody,$recipient,$date,$time,$tutionId]);
        header("location:./dashboard.php");
    }
    ?>
 <h2>Dashboard</h2>
 <div class="chart">
     <div>
         <canvas id="myChart"></canvas>
     </div>
 </div>
 <div style="display: none;" class="contentChart">
     <div id="w1" style="visibility: hidden;">
         <?php
            $allBranches = $conn->query("SELECT COUNT(branchId) FROM tbl_branch WHERE branchActive = 1")->fetchAll(PDO::FETCH_COLUMN);
            echo $allBranches[0];
            ?>
     </div>
     <div id="w2" style="visibility: hidden;">
         <?php
            $allStudents = $conn->query("SELECT COUNT(studentId) FROM tbl_student WHERE studentActive = 1")->fetchAll(PDO::FETCH_COLUMN);
            echo $allStudents[0];
            ?>
     </div>
     <div id="w3" style="visibility: hidden;">
         <?php
            $allStaffes = $conn->query("SELECT COUNT(staffId) FROM tbl_staff WHERE staffActive = 1")->fetchAll(PDO::FETCH_COLUMN);
            echo $allStaffes[0];
            ?>
     </div>
     <div id="w4" style="visibility: hidden;">
         <?php
            $allExpenses = $conn->query("SELECT COUNT(expensesId) FROM tbl_expenses WHERE expensesActive = 1")->fetchAll(PDO::FETCH_COLUMN);
            echo $allExpenses[0];
            ?>
     </div>
     <div id="w5" style="visibility: hidden;">
         <?php
            $allPasses = $conn->query("SELECT COUNT(attendenceId) FROM tbl_attendence WHERE attendenceActive = 1 AND attendence=1")->fetchAll(PDO::FETCH_COLUMN);
            echo $allPasses[0];
            ?>
     </div>
     <div id="w6" style="visibility: hidden;">
         <?php
            $allFails = $conn->query("SELECT COUNT(attendenceId) FROM tbl_attendence WHERE attendenceActive = 1 AND attendence=0")->fetchAll(PDO::FETCH_COLUMN);
            echo $allFails[0];
            ?>
     </div>
     <div id="w7" style="visibility: hidden;">
         <?php
            $allFeess = $conn->query("SELECT COUNT(feesId) FROM tbl_fees")->fetchAll(PDO::FETCH_COLUMN);
            echo $allFeess[0];
            ?>
     </div>
     <div id="w8" style="visibility: hidden;">
         <?php
            $allSalary = $conn->query("SELECT COUNT(salaryId) FROM tbl_salary")->fetchAll(PDO::FETCH_COLUMN);
            echo $allSalary[0];
            ?>
     </div>
     <div id="w9" style="visibility: hidden;">
         <?php
            $allTutions = $conn->query("SELECT COUNT(tutionId) FROM tbl_tution")->fetchAll(PDO::FETCH_COLUMN);
            echo $allTutions[0];
            ?>
     </div>
 </div>
 <div class="notice">
     <h3>Notice Board</h3>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <input name="noticeTitle" type="text" placeholder="Please Enter Notice Title ...">
         <textarea rows="8" name="noticeBody" id="" placeholder="Please Enter Notice Body ..."></textarea>
         <input value="staff" type="radio" name="recipient" id="staff"><label for="staff"> &nbsp; To Staff</label>
         <input value="studient" type="radio" name="recipient" id="studient"><label for="studient"> &nbsp; To Studient</label>
         <input value="all" checked type="radio" name="recipient" id="all"><label for="all"> &nbsp; To All</label>
         <input type="reset" class="btnClear" value="Clear">
         <input type="submit" class="btnSend" value="Send">
     </form>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
     const ctx = document.getElementById('myChart');

     new Chart(ctx, {
         type: 'doughnut', //doughnut,pie
         data: {
             labels: ['Total Branches', 'Total Students', 'Total Staffs', 'Total Expenses', 'Total Pass', 'Total Fail', 'Total Fees', 'Total Salary', 'Total Tutions'],
             datasets: [{
                 label: 'E Commerce Shop',
                 data: [document.getElementById("w1").innerHTML, document.getElementById("w2").innerHTML, document.getElementById("w3").innerHTML, document.getElementById("w4").innerHTML, document.getElementById("w5").innerHTML, document.getElementById("w6").innerHTML, document.getElementById("w7").innerHTML, document.getElementById("w8").innerHTML, document.getElementById("w9").innerHTML],
                 borderWidth: 3
             }]
         },
         options: {
             scales: {
                 y: {
                     beginAtZero: false
                 }
             }
         }
     });
 </script>
 <?php
    include_once("../master/sections/footerAdmin.php");
    include_once("../master/sections/endAdmin.php");
    ?>