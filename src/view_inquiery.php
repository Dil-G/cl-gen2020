<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$sql = "SELECT inquiryID,title,message,sender from inquiry where reciever = '$userID'";
mysqli_query($conn, $sql);
$result = mysqli_query($conn,$sql);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}
