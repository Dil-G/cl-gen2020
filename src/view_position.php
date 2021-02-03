
<?php


include('../../config/conn.php');

$sql = "SELECT admissionNumber,studentName,sinhala,english,buddhism,maths,science,history,group01,group02,group03 from marks where teacherID = '$userID'";
mysqli_query($conn, $sql);
$result = mysqli_query($conn,$sql);

$numb = 9;


if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}



?>

