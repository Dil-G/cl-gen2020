<?php
// session_start();

include('../../config/conn.php');


if(isset($_SESSION['subjectID'])){
  $subjectID =$_SESSION['subjectID'];
}
if(isset($_SESSION['userID'])){
  $userID = $_SESSION['userID'];
}
if(isset($_SESSION['classID'])){
  $classID = $_SESSION['classID'];
}

$teacherID = $_SESSION['userID'];

$class_sql = "SELECT * FROM classes where teacherID = '$teacherID'";

$class_result = $conn->query($class_sql);

if (!$class_result) {
    $error = "Invalid year";
} else {

}


$classID = $_SESSION['classID'] ;

$students_sql = "SELECT * FROM classstudent where classID = '$classID'";

$students_result = $conn->query($students_sql);

if (!$students_result) {
    $error = "Invalid year";
} else {

}





// $sql = "SELECT * from marks where classID = '$classID'";
// $result = mysqli_query($conn,$sql);

// if($result){
//   //echo "Sucessfull";
// }
// else{
//   echo"failed";	
// }
// while($row3=mysqli_fetch_assoc($result)){
//   $studentID = $row3['admissionNumber'];
//   $subjectID = $row3['subjectID'];
// }

if(isset($_GET['studentID'])){
  $studentID=$_GET['studentID'];

$student_sql1="SELECT * from `student` where `admissionNo` = '$studentID'";
$student_result1 = mysqli_query($conn,$student_sql1);


$passed_sql1 = "SELECT marks.*,subjectGeneral.* from marks 
LEFT JOIN subjectGeneral ON marks.subjectID=subjectGeneral.subjectID  where admissionNumber = '$studentID' AND term = 1";
$passed_result1 = mysqli_query($conn,$passed_sql1);

$passed_sql2 = "SELECT marks.*,subjectGeneral.* from marks 
LEFT JOIN subjectGeneral ON marks.subjectID=subjectGeneral.subjectID  where admissionNumber = '$studentID' AND term = 2";
$passed_result2 = mysqli_query($conn,$passed_sql2);

$passed_sql3 = "SELECT marks.*,subjectGeneral.* from marks 
LEFT JOIN subjectGeneral ON marks.subjectID=subjectGeneral.subjectID  where admissionNumber = '$studentID' AND term = 3";
$passed_result3 = mysqli_query($conn,$passed_sql3);


if($passed_result1||$student_result1 || $passed_result2|| $passed_result3){
  //echo "Sucessfull";
}
else{
  echo"failed";	
}
}

// $sql1 = "SELECT * from student where admissionNO = '$studentID'";
// $result1 = mysqli_query($conn,$sql1);

// while($row1=mysqli_fetch_assoc($result1)){
//     $name = $row1['fName']." ".$row1['mName']." " .$row1['lName'];
// }

// $sql2 = "SELECT * from subjects where subjectID = '$subjectID'";
// $result2 = mysqli_query($conn,$sql2);

// while($row2=mysqli_fetch_assoc($result2)){
//     $subject = $row1['subjectName'];
// }
