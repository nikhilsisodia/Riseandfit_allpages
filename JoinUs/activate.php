<?php
session_start();

include 'dbconnect.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    $statusQuery = " update registration set status='active' where token='$token' ";

    $result = mysqli_query($conn,$statusQuery);

    if($result){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Email verified";
            header('location: login.php');            
        }
        else{
            $_SESSION['msg'] = "You are loged out ";
            header('location: login.php'); 
        }
    }
    else{
        $_SESSION['msg'] = "Email not verified";
        header('location: signup.php');
    }

}