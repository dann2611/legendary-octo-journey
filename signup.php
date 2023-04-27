<?php 

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'C:/Users/Daniel Kichukov/vendor/autoload.php';
 
session_start();

include("connections.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $name = $_POST["Name"];
  $email = $_POST["Email"];
  $password = $_POST["Password"];
  $number = $_POST["Number"];
  $mail = new PHPMailer(true);

  //detect if user already exists
  if(!empty($email) && !empty($password) && !empty($number) && !empty($name)){

    $query = "select * from users where email = '$email' limit 1";
		$result = mysqli_query($con, $query);
		if(!empty($result)){
      //verification email
      try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.elasticemail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'exco.website@gmail.com';

        //SMTP password
        $mail->Password = '85AB4B25DFEC1FA8BFEA53B2D93DE9FFC869';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 2525;

        //Recipients
        $mail->setFrom('exco.website@gmail.com', 'EXPERT CONSULT WEBSITE');

        //Add a recipient
        $mail->addAddress($email, $name);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        echo 'Message has been sent';

        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "login_test");
        
        $user_id = random_num(20);

        // insert in users table
        $query = "Insert into users (user_id,name,email,number,password,verification_code,email_verified_at)
        values ('$user_id','$name','$email','$number','$password','$verification_code',NULL)";
        
        mysqli_query($conn, $query);

        header("Location: email-verification.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
      }else{
        $error3 = "This user already exists";
		    echo "<p style='
        color:red;
        text-align:center;
        '>" . $error3 . "</p>";
      }
		}else{
      $error2 = "Please enter valid information";
      echo "<p style='
      color:red;
      text-align:center;
      '>" . $error2 . "</p>";
  }
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
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </head>
    <body  bgcolor= #161616>
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
                    <li class="navbar__btn">
                        <a href="/login.php" class="button">Log In</a>
                    </li>
                </ul>
            </div>
        </nav>

    <body  bgcolor= #141414>
        <form method="post" style="border:1px solid #ccc" class="signupform" id="login">
            <div class="container__signup">
              <h1>Sign Up</h1><br>
              <p>Please fill in this form to create an account.</p><br><br>
  
              <div class="container__prompts">
                <label for="name">Name:</label><br>
                <input type="text" id="Name" name="Name"><br>
                <label for="email">Email:</label><br>
                <input type="text" id="Email" name="Email"><br>
                <label for="number">Phone Number:</label><br><br>
                <input type="text" id="Number" name="Number"><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="Password" name="Password"><br><br>
                <input type="submit" class="submit" value="Submit" name="submit">
            </div>
              <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p><br>
          
              <div class="clearfix">
                <button type="main__btn" class="cancelbtn"><a href="/">Cancel</a></button>
              </div>
            </div>
          </form>
          <div class="alert alert-info" style="display: none;"></div>
        <script src="app.js"></script>
    </body>
    <script>
      const phoneInputField = document.querySelector("#Number");
      const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript:
          "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
      });
      const info = document.querySelector(".alert-info");

      function process(event) {
      event.preventDefault();

      const phoneNumber = phoneInput.getNumber();

      info.style.display = "";
      info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
      }
    </script>
</html>