<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Education</title>
    <!-- <link rel="stylesheet" href="./master/css/all.css"> -->
    <link rel="stylesheet" href="./master/css/bootstrap.css">
    <link rel="stylesheet" href="./master/css/main.css">
</head>

<body>
    <div class="mainContainer">
        <header>
            <div class="logo">
                <img src="./master/images/TMS_logo.png" alt="">
            </div>
            <div class="actions">
                <ul id="up" class="mainUl">
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a></li>
                    <li><a href="./presentation/aboutUs.php">About Us</a></li>
                    <li><a href="./presentation/contactUs.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="login">
                <ul>
                    <li id="mainElement">Login <i class="fa-solid fa-down-long"></i>
                        <ul id="optionUl" class="h-s">
                            <li><a href="./presentation/adminLogin.php">Admin Login</a></li>
                            <li><a href="./presentation/staffLogin.php">Staff Login</a></li>
                            <li><a href="./presentation/studientLogin.php">Studient Login</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="regastration">
                <a href="./presentation/signUp.php">Regastration</a>
            </div>
        </header>
        <div class="content">
            <div class="cours">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./master/images/bg-title-02.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./master/images/comp.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./master/images/work.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="info">
                <div class="component">
                    <img src="./master/images/images.jpg" alt="">
                    <h2>Aloha</h2>
                    <h4>Avalibale Course : </h4>
                    <ul>
                        <li>For Age Group 7-14
                            <p>Mental Arthimatic Senior</p>
                        </li>
                        <li>For Age Group 4-7
                            <p>Mental Arthimatic Senior</p>
                        </li>
                        <li>For Age Group 20-30
                            <p>Mental Arthimatic Senior</p>
                        </li>
                        <li>For Age Group 25-35
                            <p>Mental Arthimatic Senior</p>
                        </li>
                        <li>For Age Group 35-40
                            <p>Mental Arthimatic Senior</p>
                        </li>
                    </ul>
                    <a href="" class="viewBtn">View Details <i class="fa-solid fa-angle-right"></i> <i class="fa-solid fa-angle-right"></i></a>
                </div>
                <div class="component">
                    <img src="./master/images/index.jpg" alt="">
                    <h2>Radix Coaching Class</h2>
                    <h3>Courses Available For Commerce CBSE only</h3>
                    <h4>All Main Subjects for XI and XII Commerce: </h4>
                    <ul>
                        <li>Accountancy</li>
                        <li>Business Studies</li>
                        <li>Economics</li>
                        <li>Mathematics</li>
                        <li>Entrepreneur</li>
                        <li>English</li>
                    </ul>
                    <a href="" class="viewBtn">View Details <i class="fa-solid fa-angle-right"></i> <i class="fa-solid fa-angle-right"></i></a>
                </div>
                <div class="component">
                    <img src="./master/images/mahavirtutor.png" alt="">
                    <h2>Mahavir Tutors</h2>
                    <h4>Available Courses : </h4>
                    <ul>
                        <li>Certification Course</li>
                        <li>Academics</li>
                        <li>Engineering</li>
                    </ul>
                    <a href="" class="viewBtn">View Details <i class="fa-solid fa-angle-right"></i> <i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>
            <div class="admin">
                <div class="information">
                    <h2>Admin Panel</h2>
                    <p>After Registration and Login webite will create a profile for the respective tuition Classes . Admin can also add their Branch . In this site Admin or Owner of the Classes or Tuition can manage their staff and student information. Admin can Generate teacher id and Student id so that they can login to their own profile page to watch their information . Admin can send notification to the staff and student . Can Generate Reports.</p>
                </div>
                <div class="photo">
                    <img src="./master/images/admin.jpg" alt="">
                </div>
            </div>
            <div class="divider">
                <hr>
            </div>
            <div class="teatcher">
                <div class="photo">
                    <img src="./master/images/teacher.jpg" alt="">
                </div>
                <div class="information">
                    <h2>Teacher Panel</h2>
                    <p>After getting Login Id from respective tution classes they can login to their profile which is created by the owner. Teacher can view the salary statement. Teacher can send notification to the student and view notification send by the owner.</p>
                </div>
            </div>
            <div class="divider">
                <hr>
            </div>
            <div class="student">
                <div class="information">
                    <h2>Student Panel</h2>
                    <p>After getting Login Id from respective tution classes they can login to their profile which is created by the owner. Student can view the fees statement. Student will received the notication from the respective classes or teacher</p>
                </div>
                <div class="photo">
                    <img src="./master/images/student_clg.jpg" alt="">
                </div>
            </div>
        </div>
        <footer>
                <div class="textSocial">
                    <div>
                        <h3>TMS</h3>
                        <h6>Join TMS to manage the details profesionally</h6>
                        <a class="signUp" href="./presentation/signUp.php">Sign Up</a>
                    </div>
                    <div>
                        <h3>QUICK LINKS</h3>
                        <ul>
                            <li>Home</li>
                            <li>About Us</li>
                            <li>Contact Us</li>
                            <li>Help</li>
                        </ul>
                    </div>
                    <div>
                        <h3>HAVE A QUESTION?</h3>
                        <ul>
                            <li><i class="fa-solid fa-location-dot"></i> Suart / Juajarat</li>
                            <li><i class="fa-solid fa-phone"></i> +090 125 452 00</li>
                            <li><i class="fa-regular fa-envelope"></i> tms@gmail.com</li>
                        </ul>
                    </div>
                    <div>
                        <a href="#up"> Back To Up <i class="fa-solid fa-arrow-up"></i>
                        </a>
                    </div>
                </div>
                <div class="photoSocial">
                    © 2019 | All Rights Reserved.
                    Powered by TMS.com
                    </div>
        </footer>
    </div>
    <script src="./master/js/all.js"></script>
    <script src="./master/js/bootstrap.js"></script>
    <script src="./master/js/main.js"></script>
</body>

</html>