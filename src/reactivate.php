<?php 

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if (isset($_POST['userID'])) {

    $userID=$_POST['userID'];
    $sql = "UPDATE user SET  isActivated='1' WHERE userID='$userID'";


    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Reactivating";
            header('Location: ../public/admin/student.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/deactivated_userlist.php');
    
    }

}

if (isset($_GET['sportID'])) {

    $sportID=$_GET['sportID'];
    $sql = "UPDATE csports SET  activeStatus='1' WHERE SportID='$sportID'";


    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Reactivating";
            header('Location: ../public/admin/deactivated_categories.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/deactivated_categories.php');
    
    }

}

if (isset($_GET['societyID'])) {

    $societyID=$_GET['societyID'];
    $sql = "UPDATE csocieties SET  activeStatus='1' WHERE SocietyID='$societyID'";


    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Reactivating";
            header('Location: ../public/admin/deactivated_categories.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/deactivated_categories.php');
    
    }

}
