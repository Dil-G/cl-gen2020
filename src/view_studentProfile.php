
<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));


$sql = "SELECT * FROM student where admissionNo='$userID' ";
$result = mysqli_query($conn,$sql);

$sql_parent = "SELECT * FROM parent where admissionNo='$userID' ";
$result_parent  = mysqli_query($conn,$sql_parent);

$ol_sql="SELECT ol_subjects.*,ol_results.* from ol_results 
LEFT JOIN ol_subjects ON ol_subjects.SubjectID=ol_results.subjectID where studentID = '$userID'";

// $ol_sql="SELECT * from ol_results  where studentID = '$userID'";
$ol_result = mysqli_query($conn,$ol_sql);


$al_sql="SELECT subjects.*,alresults.* from alresults 
LEFT JOIN subjects ON subjects.subjectID=alresults.subjectID where studentID = '$userID'";
$al_result = mysqli_query($conn,$al_sql);

$count_sports = "SELECT COUNT(*) FROM sports_achievements where studentID = '$userID'";
$countSports_result = mysqli_query($conn,$count_sports);

$count_socieity = "SELECT COUNT(*) FROM societies_achievements where studentID = '$userID'";
$countSociety_result = mysqli_query($conn,$count_socieity);

$sports = "SELECT csports.*,sports_achievements.* from sports_achievements 
LEFT JOIN csports ON csports.sportID=sports_achievements.categoryID where studentID = '$userID'";
$sports_result = mysqli_query($conn,$sports);

$socities = "SELECT csocieties.*,societies_achievements.* from societies_achievements 
LEFT JOIN csocieties ON csocieties.societyID=societies_achievements.categoryID where studentID = '$userID'";
$socities_result = mysqli_query($conn,$socities);

// if(!$staff_result || !$staff_result3){
//     $error = "Cannot Retrieve Data";
// }
// else{
    	
// }
