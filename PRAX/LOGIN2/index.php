<?php

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    function itExist($data)
    {
        return isset($data) && !empty($data);
    }
    
    print_r($_POST);

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if(itExist($_POST["password"]) && itExist($_POST["password2"]) && itExist($_POST["mail"]))
        {
            $password = checkInput($_POST["password"]);
            $password2 = checkInput($_POST["password2"]);
            $mail = checkInput($_POST["mail"]);


                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                            
                    $error[] = "Incorrect email format";
                    
                }
                if(mb_strlen($password) < 6 ||  $password != $password2)
                {
                    $error[] = "Password needs to be at least 6 characters";
                    

                }
    
        }
        else{
                $error[] = "Missing input";
        }
        
    }

    ?>



<!DOCTYPE html5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Your logo</h2>
        <h3>Login</h3>

        <form action="#" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="username@gmail.com" required>

            <label for="password">Password</label>
            <div class="password-container">
                <input type="checkbox" id="toggle-password">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <label for="toggle-password" class="toggle-password"></label>
            </div>
            
            <label for="confirm-password">Confirm Password</label>
            <div class="password-container">
                <input type="checkbox" id="toggle-confirm-password">
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                <label for="toggle-confirm-password" class="toggle-password"></label>

                <li>
                <?php 
                if(isset($error))
                {
                    for ($i=0; $i < count($error); $i++) { 
                         echo ("<p style='color: red; text-decoration: underline;'>$error[$i]</p>");
                    }
                }
                                        
                ?>
                </li>
            </div>

            <a href="#">Forgot Password?</a>

            <button type="submit">Sign in</button>

            <p>or continue with</p>

            <div class="social">
                <button class="google">
                    <img src="images/flat-color-icons--google.svg" alt="google">
                </button>
                <button class="github">
                    <img src="images/skill-icons--github-light.svg" alt="github">
                </button>
                <button class="facebook">
                    <img src="images/logos--facebook.svg" alt="facebook">
                </button>
            </div>

            <p class="register-text">Don’t have an account yet? <a href="#" class="bold-text">Register for free</a></p>
        </form>
    </div>
</body>
</html>