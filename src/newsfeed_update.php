<?php

require_once '../config/conn.php';

if (isset($_POST['add_news'])){

        $newsID = $_POST['NID'];
        $title = $_POST['title'];
        $news = $_POST['news'];
        $delete = $_POST['delete'];
        $newimagename = $_FILES['image']['name'];

        echo $delete;

        if($delete == 'delete'){
            $sql = "UPDATE  newsfeed SET title = '$title', news = '$news', image = '' WHERE newsID = '$newsID'";
        }else if($newimagename == ""){
            $sql = "UPDATE  newsfeed SET  title = '$title', news = '$news' WHERE newsID = '$newsID'";
        }else{

        $target = "../images/" . basename($newimagename);
 
        $sql = "UPDATE  newsfeed SET  title = '$title', news = '$news', `image` = '$newimagename' WHERE newsID = '$newsID'";
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }

            if ($conn->query($sql) == TRUE) {
               header('Location: ../public/office/office_news_list.php');
            } else {
            header('Location: ../public/office/office_update_newsfeed.php?error');
            }
    }else{
        header('Location: ../public/office/office_edit_newsfeed.php?error');
    }

$conn->close();


?>