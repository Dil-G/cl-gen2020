<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
    $user_sql = "SELECT * FROM teacher WHERE teacherID='$userID'";
    $user_res = $conn->query( $user_sql );

    $result = mysqli_query($conn,$user_sql);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>