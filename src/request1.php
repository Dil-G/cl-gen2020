<?php
session_start();
require_once '../config/conn.php';

if (isset($_POST['add_request'])){

    
        $id = $_POST['id'];
        $name = $_POST['name'];
        $request= $_POST['request'];
        $image = $_FILES['image']['name'];
        $target = "../images/" . basename($image);
    
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $type= $_SESSION['userType'];
        $status = 0;

        $sql = "INSERT INTO Request(id,name,request,image,requestDate,requestTime,status)VALUES ('$id','$name','$request', '$image','$date','$time','$status')";

        if(mysqli_query($conn,$sql)){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && $type=='student')  {
                $message = "Image uploaded successfully";
                header('Location: ../public/student/editRequest.php?message='.$message);
            }else if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && $type=='teacher')  {
                $message = "Image uploaded successfully";
                header('Location: ../public/teacher/request1.php?message='.$message);
            }else{
             header('Location: ../public/office/o_viewReq.php');
            }
        }else{
            $error = "Request not added.";
            header('Location: ../public/teacher/Tcr_RequestEdits.php?error='.$error);
        }
  
    }else{
        header('Location: ../public/teacher/Tcr_RequestEdits.php?error='.$error);
    }

$conn->close();

?>