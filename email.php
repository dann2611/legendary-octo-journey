


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EXPERT CONSULT Website</title>
        <link rel="stylesheet" href=<?php  echo generateKey() ?>>
        <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
    </head>
    <body  bgcolor= #141414>
        <nav class="navbar">
            <div class="navbar__container">
                <a href="/" id="navbar__logo"><img src="images/pic2.png" alt="" id="main__img"></a>
                <div class="navbar__toggle" id="mobile-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
                <ul class="navbar__menu">
                    <li class="navbar__item">
                        <a href="/" class="navbar__links">Home</a>
                    </li>
                    <li class="navbar__item">
                        <a href="/query.php" class="navbar__links">Query</a>
                    </li>
                    <li class="navbar__btn">
                        <a href="/login.php" class="button">Log In</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <div class="main__container">
                <div class="main__content">
                    <h1>COMING SOON!</h1>
                    <button class="main__btn"><a href="/index.php">Back to Home</a></button>
                </div>
            </div>
        </div>

        <!-- Services section-->
        <div class="services">
            <h1>Our Services</h1>
            <div class="services__container">
                <div class="services__card">
                    <h2>Book a time to enter</h2>
                    <p>We are only open on weekdays</p>
                    <button><a href="/booking.php">Get Started</a></button>
                </div>
                <div class="services__card">
                    <h2>Send us an email</h2>
                    <p>We'll get back to you as soon as possible</p>
                    <button><a href="/query.php">Email Us</a></button>
                </div>
            </div>
        </div>

        <!--Footer-->

        <div class="footer__container">
            <div class="footer__links">
                <div class="footer__link--wrapper">
                    <div class="footer__link--items">
                        <h2>About Us</h2>
                        <a href="/">Contact information</a>
                    </div>
                    <div class="footer__link--items">
                        <h2>Social Media</h2>
                        <a href="https://en-gb.facebook.com/">Facebook</a>
                        <a href="https://uk.linkedin.com/">LinkedIn</a>
                    </div>
                </div>
                <div class="footer__link--wrapper">
                    <div class="footer__link--items">
                        <h2>Information</h2>
                        <a href="/">Frequently asked questions</a>
                        <a href="/">Terms of Service</a>
                    </div>
                    <div class="footer__link--items">
                        <h2>Location</h2>
                        <a href="/">Where we are</a>
                    </div>
                </div>
            </div>
            <div class="social__media">
                <div class="social__media--wrap">
                    <div class="footer__logo">
                        <a href="/" id="footer__logo"><i class="fas fa-comments"></i>EXCO</a>
                    </div>
                    <p class="website__rights">©EXCO 2023. 
                    All rights reserved</p>
                    <div class="social__icons">
                        <a href="https://en-gb.facebook.com/" class="social__icon--link"
                         target="_blank">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://uk.linkedin.com/" class="social__icon--link" target="_blank">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script src="app.js"></script>
    </body>
</html>