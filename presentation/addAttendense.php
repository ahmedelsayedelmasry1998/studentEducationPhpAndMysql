<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = $_POST['customDate'];
    $attendense = $_POST['attendense'];
    $type = $_POST['type'];
    $studentId = $_POST['studentId'];
    $tutionId = $_SESSION['tutionId'];
    if ( empty($date)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $addAttendense = $conn->prepare("INSERT INTO tbl_attendence(date,attendence,type,tutionId,studentId) VALUES (?,?,?,?,?)");
        $addAttendense->execute([$date, $attendense, $type,$tutionId, $studentId]);
        header("location:./attendense.php");
    }
}
?>
<h2>Attendense</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>Date</span>
            <input type="date" name="customDate">
        </div>
        <div class="row">
            <span>Attendense</span>
            <select name="attendense" id="">
                <option value="0">Pass</option>
                <option value="1">Fail</option>
            </select>
        </div>
        <div class="row">
            <span>Type</span>
            <select name="type" id="">
                <option value="student">Student</option>
                <option value="staff">Staff</option>
            </select>
        </div>
        <div class="row">
            <span>Students</span>
            <select name="studentId" id="">
                <?php
                $allStudents = $conn->query("SELECT * FROM tbl_student WHERE studentActive = 1");
                while ($row = $allStudents->fetch()):
                ?>
                    <option value="<?php echo $row['studentId']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <input type="submit" value="Save Attendense" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>