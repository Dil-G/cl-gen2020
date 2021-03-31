<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

//sports

if (isset($_GET['achievementID'])) {
$sql_select_sports = "SELECT * FROM sports_achievements WHERE achievementID = '".$_GET['achievementID']."'";
$results_select_sports = mysqli_query($conn,$sql_select_sports);
}

if (isset($_POST['update_sports'])) {
   // echo ("ss");


    $stuID = $_POST['stuID'];
    $achievementID = $_POST['achievementID'];
    $achievementName = $_POST['achievementName'];
    $position = $_POST['position'];
    $impValue = $_POST['impValue'];
    $description = $_POST['description'];
    $achievementDate = $_POST['achievementDate'];

    $sql_sports ="UPDATE `sports_achievements` SET `achievementName`='$achievementName',`position`='$position',`impValue`=$impValue,`description`='$description',`achievementDate`= '$achievementDate' WHERE achievementID='$achievementID'";

    $reuslt_sports = mysqli_query($conn,$sql_sports);
    if ($reuslt_sports == false){
        $error = "Error in entering data";
         header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID.'&error='.$error);
    }else{
        
         header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID);

    }
 
}

//societies
if (isset($_GET['achievementID'])) {
$sql_select_society = "SELECT * FROM societies_achievements WHERE achievementID = '".$_GET['achievementID']."'";
$results_select_society = mysqli_query($conn,$sql_select_society);
}

if (isset($_POST['update_societies'])) {
    echo ("ss");


    $stuID = $_POST['stuID'];
    $achievementID = $_POST['achievementID'];
    $achievementName = $_POST['achievementName'];
    $position = $_POST['position'];
    $impValue = $_POST['impValue'];
    $description = $_POST['description'];
    $achievementDate = $_POST['achievementDate'];

    $sql_societies ="UPDATE `societies_achievements` SET `achievementName`='$achievementName',`position`='$position',`impValue`=$impValue,`description`='$description',`achievementDate`= '$achievementDate' WHERE achievementID='$achievementID'";
    
echo $stuID;
    // $sql_societies = "UPDATE societies_achievements
    //  SET  achievementName='$achievementName', position='$position', impValue='$impValue', description='$description', achievementDate='$achievementDate'
    //    WHERE achievementID=$achievementID'";

    $reuslt_societies = mysqli_query($conn,$sql_societies);
    echo $sql_societies."<br>". $conn->error;
    if ($reuslt_societies == false){
        $error = "Error in entering data";
         header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID.'&error='.$error);
    }else{
         header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID);

    }
 
}



?>