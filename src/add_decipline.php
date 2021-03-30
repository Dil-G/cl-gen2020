<?php


//require_once('cl_gen.php');

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
if (isset($_POST['regbtn'])){

    $studentAdmission = $_POST['sAd'];
    $decipline= $_POST['dcpl'];
    $description = $_POST['des'];
    
   

    
$sql="UPDATE `decipline` SET `decipline`='$decipline',`description`='$description' WHERE studentID = '$studentAdmission'";
$result=mysqli_query($conn,$sql);

    if ($result) {
       echo '<script language="javascript">';
        echo 'alert("Details Added");';
        //echo 'window.location.href="../driver.php";';
        echo '</script>';
        echo "Succesfully Added Record";
        header('Location: ../public/teacher/Tcr_classDetails.php');

    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();
    
    ?>

    