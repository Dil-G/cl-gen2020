<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if (isset($_POST["Import"])) {

  $thisGrade = $_POST["grade"];
  $NoOfStudents = $_POST["NoOfStudents"];

  $allowed =  array('csv');
  $checkFile = $_FILES["file"]["name"];
  $filename = $_FILES["file"]["tmp_name"];
  print_r(pathinfo($checkFile, PATHINFO_BASENAME));
  $ext = pathinfo($checkFile, PATHINFO_EXTENSION);

  $fp = file($filename);
  $c =  count($fp) - 1;

  if ($NoOfStudents != $c) {
    $error = "Numbers do not match!";
    header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
    exit();
  }


  if (!in_array($ext, $allowed)) {

    $error = "Upload a CSV file";
    header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
    exit();
  }
  $retireve = "SELECT * from classstudent WHERE gradeID = '$thisGrade'";
  $resultRetrieve = mysqli_query($conn, $retireve);
  echo $thisGrade . " ";

  if ($resultRetrieve) {
    echo "DONE;";

    $sql1 = "DELETE FROM classstudent WHERE gradeID = '$thisGrade'";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1 == FALSE) {
      $error = "Cannot delete the file";
      echo $error;
      header('Location: ../public/office/o_classes.php?error=' . $error);
    }
  }


  $firstLine = TRUE;
  if ($_FILES["file"]["size"] > 0) {
    $file = fopen($filename, "r");
    while (($getData = fgetcsv($file, 1000, ",")) !== FALSE) {
      if ($firstLine) {
        $firstLine = false;
        continue;
      }

      $sql = "INSERT into classStudent (gradeID,classID,studentID) values ('$thisGrade','" . $getData[0] . "','" . $getData[1] . "')";
      $result = mysqli_query($conn, $sql);

      if (!isset($result)) {
        $error = "Cannot Upload the file";
        header('Location: ../public/office/o_classes.php?error=' . $error);
      } else {
        header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade);
      }
    }
    fclose($file);
  }
}

if (isset($_GET['class']) ) {

  $thisClass = $_GET['class'];
  $sql = "SELECT * FROM classes WHERE classID = '$thisClass'";
  $result = $conn->query($sql);

  if (!$result) {
    $error = "Invalid year";
  } else {
  }
}

if ( $_SESSION['classID']) {

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
    header('Location: ../public/office/o_class.php?class=' . $classID . '&error=' . $error);
    exit();
  } else {
    while ($row1 = $result1->fetch_assoc()) {

      $tcrname = $row1['fName'] . " " . $row1['lName'];

      $sql2 = "UPDATE classes SET  teacherIncharge='$tcrname', teacherID='$teacherID', medium='$medium' WHERE classID = '$classID'";
      $result2 = mysqli_query($conn, $sql2);

      if ($result2 == FALSE) {
        $error = "Cannot delete";
        header('Location: ../public/office/o_class.php?class=' . $classID . '&error=' . $error);
      } else {

        header('Location: ../public/office/o_class.php?class=' . $classID);
      }
    }
  }
} else {
}
