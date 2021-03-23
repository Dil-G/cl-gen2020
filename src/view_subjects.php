<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql_alstream = "SELECT * from alstreams ";
$sql_subjects = "SELECT * from subjects WHERE subjectType='advanced' ";

$sql_streamsubjects="SELECT streamsubject.subjectID, subjects.subjectName FROM streamsubject
INNER JOIN subjects ON streamsubject.subjectID=subjects.subjectID";

$sql_subjects = "SELECT * from subjects WHERE subjectType='advanced' ";
// $sql1 = "SELECT COUNT(SportID) from csports where tcrID = '$userID'";
// $sql2 = "SELECT SocietyID,SocietyName from csocieties where tcrID = '$userID'";
// $sql3 = "SELECT COUNT(SocietyID) from csocieties where tcrID = '$userID'";

$result_alstream = mysqli_query($conn,$sql_alstream);
$result_subjects= mysqli_query($conn,$sql_subjects);
$result_streamsubjects= mysqli_query($conn,$sql_streamsubjects);
// $result1 = mysqli_query($conn,$sql1);
// $result2 = mysqli_query($conn,$sql2);
// $result3 = mysqli_query($conn,$sql3);

if($result_alstream){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>