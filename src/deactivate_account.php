<?php 

require_once '../config/conn.php';

//Deactivate student and parent account
if (isset($_GET['studentID'])) {

    $userID=$_GET['studentID'];
    $sql = "UPDATE user SET  isActivated='2' WHERE userID='$userID'";

    $intID = substr($userID,2);
    $parentID = 'PR'.$intID;
    echo $parentID;
    $sql2 = "UPDATE user SET  isActivated='2' WHERE userID='$parentID'";

    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);

    if ($result == false|| $result2 == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/student.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/student.php');
    
    }

}


//Deactivate Officer account
if (isset($_GET['officerID'])) {

    $userID=$_GET['officerID'];
    $sql = "UPDATE user SET  isActivated='2' WHERE userID='$userID'";
    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/staff.php?error='.$error);
            exit();
    }
    else{
            header('Location: ../public/admin/staff.php');
    
    }

}


//Deactivate Teacher account
if (isset($_GET['teacherID'])) {

    $userID=$_GET['teacherID'];
    $sql = "UPDATE user SET  isActivated='2' WHERE userID='$userID'";
    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/teachers.php?error='.$error);
            exit();
        }
    
    else{
            header('Location: ../public/admin/teachers.php');
    
    }

}

?>