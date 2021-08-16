<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/m_style.css">
    <title>Login / Sign Up</title>
</head>
<body>
    <div class="header">
        <div class="inner-header">
            <div class="logo-container">
                <h1>KWIZ</span></h1>
            </div>
            <ul class="nav">
                <a href="play_page.php"><li>Play Kwiz</li></a>
                <a href="create_quiz.php"><li>Create Kwiz</li></a>
                <a href="manage_acc.php"><li><?php session_start(); echo $_SESSION["username"]; ?></li></a>
            </ul>
        </div>
    </div>
    <div  class="container">
        <div class="main">
            <div class="hero">
                <div class="form-box">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button type="button" class="toggle-btn" onclick="manage()">Manage</button>
                        <button type="button" class="toggle-btn" onclick="logout()">Log Out</button>
                    </div>
                    <form id="manage" class="input-group">
                        <input type="text" class="input-field" placeholder="Change Password" required>
                        <input type="text" class="input-field" placeholder="Confirm Password" required>
                       <!-- <input type="checkbox" class="check-box"><span>Remember Me!</span>-->
                        <button type="submit" class="submit-btn">Save</button>
                    </form>
                    <form action="logout.php" id="logout" class="input-group">
                        <button type="submit" class="submit-btn">Log Out</button>
                    </form>
                </div>               
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
                </p>
            </div>
            <div class="footer-third">
                <a href="#">Contact Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </div>

    <script>
        var x=document.getElementById("manage");
        var y=document.getElementById("logout");
        var z=document.getElementById("btn");
        function logout(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function manage(){
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px";
        }
    </script>
</body>
</html>