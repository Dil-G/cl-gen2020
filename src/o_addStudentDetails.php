<?php
//require_once('cl_gen.php');
require_once '../config/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if (isset($_POST['regbtn1'])) {
        
    $admissionNo = $_POST['stuID'];
    $fName = $_POST['stufName'];
    $mName = $_POST['stumName'];
    $lName = $_POST['stulName'];
    $dob = $_POST['stuDob'];
    $adStreet = $_POST['stuAdStreet'];
    $adCity = $_POST['stuAdCity'];
    $adDistrict = $_POST['stuAdDistrict'];
    $religion = $_POST['stuReligion'];
    $enteredDate = date("Y-m-d");
    $enteredGrade = $_POST['stuEnteredGrade'];
    $email = $_POST['email'];
    $contactNo = $_POST['contactNo'];
    $gender = $_POST['stuGender'];
    $nic = $_POST['nic'];
    $stuPhoto = $_FILES['stuPhoto']['name'];
    $target = "../images/" . basename($stuPhoto);


$sql = "INSERT INTO student (admissionNo, fName, mName, lName, dob, adStreet, adCity, adDistrict, religion, enteredDate, enteredGrade, email, contactNo, gender, stuNic, stuPhoto) VALUES
 ('$admissionNo', '$fName', '$mName', '$lName', '$dob', '$adStreet', '$adCity', '$adDistrict', '$religion', '$enteredDate', '$enteredGrade', '$email', '$contactNo', '$gender', '$nic', '$stuPhoto')";


 $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$admissionNo'";
 

if ($conn->query($sql) === TRUE &&  $conn->query($update_query1)){
    if (move_uploaded_file($_FILES['stuPhoto']['tmp_name'], $target)) {
        $message = "Image uploaded successfully";
        header('Location: ../public/office/o_addStudentDetails.php?message='.$message);
    }else{
        header('Location: ../public/office/o_addStudentDetails.php');
    }

    header('Location: ../public/office/o_addParentDetails.php?userID='.$admissionNo);

    }else{
        $error = "Cannot add record";
               header('Location: ../public/office/o_addStudentDetails.php?error='.$error);
   }
   /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/

}else{
    $error = "Cannot add the record";
    header('Location: ../public/office/o_addStudentDetails.php?error='.$error);
}

$conn->close();

?>

