<?php

session_start();


require_once '../config/conn.php';

if (isset($_POST['add_inq'])){

    if(!isset($_SESSION['userType'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }else{

        $userID = $_SESSION['userID'];
        $userType = $_SESSION['userType'];

    
        $title = $_POST['title'];
        $message = $_POST['msge'];
        $reciever = $_POST['reciever'];
        $sender = $userID;

 
        $sql = "INSERT INTO inquiry(title,message,reciever,sender)VALUES ('$title','$message','$reciever','$sender')";

        

        if (mysqli_query($conn,$sql)) {
            if($userType == 'student'){
                header('Location: ../public/student/inquiries.php');
            }else if($userType == 'teacher'){
            header('Location: ../public/teacher/inquiries.php');
            }
        }else{
            if($userType == 'student'){
                header('Location: ../public/student/inquiries.php?error='.$error);
            }else if($userType == 'teacher'){
                header('Location: ../public/teacher/inquiries.php?error='.$error);
            }
            
        }
    }
            
    }else{
        header('Location: ../public/student/inquiries.php?error='.$error);
    }


$conn->close();


?>