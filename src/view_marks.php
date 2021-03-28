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

$student_sql="SELECT marks.*,student.* from marks 
LEFT JOIN student ON marks.admissionNumber=student.admissionNo where admissionNumber = '$studentID'";
$student_result = mysqli_query($conn,$student_sql);

$passed_sql = "SELECT marks.*,subjectGeneral.* from marks 
LEFT JOIN subjectGeneral ON marks.subjectID=subjectGeneral.subjectID  where admissionNumber = '$studentID'";
$passed_result = mysqli_query($conn,$passed_sql);


if($passed_result||$student_result){
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
