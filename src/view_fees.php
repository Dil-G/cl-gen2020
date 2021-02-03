<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT feesID, TeacherID, StudentID,StudentName,FeeType,Amount,Status,Date,Time from fees where teacherID = '$userID'";
mysqli_query($conn, $sql);
$result = mysqli_query($conn,$sql);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>

