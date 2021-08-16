<?php

session_start();
if(isset($_SESSION["username"])){
    header('location:play_page.php');
}

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'iwp_project');

$uname = $_POST['username'];
$pass = $_POST['password'];

$s = "select * from users where username='$uname'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num > 0){
    while ($row = mysqli_fetch_array($result)){
        //$pass_c = password_hash($pass, "BAJO");
        //echo $pass_c;
        if($pass == $row["password"]){
            $_SESSION["username"] = $uname;
            $_SESSION["user_id"] = $row["id"];
            header("location:play_page.php");
        }else{
            echo "Wrong Details";
        }
    }
}else{
    echo "Wrong User Details";
}

?>