<?php

//require_once('cl_gen.php');
require_once '../config/conn.php';

if (isset($_POST['update_ach_sos'])) {
        echo ("ss");

    $stu_id = $_POST['studentID'];
    $achievementID = $_POST['achievementID'];
    $achievementName = $_POST['achievementName'];
    $position = $_POST['position'];
    $impValue = $_POST['impValue'];
    $description = $_POST['description'];
    $achievementDate = $_POST['achievementDate'];
    
    $sql_update = "UPDATE societies_achievements
    SET  achievementID='$achievementID', achievementName='$achievementName', position='$position', impValue='$impValue', ach_description='$description', achievementDate='$achievementDate'
      WHERE studentID='$stu_id'";


     

if ($conn->query($sql) === TRUE){
    
    echo '<script>alert("Update Successful")</script>';
    header('Location: ../public/office/office_view_student_achievements.php?studentID='.$stu_id);

    }else{
        $error = "Cannot add record";
        echo "nxo";
        header('Location: ../public/admin/student.php?error='.$error);
   }






   if (isset($_POST['update_ach_sop'])) {
    echo ("ss");

$stu_id = $_POST['studentID'];
$achievementID = $_POST['achievementID'];
$achievementName = $_POST['achievementName'];
$position = $_POST['position'];
$impValue = $_POST['impValue'];
$description = $_POST['description'];
$achievementDate = $_POST['achievementDate'];

$sql_update = "UPDATE societies_achievements
SET  achievementID='$achievementID', achievementName='$achievementName', position='$position', impValue='$impValue', ach_description='$description', achievementDate='$achievementDate'
  WHERE studentID='$stu_id'";


 

if ($conn->query($sql) === TRUE){

echo '<script>alert("Update Successful")</script>';
header('Location: ../public/office/office_view_student_achievements.php?studentID='.$stu_id);

}else{
    $error = "Cannot add record";
    echo "nxo";
    header('Location: ../public/office/office_view_student_achievements.php?studentID='.$stu_id);
}


   }
}  

$conn->close();
   
?>

