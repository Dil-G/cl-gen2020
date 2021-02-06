<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT SportID,SportName from csports where tcrID = '$userID'";
$sql2 = "SELECT SocietyID,SocietyName from csocieties where tcrID = '$userID'";

mysqli_query($conn, $sql);
$result = mysqli_query($conn,$sql);

mysqli_query($conn, $sql);
$result2 = mysqli_query($conn,$sql2);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>

