<?php 

phpinfo();

session_start();

include("connections.php");
include("functions.php");
if (isset($_POST["verify_email"])){
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];
    $con = mysqli_connect($dbhost, $dbemail, $dbpass, $dbname);
    $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 0){
        die("Verification code failed.");
    }
    header("Location: accountmade.php");;
    exit();
}


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
                        <a href="/index.php" class="navbar__links">Home</a>
                    </li>
                </ul>
            </div>
        </nav>

    <body  bgcolor= #161616>
        <br><br>
        <h1 style="margin:auto; color:#cecece;text-align:center;max-width:60%; ">We've sent you a verification code. Check you email (if it isn't there, check your spam folder)</h1>
        <br><br><br>
        <form method="POST">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
            <input type="text" name="verification_code" placeholder="Enter verification code" required />
        
            <input type="submit" name="verify_email" class="signupbtn" value="Verify Email">
        </form>
        <script src="app.js"></script>
    </body>
</html>