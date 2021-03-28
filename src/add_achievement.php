<?php
include('../public/teacher/Tcr_achievement.php');

include_once '../config/conn.php';

if (isset($_POST['add_achievement'])) {


    $studentID = $_POST['anumber'];
    $achievementDate = $_POST['aDate'];
    $achievementName = $_POST['aname'];
    $position = $_POST['position'];
    $value = $_POST['Ivalue'];
    $description = $_POST['description'];
    $date = date("Y-m-d h:i:sa");

    $categoryID = $_POST['cID'];

    $initialID = substr($categoryID,0,2);
echo $initialID;
    if($initialID == 'SP'){

        $sql = "SELECT * from sports_achievements";
        $result = mysqli_query($conn, $sql);
        $maxID = 0;
    
        while ($row = mysqli_fetch_array($result)) {
    
            $lastId = $row['achievementID'];
            $charID = substr($lastId, 2);
            $intID = intval($charID);
    
            if ($intID > $maxID) {
                $maxID = $intID;
            }
        }
    
        if (mysqli_num_rows($result) == 0) {
            $date = date("y");
            $prefix = "AC";
            $achievementID = $prefix . $date . "00001";
        } else {
    
            if (substr($maxID, 0, 2) != date("y")) {
                $date = date("y");
                $prefix = "AC";
                $achievementID = $prefix . $date . "00001";
            } else {
                $prefix = "AC";
                $achievementID = $prefix . ($maxID + 1);
            }
        }

        
        $sql = "INSERT INTO sports_achievements(achievementID,categoryID,studentID,achievementDate,achievementName,position,impValue,description,date_Time) VALUES
 ('$achievementID','$categoryID','$studentID', '$achievementDate','$achievementName','$position', '$value','$description','$date')";

    }else{

        $sql = "SELECT * from societies_achievements";
        $result = mysqli_query($conn, $sql);
        $maxID = 0;
    
        while ($row = mysqli_fetch_array($result)) {
    
            $lastId = $row['achievementID'];
            $charID = substr($lastId, 2);
            $intID = intval($charID);
    
            if ($intID > $maxID) {
                $maxID = $intID;
            }
        }
    
        if (mysqli_num_rows($result) == 0) {
            $date = date("y");
            $prefix = "AC";
            $achievementID = $prefix . $date . "00001";
        } else {
    
            if (substr($maxID, 0, 2) != date("y")) {
                $date = date("y");
                $prefix = "AC";
                $achievementID = $prefix . $date . "00001";
            } else {
                $prefix = "AC";
                $achievementID = $prefix . ($maxID + 1);
            }
        }


        $sql = "INSERT INTO societies_achievements(achievementID,categoryID,studentID,achievementDate,achievementName,position,impValue,description,date_Time) VALUES
 ('$achievementID','$categoryID','$studentID', '$achievementDate','$achievementName','$position', '$value','$description','$date')";


    }



    $result = mysqli_query($conn, $sql);
  
        if ( $result == TRUE ) {
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/teacher/Tcr_ach.php');
        } else {
            $error = "Error in Inserting Data ";
            header('Location:../public/teacher/Tcr_ach.php?error=' . $error);
            exit();     
           }


    
}

$conn->close();
