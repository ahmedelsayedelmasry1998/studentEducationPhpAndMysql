<?php
include_once("../master/sections/header.php");
?>
<div class="content">
    <h2>Studient Login</h2>
    <div class="loginForm">
        <img src="../master/images/stud.png" alt="">
        <form action="">
            <input type="number" name="studientId" placeholder="Studient Id ...">
            <input type="password" name="password" placeholder="Password ...">
            <input type="submit" value="Login">
        </form>
    </div>
</div>
<?php
include_once("../master/sections/footer.php");
include_once("../master/sections/end.php");
?>