<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT * from csocieties WHERE activeStatus = 1";
mysqli_query($conn, $sql);
$result = mysqli_query($conn,$sql);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}


?>