<?php
    require_once "database.php";
    if(isset($_COOKIE["email"])){
        $_SESSION["login"]=true;
    }
    if(isset($_SESSION["login"])){
        header("Location: dashboard.php");
    }
    if(isset($_POST["loginBtn"])){
        register($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="loginCSS.css">
</head>
<body>
    <div>
        <form action="" method="POST">
            <div class="container" border="20px"
            style="border:20px; border-radius: 30px; background-color: #efefef; padding: 70px 45px; display:grid; 
            grid-template-columns: auto auto;">
                <div class="content" style="font-size:70px; border:10px; padding: 40px;"><b><i>Login</i><br>Page</b></div>
                <div class="content">
                    <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px;">
                       <div class="content">
                        <label for="email">Email<br></label>
                        <input type="email" id="email" name="email" placeholder="email@gmail.com"
                        style="height: 20px; border:0; margin-top:10px; margin-bottom: 0;">
                       </div>
                   </div>
                   <br>
                   <br>
                   <div class="container" style="display:block; background-color:white; border:10px; padding:10px; padding-left:15px; max-width:auto">
                        <div class="content">
                            <label for="password">Password<br></label>
                            <input type="password" id="password" name="password" placeholder="Password"
                            style="height: 20px; border:0; margin-top:10px; margin-bottom: 0;">
                        </div>
                    </div>
                    <br>
                    <div class="container" style="display:block;">
                        <div class="content">
                            <input type="checkbox" name="rembMe" id="rembMe" style="cursor: pointer;">
                            <label for="rembMe">Remember me</label>
                        </div>
                        <br>
                        <div class="content">
                            <button type="submit" name="loginBtn" style="font-size: large;">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>