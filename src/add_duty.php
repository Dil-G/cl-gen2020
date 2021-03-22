<?php
//require_once('cl_gen.php');
require_once '../config/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if (isset($_POST['regbtn'])) {
        
    $dutyID = $_POST['dutyID'];
    $duty = $_POST['duty'];

$sql = "INSERT INTO duty (dutyID, duty) VALUES('$dutyID', '$duty')";
 

if ($conn->query($sql) === TRUE) {
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

