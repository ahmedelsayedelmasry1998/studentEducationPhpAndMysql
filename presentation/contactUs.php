<?php
include_once("../master/sections/header.php");
?>
<div class="content">
    <h2>Contact Us</h2>
    <div class="contacts">
        <div class="forms">
            <form action="">
                <div><i class="fa-solid fa-user"></i></div><input name="text" placeholder="Name" type="text">
                <div><i class="fa-solid fa-phone"></i></div><input name="text" placeholder="Phone No." type="text">
                <div><i class="fa-solid fa-envelope"></i></div><input name="text" placeholder="Email-Id." type="text">
                <div><i class="fa-solid fa-comment"></i></div><input name="text" placeholder="Write Your Message" type="text">
                <input type="submit" value="Send" class="btnSend">
            </form>
        </div>
        <div class="socials">
            <div class="first">
                <div class="icon"><i class="fa-solid fa-location-pin"></i></div>
                <div class="desc">Surat | Gujarat</div>
            </div>
            <div class="first">
                <div class="icon"><i class="fa-solid fa-phone-volume"></i></div>
                <div class="desc">((+91) 704-305-6077)</div>
            </div>
            <div class="first">
                <div class="icon"><i class="fa-regular fa-envelope-open"></i></div>
                <div class="desc">tms@gmail.com</div>
            </div>
            <hr>
            <div class="second">
                <div><i class="fa-brands fa-facebook-f"></i></div>
                <div><i class="fa-brands fa-twitter"></i></div>
                <div><i class="fa-brands fa-square-instagram"></i></div>
                <div><i class="fa-solid fa-envelope-circle-check"></i></div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("../master/sections/footer.php");
include_once("../master/sections/end.php");
?>