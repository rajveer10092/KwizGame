<?php
session_start();
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'iwp_project');
$x=1;
$y = 0;
$functName = $_REQUEST['quizId'];
$queAnsArray = [];
if($functName && $_GET["quizId"]){
    $quizId = $_GET["quizId"];
    $quizQuestionsQuery = "select * from question_info where quiz_id='$quizId'";
    $getQuizQuestions = mysqli_query($con,$quizQuestionsQuery);
    $numQuestions = mysqli_num_rows($getQuizQuestions);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/quiz_play.css">
    <title>Play Game</title>

    <script src="js/jQuery.js"></script>

    <script>
        $(document).ready(function(){
            $("#start_kwizz").on('click',function (){
                $(".home-box").addClass("hide");
                $(".kwizz-box").removeClass("hide");
            })
        });
    </script>
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
                <a href="manage_acc.php"><li><?php echo $_SESSION["username"]; ?></li></a>
            </ul>
        </div>
    </div>
	<div class="container">
        <div class="main">
            <div class="home-box custom-box">
				<h3>Instruction:</h3>
				<p>Total number of questions: <span class="total-question"><?php echo $numQuestions; ?></span></p>
				<button type="button" id="start_kwizz" class="btn">Start Kwizz</button>
			</div>
			<div class="kwizz-box  custom-box hide">
                <?php

                if($numQuestions>0){
                    while($row = mysqli_fetch_array($getQuizQuestions)){
                        $queId = $row["que_id"];
                        $quizAnswersQuery = "select * from answers where que_id='$queId'";
                        $getQuizAnswers = mysqli_query($con,$quizAnswersQuery);
                        $quizAnswersAmt = mysqli_num_rows($getQuizAnswers);
                        //echo "<div style='color:transparent'>".$row["correct_answer"]."</div><br>";
                        echo "<div style='color:transparent'>1</div><br>";
                        echo "<br>";
                        $queAnsArray[$queId] = ($row["correct_answer"] % 4);
                        echo "<div class='question-display'><div class='question-number'>";
                        echo "Question ".$x." of ".$numQuestions."</div>";
                        echo "<div class='question-text'>";
                        echo $row["question"];
                        echo "</div>";
                        echo "<div class='option-container'>";
                        if($quizAnswersAmt > 0){
                            while($rowAns = mysqli_fetch_array($getQuizAnswers)){
                                $ansOption = $rowAns["answer"];
                                $ansId = $rowAns["ans_id"];
                                $ansIdN = $ansId % 4;
                                echo "<input type='radio' id='ans_op".$ansId."' name='ans_op".$y."' value='".$ansIdN."'><label for='ans_op".$ansId."' class='option'>".$ansOption."</label>";
                            }
                            $y = $y+1;
                        }else{
                            echo "Unable to Fetch Options!";
                            echo "<div class='option'>Option 1</div>";
                            echo "<div class='option'>Option 2</div>";
                            echo "<div class='option'>Option 3</div>";
                            echo "<div class='option'>Option 4</div>";
                        }
                        echo "</div>";
                        //echo "<div class='next-question-btn'>";
                        //echo "<button type='button' class='btn'>Lock</button>";
                        //echo "</div>";
                        echo "</div>";
                        //echo "<div class='answers-indicator'></div>";
                        $x = $x+1;
                    }
                }
                }else{
                    echo "Error enter a valid Quiz Id!";
                }

                ?>
                <!--<div class="question-display">
                    <div class="question-number">
                        Question 1 of 10
                    </div>
                    <div class="question-text">
                        What is the color of banana?
                    </div>
                    <div class="option-container">
                        <div class="option">Red</div>
                        <div class="option">Yellow</div>
                        <div class="option">White</div>
                        <div class="option">Black</div>
                    </div>
                    <div class="next-question-btn">
                        <button type="button" class="btn">Lock</button>
                    </div>
                </div>-->
                <div class="next-question-btn">
                    <div style='color:transparent'>1</div><br>
                    <button type="button" id="submit" class="btn">Submit</button>
                </div>
				<!--<div class="answers-indicator">
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>-->
			</div>
			<div class="result-box  custom-box hide">
				<h1>Kwizz Result</h1>
                <!--<tr>
						<td>Attempt</td>
						<td><span class="total-attempt">10</span></td>
					</tr>-->
                <div id="result">

                </div>
				<button type="button" class="btn" onclick="location.reload()">Try Again</button>
				<button type="button" class="btn" onclick="location.href='play_page.php'">Go Back Home</button>
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
<!-- Getting PHP Variables in JS -->
<script>
    var totalQuestions = '<?php echo $x-1; ?>';
    var loopLimit = '<?php echo $y ?>';
    var correctAnswerArray = [<?php echo '"'.implode('","',  $queAnsArray ).'"' ?>];
    var givenAnswerArray = new Array(correctAnswerArray.length);
    var issueAlert = false;



    console.log(correctAnswerArray);
    $(document).ready(function(){
        var radioName = "ans_op";

        $("#submit").on('click',function(){
            // Perform check here that all radio buttons are checked before proceeding to cross check answers and displaying results.
            for (let i=0;i<loopLimit;i++){
                var rName = radioName + i;

                if(!($("input[name="+rName+"]").is(":checked"))) {
                    issueAlert = true;
                }else{
                    var valueOfRadio = $("input[name="+rName+"]:checked").val();
                    givenAnswerArray[i] = valueOfRadio;
                }
            }
            console.log(givenAnswerArray);
            if(issueAlert){
                alert("Please check if all answers are marked!");
                issueAlert = false;
            }else{
                $.ajax({
                    data:  {
                        corr_ans: correctAnswerArray,
                        giv_ans: givenAnswerArray,
                    },
                    type: "post",
                    url: "calc_res.php",
                    success: function(data){
                        $("#result").html(data);
                        $(".result-box").removeClass("hide");
                        $(".kwizz-box").addClass("hide");
                    }
                });
            }
        });
    });
</script>

</html>