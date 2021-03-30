<?php

if (isset($_POST['add_inq'])){
    require_once '../config/conn.php';
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userType'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }else{
        $userID = $_SESSION['userID'];
        $userType = $_SESSION['userType'];
        $username = $_SESSION['username'];

    
        $title = $_POST['title'];
        $message = $_POST['msge'];
        $reciever = $_POST['rID'];
        $sender= $_POST['sender'];


 
        $sql = "INSERT INTO inquiry(title,message,reciever,sender)VALUES ('$title','$message','$reciever','$sender')";


        if (mysqli_query($conn,$sql)) {
            if($userType == 'parent'){
                header('Location: ../public/parent/inquiries.php');
            }else if($userType == 'teacher'){
                header('Location: ../public/teacher/inquiries.php');      
            }
        }else{
            $error = "Inquiry cannot be sent";
            if($userType == 'parent'){
                header('Location: ../public/parent/inquiries.php?error='.$error);
            }else if($userType == 'teacher'){
                header('Location: ../public/teacher/inquiries.php?error='.$error);   
            }
            
        }
    }
          
    }else{
        $error = "Please Login!";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }


    $conn->close();



?>