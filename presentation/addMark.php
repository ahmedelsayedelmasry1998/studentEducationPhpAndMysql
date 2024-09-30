<?php
include_once("../master/sections/headerAdmin.php");
include_once("../master/sections/links.php");
include_once("../master/sections/content.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $eng = $_POST['eng'];
    $gramer = $_POST['gramer'];
    $maths = $_POST['maths'];
    $sci = $_POST['sci'];
    $ss = $_POST['ss'];
    $env = $_POST['env'];
    $gk = $_POST['gk'];
    $hindi = $_POST['hindi'];
    $computer = $_POST['computer'];
    $guj = $_POST['guj'];
    $date = date('y/m/d h-i-s a');
    $studentId = $_POST['studentId'];
    if (empty($eng) || empty($gramer) || empty($maths) || empty($computer)) {
        echo "<div class='error'>Please Enter All Data ...</div>";
    } else {
        $addMarks = $conn->prepare("INSERT INTO tbl_marks(date,eng1,gramer,maths,sci,ss,env,gk,hindi,computer,guj,studentId) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $addMarks->execute([$date, $eng, $gramer, $maths, $sci, $ss, $env, $gk, $hindi, $computer, $guj, $studentId]);
        header("location:./marks.php");
    }
}
?>
<h2>Marks</h2>
<div class="addRow">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
            <span>English</span>
            <input type="number" name="eng">
        </div>
        <div class="row">
            <span>Gramer</span>
            <input type="number" name="gramer">
        </div>
        <div class="row">
            <span>Maths</span>
            <input type="number" name="maths">
        </div>
        <div class="row">
            <span>Sci</span>
            <input type="number" name="sci">
        </div>
        <div class="row">
            <span>Ss</span>
            <input type="number" name="ss">
        </div>
        <div class="row">
            <span>Env</span>
            <input type="number" name="env">
        </div>
        <div class="row">
            <span>Gk</span>
            <input type="number" name="gk">
        </div>
        <div class="row">
            <span>Hindi</span>
            <input type="number" name="hindi">
        </div>
        <div class="row">
            <span>Computer</span>
            <input type="number" name="computer">
        </div>
        <div class="row">
            <span>Guj</span>
            <input type="number" name="guj">
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
        <input type="submit" value="Save Mark" class="">
    </form>
</div>
<?php
include_once("../master/sections/footerAdmin.php");
include_once("../master/sections/endAdmin.php");
?>