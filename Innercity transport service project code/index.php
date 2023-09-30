<!-- <?php
        session_start();
        include("connection.php");
        include("functions.php");
        $_SESSION;
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HALUM - The Transport Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main1">
        <nav>
            <h2 class="logo">HALUM</h2>
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#about">ABOUT US</a></li>
                <li><a href="#services">SERVICE</a></li>
                <li><a href="#contact">CONTACT</a></li>
            </ul>
            <a href="signin.php"><button class="btn">LOGIN</button></a>
        </nav>
        <div class="content">
            <h1>Inner City<br><span>Transport Service</h1>
            <p class="par">A helpful city BUS service...</p>

            <a href="signup.php"><button class="cn">JOIN US</button></a>
        </div>
    </div>
    <!-- about -->
    <section class="about" id="about">
        <div class="main">
            <img src="1.jpg">
            <div class="about-text">
                <h2>about us</h2>
                <h5>developer and design </h5>
                <p>
                Design with HTML,CSS and JS <br>
                Develop by:<br>
                1.ANUPAM  KUMAR<br>
                2.Farhan Israq<br>
                3.Md. Ebrahim Hossain<br>
                4.Radia Binte Reza<br>
                </p>
            </div>
        </div>
    </section>
    <!-- services -->
    <div class="services" id="services">
        <div class="title">
            <h2>our services</h2>
        </div>
        <div class="box">
            <div class="card">
                <i class="fas fa-map-marked"></i>
                <h5>Route </h5>
                <div class="pra">
                    <p>Route Information</p>
                    <p style="text-align: center;">
                        <a class="button" href="#">Read more</a>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="fa fa-bus"></i>
                <h5>Bus </h5>
                <div class="pra">
                    <p>Bus Information</p>
                    <p style="text-align: center;">
                        <a class="button" href="#">Read more</a>
                    </p>
                </div>
            </div>
            <div class="card">
                <i class="far fa-file-alt"></i>
                <h5>Ticket</h5>
                <div class="pra">
                    <p>ticket Information </p>
                    <p style="text-align: center;">
                        <a class="button" href="#">Read more</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!------Contact Me------>
    <div class="contact" id="contact">
    </div>
    <!------footer start--------->
    <footer>
        <p>Inner city transport service</p>
        <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
        </div>
        <p class="end">CopyRight By Team Halum </p>
    </footer>
</body>

</html>