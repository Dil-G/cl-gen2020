<?php

require_once '../config/conn.php';

if (isset($_POST['add_news'])){

    
        $title = $_POST['title'];
        $news = $_POST['news'];
        $image = $_FILES['image']['name'];
        $target = "../images/" . basename($image);
    
        $date = date('Y-m-d');
        $time = date('H:i:s');

        $sql = "INSERT INTO newsfeed(title,news,image,newsDate,newsTime)VALUES ('$title','$news','$image','$date','$time')";

        if(mysqli_query($conn,$sql)){
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $message = "News added successfully";
                header('Location: ../public/office/news_list.php?message='.$message);
            }else{
                header('Location: ../public/office/news_list.php');
            }
        }else{
            $error = "News not added.";
            header('Location: ../public/office/edit_newsfeed.php?error='.$error);
        }
  
    }else{
        header('Location: ../public/office/edit_newsfeed.php?error='.$error);
    }

$conn->close();

?>