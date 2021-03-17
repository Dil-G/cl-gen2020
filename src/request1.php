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

        $sql = "INSERT INTO request(id,name,request,image,requestDate,requestTime,requestStatus)VALUES ('$id','$name','$request', '$image','$date','$time','$status')";

        $error = "Request not added.";
        $errors = "Cannot add Image";
        if(mysqli_query($conn,$sql)){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && $type=='student')  {
                $message = "Image uploaded successfully";
                header('Location: ../public/student/editRequest.php?message='.$message);
            }else if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && $type=='teacher')  {
                $message = "Image uploaded successfully";
                header('Location: ../public/teacher/request1.php?message='.$message);
            }else if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && $type=='parent')  {
                $message = "Image uploaded successfully";
                header('Location: ../public/parent/editRequest.php?message='.$message);
            }else if ($type=='student'){
                header('Location: ../public/student/editRequest.php?error='.$errors);
            }else if ($type=='teacher'){
                header('Location: ../public/teacher/request1.php?error='.$errors);
            }else if ($type=='parent'){
                header('Location: ../public/parent/editRequest.php?error='.$errors);
            }
        }else if ($type=='student'){
            header('Location: ../public/student/editRequest.php?error='.$error);
        }else if ($type=='teacher'){
            header('Location: ../public/teacher/request1.php?error='.$error);
        }else if ($type=='parent'){
            header('Location: ../public/parent/editRequest.php?error='.$error);
        }
  
    }else if ($type=='student'){
        header('Location: ../public/student/editRequest.php?error='.$error);
    }else if ($type=='teacher'){
        header('Location: ../public/teacher/request1.php?error='.$error);
    }else if ($type=='parent'){
        header('Location: ../public/parent/editRequest.php?error='.$error);
    }

$conn->close();