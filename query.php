
<?php
session_start();
$_SESSION;

include("connections.php");
include("functions.php");

$user_data = check_login($con);

?>


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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script type="text/javascript">

        function sendEmail() {
            var email = document.getElementById("email").value
            var number = document.getElementById("number").value
            var subject = document.getElementById("subject").value
            var message = document.getElementById("message").value
            var body = "Email: "+email+"<br/> Phone number: "+number+"<br/> Subject: "
            +subject+"<br/> Message: "+message;
            Email.send({
            Host : "smtp.elasticemail.com",
            Username : "exco.website@gmail.com",
            Password : "85AB4B25DFEC1FA8BFEA53B2D93DE9FFC869",
            To : 'exco.website@gmail.com',
            From : "exco.website@gmail.com",
            Subject : email,
            Body : body
            }).then(
            message => alert("Email sent!")
            );
        }
    </script>

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
                        <a href="/index-loggedin.php" class="navbar__links">Home</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="query__main">
            <div class="query__main__container">
                <div class="query__main__content">
                    <h1>Query Page</h1>
                    <p>Send your questions here</p>
                    <form method="post">
                        <input type="email" placeholder="Email" id="email" value=<?php echo $user_data["email"] ?>>
                        <input type="text" placeholder="Phone Number" id="number" value=<?php echo $user_data["number"] ?>>
                        <input type="text" placeholder="Subject" id="subject" autocomplete="off">
                        <textarea id="message" placeholder="Message" cols="44" rows="15"></textarea>


                        <input type="button" value="Send Email" class="mailButton"
                            onclick="sendEmail()" />
                    </form>
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