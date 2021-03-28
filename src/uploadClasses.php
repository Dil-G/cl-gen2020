<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if (isset($_POST["Import"])) {

  $thisGrade = $_POST["grade"];
  $NoOfStudents = $_POST["NoOfStudents"];

  $allowed =  array('csv');
  $checkFile = $_FILES["file"]["name"];
  $ext = pathinfo($checkFile, PATHINFO_EXTENSION);
  if (!in_array($ext, $allowed)) {

<<<<<<< HEAD
    $error = "Upload a CSV file";
    header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
=======
  $fp = file($filename);
  $c =  count($fp) - 1;

  if ($NoOfStudents != $c) {
    $error = "Numbers do not match!";
    header('Location: ../public/office/office_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
>>>>>>> 29f3e70bc5fc230c148413f61439af33a90a83b0
    exit();
  } else {

    $IDarray = array();
    $count = 0;
    if ($_FILES['file']['name']) {
      $filenames = explode(".", $_FILES['file']['name']);
      if ($filenames[1] == 'csv') {
        $handles = fopen($_FILES['file']['tmp_name'], "r");
        while ($datas = fgetcsv($handles)) {

          $count++;
          if ($count == 1) {
            continue;
          }

          $items2 = mysqli_real_escape_string($conn, $datas[0]);
          $items3 = mysqli_real_escape_string($conn, $datas[1]);

          $retrieve_grade = "SELECT * FROM student WHERE admissionNo='$items3'";
          $grade_result =  mysqli_query($conn, $retrieve_grade);

          if(mysqli_num_rows($grade_result)==0){
            $error = "Invalid Student ID ".$items3;
            echo $error;
            header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
            exit();
          }

          $classID = substr($items2,0,6);
          if($classID != $thisGrade){
            $error = "Invalid Class ID in the CSV file";
            echo $error;
            header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
            exit();
          }
         
          $row = mysqli_fetch_assoc($grade_result);
          $enteredGrade = $row['enteredGrade'];
          $enteredDate = $row['enteredDate'];
          $enteredYear = date("Y", strtotime($enteredDate));
          $nowYear = date("Y");
          $yearDifference = $nowYear-$enteredYear;
          echo $yearDifference;
          $possibleGrade = $enteredGrade+$yearDifference;
          echo $possibleGrade;
          echo $thisGrade;
          $nowGrade = substr($thisGrade,5);
          echo " possible ".$possibleGrade;
          echo " now ".$nowGrade;

          if($nowGrade != $possibleGrade){
            $error = "Invalid Student ".$items3." in the CSV file: Check for the accuracy";
            echo $error;
            header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
            exit();
          }

          if (in_array($items3, $IDarray)) {
            $error = "Duplicate Student ID ".$items3." in CSV file";
            echo $error;
            header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
            exit();
          } else {
            array_push($IDarray, $items3);
          }
        }
      }
    }
    fclose($handles);

    $c = 0;
    if ($_FILES['file']['name']) {
      $filename = explode(".", $_FILES['file']['name']);
      if ($filename[1] == 'csv') {
        $handle = fopen($_FILES['file']['tmp_name'], "r");
        while ($data = fgetcsv($handle)) {

<<<<<<< HEAD
          $c++;
          if ($c == 1) {
            continue;
          }
=======
    $error = "Upload a CSV file";
    header('Location: ../public/office/office_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
    exit();
  }
  $retireve = "SELECT * from classstudent WHERE gradeID = '$thisGrade'";
  $resultRetrieve = mysqli_query($conn, $retireve);
  echo $thisGrade . " ";
>>>>>>> 29f3e70bc5fc230c148413f61439af33a90a83b0

          
          $data2 = mysqli_real_escape_string($conn, $data[0]);
          $data3 = mysqli_real_escape_string($conn, $data[1]);

          $id = substr($data3,2).substr($data2,0,6);

<<<<<<< HEAD
          // echo $MID." /-";
          $retrieve = "SELECT * FROM classStudent WHERE id='$id'";
          $marks_result =  mysqli_query($conn, $retrieve);
=======
    if ($result1 == FALSE) {
      $error = "Cannot delete the file";
      echo $error;
      header('Location: ../public/office/office_classes.php?error=' . $error);
    }
  }
>>>>>>> 29f3e70bc5fc230c148413f61439af33a90a83b0


          if (mysqli_num_rows($marks_result) > 0) {
            $sql = "UPDATE classStudent SET `classID` = '$data2' WHERE id='$id'";
          } else {

            $sql = "INSERT into classStudent (gradeID,classID,studentID,id) values ('$thisGrade','$data2','$data3','$id')";
          }

<<<<<<< HEAD
          $import_result = mysqli_query($conn, $sql);

          if ($import_result) {
            echo "2";
          } else {
            $error = "Error in uploading";
            header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
          }
          // $maxID = $maxID + 1;
        }
        fclose($handle);
        header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade);
=======
      if (!isset($result)) {
        $error = "Cannot Upload the file";
        header('Location: ../public/office/office_classes.php?error=' . $error);
      } else {
        header('Location: ../public/office/office_classes.php?Ggrades=' . $thisGrade);
>>>>>>> 29f3e70bc5fc230c148413f61439af33a90a83b0
      }
    }
  }
}



if (isset($_GET['class']) ) {

  $thisClass = $_GET['class'];
  $sql = "SELECT * FROM classes WHERE classID = '$thisClass'";
  // $classOne_sql = "SELECT * FROM classstudent ";

  
  // $classOne_result = mysqli_query($conn,$classOne_sql);
  $result = mysqli_query($conn,$sql);

  if (!$result) {
    $error = "Invalid year";
  } else {
  }
}

if (isset( $_SESSION['classID'])) {

  $thisClass = $_SESSION['classID'];
  $sql = "SELECT * FROM classes WHERE classID = '$thisClass'";
  $result = $conn->query($sql);

  if (!$result) {
    $error = "Invalid year";
  } else {
  }
}

if (isset($_POST['uploadClass'])) {

  $teacherID = $_POST['teacherID'];
  $medium = $_POST['medium'];
  $classID = $_POST['classID'];


  $sql1 = "SELECT * FROM teacher WHERE teacherID = '$teacherID'";
  $result1 = mysqli_query($conn, $sql1);


  if (mysqli_num_rows($result1) < 1) {

    $error = "Incorrect Teacher ID";
    header('Location: ../public/office/office_class.php?class=' . $classID . '&error=' . $error);
    exit();
  } else {
    while ($row1 = $result1->fetch_assoc()) {

      $tcrname = $row1['fName'] . " " . $row1['lName'];

      $sql2 = "UPDATE classes SET  teacherIncharge='$tcrname', teacherID='$teacherID', medium='$medium' WHERE classID = '$classID'";
      $result2 = mysqli_query($conn, $sql2);

      if ($result2 == FALSE) {
        $error = "Cannot delete";
        header('Location: ../public/office/office_class.php?class=' . $classID . '&error=' . $error);
      } else {

        header('Location: ../public/office/office_class.php?class=' . $classID);
      }
    }
  }
} else {
}
