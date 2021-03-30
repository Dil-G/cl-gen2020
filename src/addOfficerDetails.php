<?php
//require_once('cl_gen.php');
require_once '../config/conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if (isset($_POST['officerReg'])) {

    $userID = $_POST['officerid'];
    $fName = $_POST['fname'];
    $lname = $_POST['lname'];
    $nic = $_POST['nic'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $ContactNo = $_POST['contactNo'];
    $dob = $_POST['dob'];

    if (!isset($_POST['checkbox'])) {
        $error = "Assign atleast one duty";
        header('Location: ../public/office/office_officersList.php?error=' . $error);
        exit();
    }
    $duties = $_POST['checkbox'];
    $count = count($duties);
    echo "There are " . $count . " checkboxe(s) are checked";

    $duty = "";


    $sql = "INSERT INTO office (officerID, fName, lName,  nic, contactNo, address, email, gender,dob) VALUES
    ('$userID', '$fName', '$lname', '$nic', '$ContactNo', '$address', '$email','$gender','$dob')";

    $result1=mysqli_query($conn,$sql);
    if (!$result1) {
        $error = "Error in entering data";
        header('Location: ../public/office/office_officersList.php?error=' . $error);
        exit();
    }

   

    foreach ($duties as $dut) {
        $duty = $dut;
        $sql2 = "INSERT INTO officerduties (officerID, dutyID) VALUES('$userID', '$duty')";
        echo $duty;
        echo $userID;

        $result2=mysqli_query($conn,$sql2);
        if ($result2 == False) {
            $error = "Duty already Assigned";
            header('Location: ../public/office/office_officersList.php?error=' . $error);
            exit();
        }
    }

    $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";

    $update = mysqli_query($conn,$update_query1);

    if (!$result2||!$update||!!$result1) {
        $error = "Cannot Add Users";
        header('Location: ../public/office/office_officersList.php?error=' . $error);
        exit();
    } else {
        header('Location: ../public/office/office_officersList.php');
    }
    /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/
}
$conn->close();
