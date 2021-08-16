<?php
session_start();
if(isset($_SESSION["username"])){
    header('location:play_page.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/h_style.css">
    <title>Home</title>
</head>
<body>
<div class="header">
    <div class="inner-header">
        <div class="logo-container">
            <h1>KWIZ</span></h1>
        </div>
        <ul class="nav">
            <a href="index.php"><li>Home</li></a>
            <a href="about.html"><li>About</li></a>
            <a href="login_signup.html"><li>Login / Register</li></a>
            <a href="team.html"><li>Team</li></a>
        </ul>
    </div>
</div>
<div  class="container">
    <div class="main">
        <div class="content">
            <small>Welcome to our</small>
            <h1>online quizzing platform</h1>
            <h2>Let's go Kwizzing</h2>
            <h1></h1>
            <input type="button" id="btn" value="Play a quiz">
        </div>
    </div>
</div>
<div class="footer">
    <div class="inner-footer">
        <div class="logo-container">
            <img src="./images/logo.jpg" alt="">
        </div>
        <div class="footer-third">
            <p>
                This website was made as a project towards Internet and Web Programming Course at VIT Bhopal.
                <br>
                Find the source code for this site on Github
            <p>
        </div>
        <div class="footer-third">
            <a href="#">Contact Us</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Sitemap</a>
        </div>
    </div>
</div>
</body>
</html>