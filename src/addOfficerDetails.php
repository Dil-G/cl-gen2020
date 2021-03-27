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
    }
    $duties = $_POST['checkbox'];
    $count = count($duties);
    echo "There are " . $count . " checkboxe(s) are checked";

    $duty = "";


    $sql = "INSERT INTO office (officerID, fName, lName,  nic, contactNo, address, email, gender,dob) VALUES
    ('$userID', '$fName', '$lname', '$nic', '$ContactNo', '$address', '$email','$gender','$dob')";

    $reuslt1 = $conn->query($sql);
    if ($reuslt1 == false) {
        $error = "Error in entering data";
        header('Location: ../public/office/office_officersList.php?error=' . $error);
        exit();
    }

    foreach ($duties as $dut) {
        $duty = $dut;
        $sql2 = "INSERT INTO officerduties (officerID, dutyID) VALUES('$userID', '$duty')";
        echo $duty;
        echo $userID;

        $result = $conn->query($sql2);
        if ($result == False) {
            $error = "Duty already Assigned";
            header('Location: ../public/office/office_officersList.php?error=' . $error);
            exit();
        }
    }

    $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";

    if ($conn->query($update_query1) == TRUE && $result == TRUE &&  $reuslt1 == TRUE) {
        echo '<script language="javascript">';
        echo 'alert("Details Added");';
        echo '</script>';
        header('Location: ../public/office/office_officersList.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/
}
$conn->close();
