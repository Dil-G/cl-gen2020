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

    $result = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql2);

    
    if ($result == false|| $result2 == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/admin_student.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/admin_student.php');
    
    }

}



//Deactivate Officer account
if (isset($_GET['officerID'])) {

    $userID=$_GET['officerID'];
    $sql = "UPDATE user SET  isActivated='2' WHERE userID='$userID'";
    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/admin_staff.php?error='.$error);
            exit();
    }
    else{
            header('Location: ../public/admin/admin_staff.php');
    
    }

}


//Deactivate Teacher account
if (isset($_GET['teacherID'])) {

    $userID=$_GET['teacherID'];
    $sql = "UPDATE user SET  isActivated='2' WHERE userID='$userID'";
    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/admin_teachers.php?error='.$error);
            exit();
        }
    
    else{
            header('Location: ../public/admin/admin_teachers.php');
    
    }

}

if (isset($_GET['sportID'])) {

    $sportID=$_GET['sportID'];
    $sql = "UPDATE csports SET  activeStatus='0' WHERE SportID='$sportID'";
    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/admin_sports.php?error='.$error);
            exit();
        }
    else{
            header('Location: ../public/admin/admin_sports.php');
    
    }

}

if (isset($_GET['societyID'])) {

    $societyID=$_GET['societyID'];
    $sql = "UPDATE csocieties SET  activeStatus='0' WHERE SocietyID='$societyID'";
    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/admin_societies.php?error='.$error);
            exit();
        }
    
    else{
            header('Location: ../public/admin/admin_societies.php');
    
    }

}

?>