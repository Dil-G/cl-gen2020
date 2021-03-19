<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT * from fees where teacherID = '$userID'";
$result = mysqli_query($conn,$sql);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>

