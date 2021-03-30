<?php 

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if (isset($_POST['userID']) && ($_POST['userType'])) {

    $userID=$_POST['userID'];
    $userType=$_POST['userType'];

    if($userType == 'student'){
        $parentID = 'PR'. substr($userID,2);
        $sql = "UPDATE user SET  isActivated='1' WHERE userID='$userID'";
        $sql1 = "UPDATE user SET  isActivated='1' WHERE userID='$parentID'";
        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$sql1);

        if ($result == false || $result1 == false){
            $error = "Error in Reactivating";
                header('Location: ../public/admin/admin_deactivatedUserlist.php?error='.$error);
                exit();
        } else{
                header('Location: ../public/admin/admin_deactivatedUserlist.php');
        
        }

    }else if($userType == 'parent'){
        $studentID = 'ST'. substr($userID,2);
        $sql = "UPDATE user SET  isActivated='1' WHERE userID='$userID'";
        $sql1 = "UPDATE user SET  isActivated='1' WHERE userID='$studentID'";
        $result = mysqli_query($conn,$sql);
        $result1 = mysqli_query($conn,$sql1);

        if ($result == false || $result1 == false){
            $error = "Error in Reactivating";
                header('Location: ../public/admin/admin_deactivatedUserlist.php?error='.$error);
                exit();
        } else{
                header('Location: ../public/admin/admin_deactivatedUserlist.php');
        
        }

    }else{
        $sql = "UPDATE user SET  isActivated='1' WHERE userID='$userID'";
        $result = mysqli_query($conn,$sql);

        if ($result == false){
            $error = "Error in Reactivating";
                header('Location: ../public/admin/admin_deactivatedUserlist.php?error='.$error);
                exit();
        } else{
                header('Location: ../public/admin/admin_deactivatedUserlist.php');
        
        }
    }


    

}


if (isset($_GET['sportID'])) {

    $sportID=$_GET['sportID'];
    $sql = "UPDATE csports SET  activeStatus='1' WHERE SportID='$sportID'";


    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Reactivating";
            header('Location: ../public/admin/admin_deactivatedCategories.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/admin_deactivatedCategories.php');
    
    }

}

if (isset($_GET['societyID'])) {

    $societyID=$_GET['societyID'];
    $sql = "UPDATE csocieties SET  activeStatus='1' WHERE SocietyID='$societyID'";


    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Reactivating";
            header('Location: ../public/admin/admin_deactivatedCategories.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/admin_deactivatedCategories.php');
    
    }

}
