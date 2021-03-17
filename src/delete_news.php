<?php

require_once '../config/conn.php';

if (isset($_GET['newsID'])){

        $newsID = $_GET['newsID'];
 
        $sql = "DELETE FROM newsfeed WHERE newsID = ".$_GET['newsID'];

        $result= mysqli_query($conn,$sql);
	
        if($result){
            header('Location: ../public/office/news_list.php');
        }
        else
        {
            header('Location: ../public/office/edit_newsfeed.php?error');
        }
    }else{
        header('Location: ../public/office/update_newsfeed.php?error');
    }

$conn->close();


?>