<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

//sports
$sql_select_sports = "SELECT * FROM sports_achievements WHERE achievementID = '".$_GET['achievementID']."'";
$results_select_sports = mysqli_query($conn,$sql_select_sports);

if (isset($_POST['update_sports'])) {
    echo ("ss");


    $stuID = $_POST['studentID'];
    $fName = $_POST['fname'];
    $lname = $_POST['lname'];
    $achievementID = $_POST['achievementID'];
    $achievementName = $_POST['achievementName'];
    $position = $_POST['position'];
    $impValue = $_POST['impValue'];
    $description = $_POST['description'];
    $achievementDate = $_POST['achievementDate'];


    $sql_sports = "UPDATE sports_achievements
     SET  fName='$fName', lName='$lname', achievementID='$achievementID', achievementName='$achievementName', position='$position', impValue='$impValue', description='$description', achievementDate='$achievementDate'
       WHERE officerid='$officerid'";

    $reuslt_sports = mysqli_query($conn,$sql_sports);
    if ($reuslt_sports == false){
        $error = "Error in entering data";
    }else{
        header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID);

    }
 
}

$sql_select_society = "SELECT * FROM societies_achievements WHERE achievementID = '".$_GET['achievementID']."'";
$results_select_society = mysqli_query($conn,$sql_select_society);

//societies
if (isset($_POST['update_societies'])) {
    echo ("ss");


    $stuID = $_POST['studentID'];
    $fName = $_POST['fname'];
    $lname = $_POST['lname'];
    $achievementID = $_POST['achievementID'];
    $achievementName = $_POST['achievementName'];
    $position = $_POST['position'];
    $impValue = $_POST['impValue'];
    $description = $_POST['description'];
    $achievementDate = $_POST['achievementDate'];



    $sql_societies = "UPDATE societies_achievements
     SET  fName='$fName', lName='$lname', achievementID='$achievementID', achievementName='$achievementName', position='$position', impValue='$impValue', description='$description', achievementDate='$achievementDate'
       WHERE officerid='$officerid'";

    $reuslt_societies = mysqli_query($conn,$sql_societies);
    if ($reuslt_societies == false){
        $error = "Error in entering data";
    }else{
        header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID);

    }
 
}



?>