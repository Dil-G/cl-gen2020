<?php
//require_once('cl_gen.php');
require_once '../config/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if (isset($_POST['teacherReg'])) {
        
    $userID = $_POST['id'];
    $fName = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['stuAddress'];
    $contactNo = $_POST['contactNo'];

    $checked_arr = $_POST['checkbox'];
    $count = count($checked_arr);
    echo "There are ".$count." checkboxe(s) are checked";

    if($count == '2'){
        $type="both";
    }else{
        foreach ($checked_arr as $checked_arr){ 
            $type = $checked_arr;
        }
    }
    
$sql = "INSERT INTO teacher (teacherID, fName, lName,  nic, address,contactNo,email, dob,gender,teacherType) VALUES
 ('$userID', '$fName', '$lname', '$nic', '$address', '$contactNo', '$email', '$dob', '$gender','$type')";


 $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";
 

if ($conn->query($sql) === TRUE && $conn->query($update_query1) ) {
    echo '<script language="javascript">';
    echo 'alert("Details Added");';
    echo '</script>';
	header('Location: ../public/office/office_teachersList.php');


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

