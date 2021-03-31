<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
echo $_GET['achievementID'];
//sports
$sql_select_sports = "SELECT * FROM sports_achievements WHERE achievementID = '".$_GET['achievementID']."'";
$results_select_sports = mysqli_query($conn,$sql_select_sports);

if (isset($_POST['update_sports'])) {
    echo ("ss");


    $stuID = $_POST['userID'];
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

    $reuslt_sports = $conn->query($sql_sports);
    if ($reuslt_sports == false){
        $error = "Error in entering data";
    }else{
        header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID);

    }
 
}

$sql_select_sports = "SELECT * FROM societies_achievements WHERE achievementID = '".$_GET['achievementID']."'";
$results_select_sports = mysqli_query($conn,$sql_select_sports);

//societies
if (isset($_POST['update_societies'])) {
    echo ("ss");


    $stuID = $_POST['userID'];
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

    $reuslt_societies = $conn->query($sql_societies);
    if ($reuslt_societies == false){
        $error = "Error in entering data";
    }else{
        header('Location: ../public/office/office_view_student_achievements.php?userID='.$stuID);

    }
 
}



?>