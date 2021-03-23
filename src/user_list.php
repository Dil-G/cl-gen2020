
<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if (isset($_SESSION['studentID'])) {


    $studentID = $_SESSION['studentID'];
    // echo $studentID;
    $sql_student = "SELECT * FROM student where admissionNo='$studentID'";

    $res_student = mysqli_query($conn, $sql_student);

    unset($_SESSION['studentID']);
    if ($res_student) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}

if (isset($_SESSION['officerID'])) {


    $officerID = $_SESSION['officerID'];
    // echo $studentID;
    $sql_duty = "SELECT * FROM officerduties where officerID='$officerID'";
    $sql_officer= "SELECT * FROM office where officerID='$officerID'";
    $res_officer  = mysqli_query($conn, $sql_officer);
    $res_duty  = mysqli_query($conn, $sql_duty);

    $dutyIDs = array();
    $duties = array();
    while($row_dutyID=mysqli_fetch_array($res_duty)){
        array_push($dutyIDs,$row_dutyID['dutyID']);
    } 

    foreach ($dutyIDs as $dutyID) {
        $sql_duties = "SELECT * FROM duty where dutyID='$dutyID'";
        $res_duties  = mysqli_query($conn, $sql_duties);
        $row_duty=mysqli_fetch_array($res_duties);
        array_push($duties,$row_duty['duty']);
        
      }
      unset($_SESSION['officerID']);
    if ($res_officer) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}


if (isset($_SESSION['teacherID'])) {


    $teacherID = $_SESSION['teacherID'];
    // echo $studentID;
    $sql_teacher = "SELECT * FROM teacher where teacherID='$teacherID'";

    $res_teacher = mysqli_query($conn, $sql_teacher);

    unset($_SESSION['teacherID']);
    if ($res_teacher) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}


if (isset($_SESSION['parentID'])) {


    $stuID = ($_SESSION['parentID']);
    $charID = substr($stuID, 2);
    $parentID = "PR" . $charID;

    // echo $studentID;
    $sql_parent = "SELECT * FROM parent where parentID='$parentID'";

    $res_parent = mysqli_query($conn, $sql_parent);

    unset($_SESSION['parentID']);
    if ($res_parent) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}