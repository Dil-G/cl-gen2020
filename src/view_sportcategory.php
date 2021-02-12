<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT SportID,SportName from csports where tcrID = '$userID'";
$sql1 = "SELECT COUNT(SportID) from csports where tcrID = '$userID'";
$sql2 = "SELECT SocietyID,SocietyName from csocieties where tcrID = '$userID'";
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

