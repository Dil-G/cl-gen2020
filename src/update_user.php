<?php
//require_once('cl_gen.php');
require_once '../config/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

if (isset($_POST['update_student'])) {
        echo ("ss");
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

    $sql = "UPDATE student
     SET  fName='$fName', mName='$mName', lName='$lName', dob='$dob', adStreet='$adStreet', adCity='$adCity', adDistrict='$adDistrict', religion='$religion', enteredGrade='$enteredGrade', email='$email', contactNo='$contactNo', gender='$gender', stuNic='$nic', stuPhoto='$stuPhoto'
       WHERE admissionNo='$admissionNo'";


 

if ($conn->query($sql) === TRUE){
    if (move_uploaded_file($_FILES['stuPhoto']['tmp_name'], $target)) {
        $message = "Image uploaded successfully";
        // header('Location: ../public/office/update_student.php?message='.$message);
    }else{
        echo "nso";
        // header('Location: ../public/office/update_student.php');
    }
echo "no";
    // header('Location: ../public/office/o_addParentDetails.php?userID='.$admissionNo);

    }else{
        $error = "Cannot add record";
        echo "nxo";
            //    header('Location: ../public/office/update_student.php?error='.$error);
   }
   /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/

}else{
    $error = "Cannot add the record";
    // header('Location: ../public/office/o_addStudentDetails.php?error='.$error);
}




if (isset($_POST['update_officer'])) {
    echo ("ss");


    $officerid = $_POST['officerid'];
    $fName = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $dob = $_POST['dob'];


    $sql = "UPDATE office
     SET  fName='$fName', lName='$lname', dob='$dob', address='$address', email='$email', contactNo='$contactNo', gender='$gender', nic='$nic'
       WHERE officerid='$officerid'";

    $reuslt1 = $conn->query($sql);
    if ($reuslt1 == false){
        $error = "Error in entering data";
        header('Location: ../public/office/o_officersList.php?error='.$error);
        exit();
    }
else{
    header('Location: ../public/office/o_officersList.php');
    }
   /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/

}
$conn->close();

?>

