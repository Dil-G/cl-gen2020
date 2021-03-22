<?php
// session_start();

include('../../config/conn.php');

$studentID=$_SESSION['studentID'];
$subjectID =$_SESSION['subjectID'];
$userID = $_SESSION['userID'];

$sql = "SELECT * from marks where teacherID = '$userID'";
$result = mysqli_query($conn,$sql);

if($result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}
while($row3=mysqli_fetch_assoc($result)){
  $studentID = $row3['admissionNumber'];
  $subjectID = $row3['subjectID'];
}
$passed_sql = "SELECT * from marks where teacherID = '$userID'";
$passed_result = mysqli_query($conn,$passed_sql);

if($passed_result){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}

$sql1 = "SELECT * from student where admissionNO = '$studentID'";
$result1 = mysqli_query($conn,$sql1);

while($row1=mysqli_fetch_assoc($result1)){
    $name = $row1['fName']." ".$row1['mName']." " .$row1['lName'];
}

$sql2 = "SELECT * from subjects where subjectID = '$subjectID'";
$result2 = mysqli_query($conn,$sql2);

while($row2=mysqli_fetch_assoc($result2)){
    $subject = $row1['subjectName'];
}
