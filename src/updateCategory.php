<?php

require_once '../config/conn.php';

if (isset($_POST['updateSociety'])){

        $SocietyID = $_POST['societyID'];
        $SocietyName = $_POST['societyname'];
        $TID = $_POST['TID'];

    
        $sql = "UPDATE csocieties SET SocietyName = '$SocietyName', tcrID = '$TID' WHERE SocietyID = '$SocietyID'";
       

            if ($conn->query($sql) == TRUE) {
               header('Location: ../public/admin/admin_societies.php');
            } else {
            header('Location: ../public/admin/admin_societies.php?error');
            }
}  

if (isset($_POST['updateSport'])){

    $sportID = $_POST['sportID'];
    $SportName = $_POST['Sname'];
    $TID = $_POST['TID'];


    $sql = "UPDATE csports SET SportName = '$SportName', tcrID = '$TID' WHERE SportID = '$sportID'";
   

        if ($conn->query($sql) == TRUE) {
           header('Location: ../public/admin/admin_sports.php');
        } else {
        header('Location: ../public/admin/admin_sports.php?error');
        }
}  

$conn->close();


?>