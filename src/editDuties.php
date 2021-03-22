<?php
//require_once('cl_gen.php');
require_once '../config/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if (isset($_POST['regbtn'])) {
        
    $userID = $_POST['officerID'];
    $dutyID = $_POST['dutyID'];

    echo $userID;

    $sql = "DELETE FROM officerduties WHERE officerID ='$userID'" ;

    $result1= mysqli_query($conn,$sql);

    
    if($result1 == FALSE){
   
       header('Location: ../public/admin/duty.php?errorrrrrr');
    }

    $duties = $_POST['checkbox'];
    $count = count($duties);

    $duty = "";  

    foreach ($duties as $dut){ 
        $duty = $dut;
         $sql2 = "INSERT INTO officerduties (officerID, dutyID) VALUES('$userID', '$duty')";  
         echo $duty;
         echo $userID;
 
         $result = $conn->query($sql2);
         if($result == False){
            $error = "Duty already Assigned";
            header('Location: ../public/admin/duty.php?error='.$error);
         }
    }


if ( $result ==TRUE &&  $result1==TRUE){
    echo '<script language="javascript">';
    echo 'alert("Details Added");';
    echo '</script>';
	header('Location: ../public/admin/duty.php');


    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/


}
$conn->close();

?>
