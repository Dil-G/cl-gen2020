<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

//$sql = "SELECT * from sports_achievements where teacherID = '$userID'";


$sql = "SELECT sports_achievements.*,teachertype.* from teachertype 
LEFT JOIN sports_achievements ON sports_achievements.categoryID=teacherType.entityAssigned where teacherID = '$userID'";
$sql1 = "SELECT COUNT(SportID) from sports_achievements where tcrID = '$userID'";

$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);




if($result){
 // echo "Sucessfull";
}
else{
  echo"failed";	
}



?>

