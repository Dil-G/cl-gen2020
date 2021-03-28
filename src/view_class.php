
<?php 

// session_start();
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

?>
