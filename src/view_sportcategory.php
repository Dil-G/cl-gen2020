<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT csports.*,teachertype.* from teachertype 
LEFT JOIN csports ON csports.SportID=teacherType.entityAssigned where teacherID = '$userID'";

$sql2 = "SELECT csocieties.*,teachertype.* from teachertype 
LEFT JOIN csocieties ON csocieties.SocietyID=teacherType.entityAssigned where teacherID = '$userID'";

$sql1 = "SELECT COUNT(SportID) from csports where tcrID = '$userID'";
$sql3 = "SELECT COUNT(SocietyID) from csocieties where tcrID = '$userID'";

$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);
$result3 = mysqli_query($conn,$sql3);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>


