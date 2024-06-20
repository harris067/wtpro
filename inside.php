<?php
// Php file to implement sign in functionality
session_start();
$email=$_POST['email'];
$password=$_POST['password'];
    $conn=new mysqli('localhost','root','','login');
    $stmt=$conn->prepare("SELECT username,password FROM signup WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($username,$hashedpassword);
        $stmt->fetch();
        if(password_verify($password,$hashedpassword)){
            $_SESSION['username']=$username;
            header("location:home.php");
            exit();
        }
        else{
            echo"Invalid credentials";
            header("location:sign.php");
            exit();
        }
    }

?>
