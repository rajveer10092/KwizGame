<?php

session_start();
header('location:login_signup.html');

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'iwp_project');

$uname = $_POST['username'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$s = "select * from users where username='$uname'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username already Exsists!";
}else{
    //$pass_cr = password_hash($pass,"");
    $reg = "insert into users(username,email,name,password) values ('$uname','$email','$fname','$pass')";
    mysqli_query($con,$reg);
    echo "Successfully Registered!";
}

?>