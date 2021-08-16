<?php
session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'iwp_project');

$uname = $_SESSION["user_id"];
if(isset($_POST['save'])){
    $quiz_name = $_POST['quiz_name'];
    $ques = $_POST['ques'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $query1= "insert into quiz_info(quiz_name,quiz_creator) values('$quiz_name','$uname')";
    $res = mysqli_query($con,$query1);
    $query2 = "select LAST_INSERT_ID()";
    $res1 = mysqli_query($con,$query2);
    if(mysqli_num_rows($res1)>0){
        $row = mysqli_fetch_array($res1);
        $quiz_id = $row[0];

        foreach ($ques as $key => $value){
            $correct_answer = $_POST['corr_ans'.($key+1)];
            $correct_answer = ord($correct_answer);
            $insertQuestionQuery = "insert into question_info(quiz_id,correct_answer,question) values('$quiz_id','$correct_answer','$value')";
            $insertQuestion = mysqli_query($con,$insertQuestionQuery);
            $res2 = mysqli_query($con,$query2);
            if(mysqli_num_rows($res2)>0){
                $row1 = mysqli_fetch_array($res2);
                $questionId = $row1[0];
                $insertAnswer1 = "insert into answers(answer,que_id) values('$q1[$key]','$questionId')";
                $iA1 = mysqli_query($con,$insertAnswer1);
                $insertAnswer2 = "insert into answers(answer,que_id) values('$q2[$key]','$questionId')";
                $iA2 = mysqli_query($con,$insertAnswer2);
                $insertAnswer3 = "insert into answers(answer,que_id) values('$q3[$key]','$questionId')";
                $iA3 = mysqli_query($con,$insertAnswer3);
                $insertAnswer4 = "insert into answers(answer,que_id) values('$q4[$key]','$questionId')";
                $iA4 = mysqli_query($con,$insertAnswer4);
            }
        }
    }

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
    <link rel="stylesheet" href="./css/q_style.css">
    <title>Quiz Creator for <?php echo $_SESSION["username"]?></title>

    <script src="js/jQuery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var max_questions = 13;
            var x = 1;

            $("#add").on('click',function (){
                if(x<=max_questions) {
                    var html = '<tr><td><div class="q-part">'+
                        '                                <div class="q-header">'+
                        '                                    <div class="QnoBox">'+
                        '                                        Q.No : '+(x+1)+
                        '                                    </div>'+
                        '                                </div>'+
                        '                                <div class="questionBox">'+
                        '                                    <input type="text" id="ques" name="ques[]" size="75">'+
                        '                                </div>'+
                        '                                <div class="optionBox">'+
                        '                                    <span><input type="radio" name="corr_ans'+(x+1)+'" value="A"> <input type="text" id="q1" name="q1[]" size="30"></span>'+
                        '                                    <span><input type="radio" name="corr_ans'+(x+1)+'" value="B"> <input type="text" id="q2" name="q2[]" size="30"></span>'+
                        '                                    <span><input type="radio" name="corr_ans'+(x+1)+'" value="C"> <input type="text" id="q3" name="q3[]" size="30"></span>'+
                        '                                    <span><input type="radio" name="corr_ans'+(x+1)+'" value="D"> <input type="text" id="q4" name="q4[]" size="30"></span>'+
                        '                                </div>'+
                        '                            </div></td></tr>';
                    $("#questions_table").append(html);
                    x++;
                    console.log(x);

                }
            });
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
			<div class="box" style="margin-top: 20px;margin-bottom: 20px;">
                <form action="create_quiz.php" method="post">
                <div class="title">
					Create Kwizz -
                    <input type="text" name="quiz_name" id="quiz_name">
				</div>
                <table id="questions_table">
                    <tbody>
                    <tr><td><div class="q-part">
                                <div class="q-header">
                                    <div class="QnoBox">
                                        Q.No : 1
                                    </div>
                                </div>
                                <div class="questionBox">
                                    <input type="text" id="ques" name="ques[]" size="75">
                                </div>
                                <div class="optionBox">
                                    <span><input type="radio" name="corr_ans1" value="A"> <input type="text" id="q1" name="q1[]" size="30"></span>
                                    <span><input type="radio" name="corr_ans1" value="B"> <input type="text" id="q2" name="q2[]" size="30"></span>
                                    <span><input type="radio" name="corr_ans1" value="C"> <input type="text" id="q3" name="q3[]" size="30"></span>
                                    <span><input type="radio" name="corr_ans1" value="D"> <input type="text" id="q4" name="q4[]" size="30"></span>
                                </div>
                            </div></td></tr>
                    </tbody>
                </table>

				<div class="q-footer">
					<!--<button name="save" id="save">Save</button>-->
					<button name="save" id="save">Save</button>
					<a style="padding: 10px;background-color: #444444;" name="add" id="add">Add</a>
					<div id="mySidenav" class="sidenav">
						  <a href="#" id="exit">EXIT</a>
					</div>	
				</div>
                </form>
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