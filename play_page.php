<?php
session_start();
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'iwp_project');

$uname = $_SESSION["user_id"];
$getQuizesQuery = "select * from quiz_info";
$result = mysqli_query($con,$getQuizesQuery);
$num = mysqli_num_rows($result);
$photo_link = './images/q1.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/p_style.css">
    <title>Play Page</title>

    <script src="js/jQuery.js"></script>
</head>
<body>
    <div class="header">
        <div class="inner-header">
            <div class="logo-container">
                <h1>KWIZ</span></h1>
            </div>
            <ul class="nav">
                <a href="#"><li>Play Kwiz</li></a>
                <a href="create_quiz.php"><li>Create Kwiz</li></a>
                <a href="manage_acc.php"><li><?php echo $_SESSION["username"]; ?></li></a>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="main">
            <div class="b-container">
                <main class="grid">
                    <?php
                    if($num>0){
                        while($row = mysqli_fetch_array($result)){
                            $creatorId = $row["quiz_creator"];
                            $quizId = $row["quiz_id"];
                            $getCreatorQuery = "select username from users where id='$creatorId'";
                            $execCreatorQuery = mysqli_query($con,$getCreatorQuery);
                            $numC = mysqli_num_rows($execCreatorQuery);
                            if($numC > 0){
                                $row1 = mysqli_fetch_array($execCreatorQuery);
                                echo "<form class='grid' action='play_quiz.php' method='get'>\n";
                                echo "<article><img src=".$photo_link." style='width=100%'><div class="."text".">";
                                echo "<h3>".$row["quiz_name"]."</h3><p>";
                                echo "By - ".$row1["username"];
                                echo "<input type='hidden' id='quiz".$quizId."' name='quizId' value=".$quizId.">";
                                echo "</p><button>Play ".$quizId."</button></div></article>\n";
                                echo "</form>\n";
                            }else{
                                "Sorry No Quizes there!";
                            }
                        }
                    }else{
                        echo "Sorry No Kwizzez there!";
                    }
                    ?>
                </main>
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
                <a href="#">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>