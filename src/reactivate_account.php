<?php 

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if (isset($_GET['userID'])) {

    $userID=$_GET['userID'];
    $sql = "UPDATE user SET  isActivated='1' WHERE userID='$userID'";


    $result = $conn->query($sql);

    if ($result == false){
        $error = "Error in Deactivating";
            header('Location: ../public/admin/student.php?error='.$error);
            exit();
    } else{
            header('Location: ../public/admin/deactivated_userlist.php');
    
    }

}