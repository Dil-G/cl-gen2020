<?php 

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$count = "SELECT COUNT(*)  FROM newsfeed";
$sql = "SELECT * FROM newsfeed ORDER BY newsID DESC";

$res= mysqli_query($conn,$sql);
$res1= mysqli_query($conn,$count);

if($res){
 //echo "Sucessfull";
}
else{
echo"failed";	
}

?>


