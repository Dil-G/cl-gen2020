<?php
session_start();
require_once '../config/conn.php';

if (isset($_POST['add_request'])) {


    $id = $_POST['id'];
    $request = $_POST['request'];

    $countfiles = count($_FILES['image']['name']);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        if ($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png' && $ext !== 'gif' && $ext !== 'pdf') {
            $error = "Invalid File type ";
            echo $error;
            header('Location: ../public/student/newsfeed.php?error=' . $error);
            exit();
        }
    }

    $prefix = "R";
    $retreive = "SELECT * FROM request";
    $result = mysqli_query($conn, $retreive);

    $maxID = 0;

    while ($row = mysqli_fetch_array($result)) {

        $lastId = $row['requestID'];
        $charID = substr($lastId, 1);
        $intID = intval($charID);

        if ($intID > $maxID) {
            $maxID = $intID;
        }
    }
    if (mysqli_num_rows($result) == 0) {
        $requestID = $prefix .  "1";
    } else {
        $requestID = $prefix . ($maxID + 1);
    }

    $date = date('Y-m-d');
    $time = date('H:i:s');

    $type = $_SESSION['userType'];
    $status = 0;

    $sql = "INSERT INTO request(requestID,userID,request,requestDate,requestTime,requestStatus)VALUES ('$requestID','$id','$request','$date','$time','$status')";
    $result =mysqli_query($conn,$sql);

    for ($i = 0; $i < $countfiles; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageType = $_FILES['image']['type'][$i];
        $tmp=$_FILES['image']['tmp_name'][$i];
        $ext = pathinfo($imageName, PATHINFO_EXTENSION);

        $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name'][$i]));
        
        $sql1 = "INSERT INTO proofs (requestID,fileNames,fileType,fileData) VALUES ('$requestID','$imageName','$imageType','$imageData');";
        $result1 =mysqli_query($conn,$sql1);
    }

    $error = "Request not added.";
    if (!$result && !$result1) {
        if ($type == 'student') {
            echo $error;
                header('Location: ../public/student/editRequest.php?error=' . $error);
        } else if ($type == 'teacher') {
                header('Location: ../public/teacher/request1.php?error=' . $error);
        } else if ($type == 'parent') {
                header('Location: ../public/parent/editRequest.php?error=' . $error);
        }

    } else if ($type == 'student') {
        header('Location: ../public/student/newsfeed.php');
    } else if ($type == 'teacher') {
        header('Location: ../public/teacher/newsfeed.php');
    } else if ($type == 'parent') {
        header('Location: ../public/parent/newsfeed.php');
    }
}

$conn->close();
