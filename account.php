<?php 
session_start();
	$_SESSION;

	include("connections.php");
	include("functions.php");

	$user_data = check_login($con);

    $conn = odbc_connect("Driver=Microsoft Access Driver (*.mdb, *.accdb);Dbq=E:\\accesstophp\\Expert Consult - FINAL_be.accdb", "", "");

    if (!$conn) {
        exit("Connection Failed: " . $conn);
        }

    odbc_close($conn);

    $db = new PDO ("odbc:DRIVER=Microsoft Access Driver (*.mdb, *.accdb);Dbq=E:\\accesstophp\\Expert Consult - FINAL_be.accdb; Uid=; Pwd=;");

    $email = $user_data['email'];

    $sql = "SELECT * FROM Individuals WHERE IndPrimeEmail = '$email'";

    $result = $db->query($sql);
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
                    <li class="navbar__item">
                        <a href="/query.php" class="navbar__links">Query</a>
                    </li>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-user-circle"></i></button>
                        <div class="dropdown-content">
                            <a href="/account.php">Account</a>
                            <a href="/logout.php">Logout</a>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
        
        <div class="account" style="margin-bottom: -300px">
            <h1><i class="fas fa-user-circle"> </i>
            <div style="font-size:2rem">
                <?php echo $user_data["email"] ?>
            </div>
            </h1> <br><br>
        </div>
        <?php foreach($result->fetchAll() as $key=> $row){ ?>
        <table class="content__table">
            <tr>
                <td>Title: <?php echo $row["Title"]; ?></td>
                <td>Name: <?php echo $row["IndID2"]; ?></td>
            </tr><tr>
                <td>Phone Number: <?php echo $row["IndMobile"]; ?></td>
                <td>Email: <?php echo $row["IndPrimeEmail"]; ?></td>
            </tr>
        </table>
        <table class="content__table">
            <tr>    
                <td>Address information: <?php echo $row["IndStreet1"]; echo "<br>"; echo $row["IndStreet2"];echo "<br>"; echo $row["IndStreet3"]; ?></td>
                <td>City: <?php echo $row["IndCity"]; ?></td>
            </tr><tr>
                <td>Province: <?php echo $row["IndProvince"]; ?></td>
                <td>Postcode: <?php echo $row["IndPcode"]; ?></td>
            </tr>
        <?php } ?>
        </table>
        <div class="main">
            <div class="main__container">
                <div class="main__content" style="margin: auto">
                    <button class="main__btn"><a href="/index-loggedin.php">Back to Home</a></button>
                </div>
            </div>
        </div>

        <!-- Services section-->
        <div class="services" style="margin-top:-250px">
            <nav class="highlight"></nav>
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