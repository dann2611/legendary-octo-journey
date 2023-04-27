<?php 

session_start();

include("connections.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
	//something was posted
	$email = $_POST["Email"];
	$password = $_POST["Password"];

	if(!empty($email) && !empty($password)){
        
		//read from database
            $query = "select * from users where email = '$email' limit 1";
            $result = mysqli_query($con, $query);
            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    if(!empty($user_data["email_verified_at"])){
                        if($user_data["password"] === $password){
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index-loggedin.php");
                            die("Successfully logged in");
                        }else{
                            $error = "Wrong password";
                            echo "<p style='
                            color:red;
                            text-align:center;
                            '>" . $error . "</p>";
                        }
                    }else{
                        $error3 = "Email hasn't been verified. Sign up again to get an account";
                        echo "<p style='
                        color:red;
                        text-align:center;
                        '>" . $error3 . "</p>";
                        $emailtemp = $user_data["email"];
                        //$sql = "DELETE FROM login_test WHERE email IN ($emailtemp)";
                    }
            }else{
                $error2 = "Couldn't find email";
                echo "<p style='
                color:red;
                text-align:center;
                '>" . $error2 . "</p>";
            }
        }
	}else{
        $error4 = "Please enter valid information";
		echo "<p style='
        color:red;
        text-align:center;
        '>" . $error4 . "</p>";
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
        <form action="" method="post" class="loginform">
            <div class="imgcontainer">
                <i class="fa-solid fa-circle-user"></i>
            </div>
          
            <div class="container">
                <label for="email">Email:</label><br>
                <input type="text" id="Email" name="Email"><br>
                <label for="password">Password:</label><br>
                <input type="password" id="Password" name="Password"><br><br>
                <input type="submit" class="Login" value="Login">
            </div>
          
            <div class="container2" style="background-color:#141414">
              <button type="main__btn" class="cancelbtn"><a href="/">Cancel</a></button>
              <span class="psw"><a href="/signup.php" class="psw">Want to sign up?</a></span>

            </div>
            
          </form>
        
        <script src="app.js"></script>
    </body>
</html>