<?php
session_start();
$username=$_POST['ur'];
$email=$_POST['email'];
if(empty($_POST['email'])||!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $_SESSION['error']="Please enter a valid email address";
    header("location:signup.php");
}
else{
$password1=$_POST['password'];
$password=password_hash($password1,PASSWORD_BCRYPT);
//Here localhost what if we launch it in live server?
$conn=new mysqli('localhost','root','','login');
if($conn->connect_error){
    die("Unable to connect to database".$conn->connect_error);
}
$stmt=$conn->prepare("insert into signup(username,email,password) values(?,?,?)");
$stmt->bind_param("sss",$username,$email,$password);
$stmt->execute();
if($stmt->affected_rows>0){
    $_SESSION['username']=$username;
    echo"Inserted the values successfully";
    header("location:home.php");
    exit();
}
else{
    echo"Invalid parameters";
    header("location:home.php");
    exit();
}
stmt->close();
conn->close();
}
?>