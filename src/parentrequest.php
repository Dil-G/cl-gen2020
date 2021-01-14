<?php

require_once '../config/conn.php';

if (isset($_POST['add_request'])){

    
        $id = $_POST['id'];
        $name = $_POST['name'];
        $request= $_POST['request'];
        $image = $_FILES['image']['name'];
        $target = "../images/" . basename($image);
    
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $sql = "INSERT INTO Request(id,name,request,image,requestDate,requestTime)VALUES ('$id','$name','$request', '$image','$date','$time')";

        if(mysqli_query($conn,$sql)){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $message = "Image uploaded successfully";
                header('Location: ../public/office/o_viewReq.php?message='.$message);
            }else{
                header('Location: ../public/office/o_viewReq.php');
            }
        }else{
            $error = "News not added.";
            header('Location: ../public/parent/editRequest.php.php?error='.$error);
        }
  
    }else{
        header('Location: ../public/parent/editRequest.php?error='.$error);
    }

$conn->close();

?>