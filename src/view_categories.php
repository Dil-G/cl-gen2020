<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql_sport = "SELECT * from csports WHERE activeStatus = 0";
$result_sport = mysqli_query($conn,$sql_sport);


$sql_society = "SELECT * from csocieties WHERE activeStatus='0'";
$result_society = mysqli_query($conn,$sql_society);

if($result_sport||$result_society){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}

?>