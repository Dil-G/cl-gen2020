<?php
session_start();
//require_once('cl_gen.php');
require_once '../config/conn.php';


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

    // if (!isset($_POST['checkbox'])) {
    //     $error = "Assign atleast one duty";
    //     if ($_SESSION['userType'] == 'officer') {
    //         header('Location: ../public/office/o_teachersList.php?error=' . $error . '?userID=' . $userID);
    //         exit();
    //     } elseif ($_SESSION['userType'] == 'admin') {
    //         header('Location: ../public/admin/teachers.php?error=' . $error . '?userID=' . $userID);
    //         exit();
    //     }
    // }
    // $duties = $_POST['checkbox'];
    // $count = count($duties);
    // echo   $count . " checkboxes checked";

    // $duty = "";
    // foreach ($duties as $dut) {
    //     $duty = $dut;
    //     $sql2 = "INSERT INTO teacherType (teacherID, teacherType) VALUES('$userID', '$duty')";
    //     echo $duty;
    //     echo $userID;

    //     $result = $conn->query($sql2);
    //     if ($result == False) {
    //         $error = "Duty already Assigned";
    //         if ($_SESSION['userType'] == 'officer') {
    //             header('Location: ../public/office/o_officersList.php?error=' . $error . '?userID=' . $userID);
    //             exit();
    //         } elseif ($_SESSION['userType'] == 'admin') {
    //             header('Location: ../public/admin/staff.php?error=' . $error . '?userID=' . $userID);
    //             exit();
    //         }
    //     }
    // }

    $sql = "INSERT INTO teacher(teacherID, fName, lName, nic, address,contactNo,email, dob,gender) VALUES ('$userID', '$fName', '$lname', '$nic', '$address', '$contactNo', '$email', '$dob', '$gender')";


    $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";
    

    if ($conn->query($sql) === TRUE &&  $conn->query($update_query1)) {

        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_teachersList.php');
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/admin/admin_teachers.php');
        }
    } else {
        $error = "Cannot add record";
        echo "Error: " . $sql . "<br>" . $conn->error;

        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_teachersList.php?error=' . $error);
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/office/office_teachersList.php?error=' . $error);
        }
    }


    /* else{
        $error="Invalid Email or NIC";
        header('Location: ../public/common/loginFile.php?error='.$error);
    }*/
} else if (isset($_POST['studentReg'])) {

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


    $sql = "INSERT INTO`student`(`admissionNo`, `fName`, `mName`, `lName`, `dob`, `adStreet`, `adCity`, `adDistrict`, `religion`, `enteredDate`, `enteredGrade`, `email`, `contactNo`, `gender`, `stuNic`, `stuPhoto`) VALUES
 ('$admissionNo', '$fName', '$mName', '$lName', '$dob', '$adStreet', '$adCity', '$adDistrict', '$religion', '$enteredDate', '$enteredGrade', '$email', '$contactNo', '$gender', '$nic', '$stuPhoto')";


    $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$admissionNo'";


    if ($conn->query($sql) === TRUE &&  $conn->query($update_query1)) {
        if (move_uploaded_file($_FILES['stuPhoto']['tmp_name'], $target)) {
            $message = "Image uploaded successfully";
            if ($_SESSION['userType'] == 'officer') {
                header('Location: ../public/office/office_addStudentDetails.php?message=' . $message);
            }elseif ($_SESSION['userType'] == 'admin'){
                header('Location: ../public/admin/admin_addStudentDetails.php?message=' . $message);
            }
        } else {
            header('Location: ../public/office/office_addStudentDetails.php');
        }
        echo  $_SESSION['userType'];
        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_addParentDetails.php?parentID=' . $admissionNo);
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/admin/admin_addParentDetails.php?parentID=' . $admissionNo);
        }
    } else {
        $error = "Cannot add record";
        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_addStudentDetails.php?message=' . $error);
        }elseif ($_SESSION['userType'] == 'admin'){
            header('Location: ../public/admin/admin_addStudentDetails.php?message=' . $error);
        }
        
    }


} else if (isset($_POST['parentReg'])) {

    $read = "SELECT * FROM parent where userID='" . $_POST['pID'] . "'";
    $res = mysqli_query($conn, $read);
    if ($res != 0) {
        $error = "Duplicate records";

        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_parentsList.php?error=' . $error);
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/admin/admin_parent.php?error=' . $error);
        }

    } else {

        $admissionNo = $_POST['userID'];

        $pID = $_POST['pID'];
        $pName = $_POST['parentName'];
        $pNIC = $_POST['pNIC'];
        $pOcc = $_POST['occ'];
        $pContact = $_POST['Pcontact'];
        $pEmail = $_POST['pEmail'];

        $sql1 = "INSERT INTO parent (parentID, name,  nic, occupation, contactNo, admissionNo, email) VALUES
     ('$pID', '$pName', '$pNIC', '$pOcc', '$pContact', '$admissionNo', '$pEmail')";

        $update_query2 = "UPDATE user SET isActivated = '1' WHERE userID = '$pID'";

        if ($conn->query($sql1) === TRUE &&  $conn->query($update_query2)) {

            if ($_SESSION['userType'] == 'officer') {
                header('Location: ../public/office/office_parentsList.php');
            } elseif ($_SESSION['userType'] == 'admin') {
                header('Location: ../public/admin/admin_parent.php');
            }
        } else {
            $error = "Cannot add record";

            if ($_SESSION['userType'] == 'officer') {
                header('Location: ../public/office/office_parentsList.php?error=' . $error);
            } elseif ($_SESSION['userType'] == 'admin') {
                header('Location: ../public/admin/admin_parent.php?error=' . $error);
            }
        }
    }

} else if (isset($_POST['officerReg'])) {

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
        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_officersList.php?error=' . $error . '?userID=' . $userID);
            exit();
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/admin/admin_staff.php?error=' . $error . '?userID=' . $userID);
            exit();
        }
    }

    
    $duties = $_POST['checkbox'];
    $count = count($duties);
    echo   $count . " checkboxes checked";

    $duty = "";

    $sql = "INSERT INTO office (officerID, fName, lName,  nic, contactNo, address, email, gender,dob) VALUES
    ('$userID', '$fName', '$lname', '$nic', '$ContactNo', '$address', '$email','$gender','$dob')";

    $reuslt1 = $conn->query($sql);
    if ($reuslt1 == false) {
        $error = "Error in entering data";
        if ($_SESSION['userType'] == 'officer') {
           header('Location: ../public/office/office_officersList.php?error=' . $error . '?userID=' . $userID);
          //  exit();
        } elseif ($_SESSION['userType'] == 'admin') {
           header('Location: ../public/admin/admin_staff.php?error=' . $error . '?userID=' . $userID);
           // exit();
        }
    }

    foreach ($duties as $dut) {
        $duty = $dut;
        $sql2 = "INSERT INTO officerduties (officerID, dutyID) VALUES('$userID', '$duty')";
        echo $duty;
        echo $userID;

        $result = $conn->query($sql2);
        if ($result == False) {
            $error = "Duty already Assigned";
            if ($_SESSION['userType'] == 'officer') {
                header('Location: ../public/office/office_officersList.php?error=' . $error . '?userID=' . $userID);
                exit();
            } elseif ($_SESSION['userType'] == 'admin') {
                header('Location: ../public/admin/admin_staff.php?error=' . $error . '?userID=' . $userID);
                exit();
            }
        }
    }

    $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";


    if ($conn->query($update_query1) == TRUE && $result == TRUE &&  $reuslt1 == TRUE) {

        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_officersList.php');
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/admin/admin_staff.php');
        }
    } else {
        $error = "Cannot add record";

        if ($_SESSION['userType'] == 'officer') {
            header('Location: ../public/office/office_officersList.php?error=' . $error);
        } elseif ($_SESSION['userType'] == 'admin') {
            header('Location: ../public/admin/admin_staff.php?error=' . $error);
        }
    }
}

$conn->close();






// <?php
// //require_once('cl_gen.php');
// require_once '../config/conn.php';


// if (isset($_POST['teacherReg'])) {

//     $userID = $_POST['id'];
//     $fName = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $nic = $_POST['nic'];
//     $dob = $_POST['dob'];
//     $email = $_POST['email'];
//     $gender = $_POST['gender'];
//     $address = $_POST['stuAddress'];
//     $contactNo = $_POST['contactNo'];

//     $checked_arr = $_POST['checkbox'];
//     $count = count($checked_arr);
//     echo "There are " . $count . " checkboxe(s) are checked";

//     if ($count == '2') {
//         $type = "both";
//     } else {
//         foreach ($checked_arr as $checked_arr) {
//             $type = $checked_arr;
//         }
//     }

//     $sql = "INSERT INTO teacher (teacherID, fName, lName,  nic, address,contactNo,email, dob,gender,teacherType) VALUES
//  ('$userID', '$fName', '$lname', '$nic', '$address', '$contactNo', '$email', '$dob', '$gender','$type')";


//     $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";


//     if ($conn->query($sql) === TRUE && $conn->query($update_query1)) {
//         echo '<script language="javascript">';
//         echo 'alert("Details Added");';
//         echo '</script>';
//         header('Location: ../public/office/o_teachersList.php');
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//     /* else{
//         $error="Invalid Email or NIC";
//         header('Location: ../public/common/loginFile.php?error='.$error);
//     }*/
// } else if (isset($_POST['studentReg'])) {

//     $admissionNo = $_POST['stuID'];
//     $fName = $_POST['stufName'];
//     $mName = $_POST['stumName'];
//     $lName = $_POST['stulName'];
//     $dob = $_POST['stuDob'];
//     $adStreet = $_POST['stuAdStreet'];
//     $adCity = $_POST['stuAdCity'];
//     $adDistrict = $_POST['stuAdDistrict'];
//     $religion = $_POST['stuReligion'];
//     $enteredDate = date("Y-m-d");
//     $enteredGrade = $_POST['stuEnteredGrade'];
//     $email = $_POST['email'];
//     $contactNo = $_POST['contactNo'];
//     $gender = $_POST['stuGender'];
//     $nic = $_POST['nic'];
//     $stuPhoto = $_FILES['stuPhoto']['name'];
//     $target = "../images/" . basename($stuPhoto);


//     $sql = "INSERT INTO student (admissionNo, fName, mName, lName, dob, adStreet, adCity, adDistrict, religion, enteredDate, enteredGrade, email, contactNo, gender, stuNic, stuPhoto) VALUES
//  ('$admissionNo', '$fName', '$mName', '$lName', '$dob', '$adStreet', '$adCity', '$adDistrict', '$religion', '$enteredDate', '$enteredGrade', '$email', '$contactNo', '$gender', '$nic', '$stuPhoto')";


//     $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$admissionNo'";


//     if ($conn->query($sql) === TRUE &&  $conn->query($update_query1)) {
//         if (move_uploaded_file($_FILES['stuPhoto']['tmp_name'], $target)) {
//             $message = "Image uploaded successfully";
//             header('Location: ../public/office/o_addStudentDetails.php?message=' . $message);
//         } else {
//             header('Location: ../public/office/o_addStudentDetails.php');
//         }

//         header('Location: ../public/office/o_addParentDetails.php?userID=' . $admissionNo);
//     } else {
//         $error = "Cannot add record";
//         header('Location: ../public/office/o_addStudentDetails.php?error=' . $error);
//     }
//     /* else{
//         $error="Invalid Email or NIC";
//         header('Location: ../public/common/loginFile.php?error='.$error);
//     }*/
// } else if (isset($_POST['parentReg'])) {

//     $read = "SELECT * FROM parent where userID='" . $_POST['pID'] . "'";
//     $res = mysqli_query($conn, $sql);
//     if ($res != 0) {
//         $error = "Duplicate records";
//         header('Location: ../public/office/o_studentsList.php?error=' . $error);
//     } else {

//         $admissionNo = $_POST['userID'];

//         $pID = $_POST['pID'];
//         $pName = $_POST['parentName'];
//         $pNIC = $_POST['pNIC'];
//         $pOcc = $_POST['occ'];
//         $pContact = $_POST['Pcontact'];
//         $pEmail = $_POST['pEmail'];

//         $sql1 = "INSERT INTO parent (parentID, name,  nic, occupation, contactNo, admissionNo, email) VALUES
//      ('$pID', '$pName', '$pNIC', '$pOcc', '$pContact', '$admissionNo', '$pEmail')";

//         $update_query2 = "UPDATE user SET isActivated = '1' WHERE userID = '$pID'";


//         if ($conn->query($sql1) === TRUE && $conn->query($update_query2)) {
//             echo '<script language="javascript">';
//             echo 'alert("Details Added");';
//             echo '</script>';
//             header('Location: ../public/office/o_studentsList.php');
//         } else {
//             $error = "Duplicate Record";
//             header('Location: ../public/office/o_studentsList.php?error=' . $error);
//         }
//     }
//     /* else{
//             $error="Invalid Email or NIC";
//             header('Location: ../public/common/loginFile.php?error='.$error);
//         }*/
// } else if (isset($_POST['officerReg'])) {

//     $userID = $_POST['officerid'];
//     $fName = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $nic = $_POST['nic'];
//     $email = $_POST['email'];
//     $gender = $_POST['gender'];
//     $address = $_POST['address'];
//     $ContactNo = $_POST['contactNo'];
//     $dob = $_POST['dob'];


//     if (!isset($_POST['checkbox'])) {
//         $error = "Assign atleast one duty";
//         header('Location: ../public/admin/officerList.php?error=' . $error . '?userID=' . $userID);
//         exit();
//     }
//     $duties = $_POST['checkbox'];
//     $count = count($duties);
//     echo "There are " . $count . " checkboxe(s) are checked";

//     $duty = "";

//     $sql = "INSERT INTO office (officerID, fName, lName,  nic, contactNo, address, email, gender,dob) VALUES
//     ('$userID', '$fName', '$lname', '$nic', '$ContactNo', '$address', '$email','$gender','$dob')";

//     $reuslt1 = $conn->query($sql);
//     if ($reuslt1 == false) {
//         $error = "Error in entering data";
//         header('Location: ../public/admin/officerList.php?error=' . $error);
//         exit();
//     }

//     foreach ($duties as $dut) {
//         $duty = $dut;
//         $sql2 = "INSERT INTO officerduties (officerID, dutyID) VALUES('$userID', '$duty')";
//         echo $duty;
//         echo $userID;

//         $result = $conn->query($sql2);
//         if ($result == False) {
//             $error = "Duty already Assigned";
//             header('Location: ../public/admin/officerList.php?error=' . $error);
//             exit();
//         }
//     }

//     $update_query1 = "UPDATE user SET isActivated = '1' WHERE userID = '$userID'";

//     if ($conn->query($update_query1) == TRUE && $result == TRUE &&  $reuslt1 == TRUE) {
//         echo '<script language="javascript">';
//         echo 'alert("Details Added");';
//         echo '</script>';
//         header('Location: ../public/admin/officerList.php');
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//     /* else{
//         $error="Invalid Email or NIC";
//         header('Location: ../public/common/loginFile.php?error='.$error);
//     }*/
// }

// $conn->close();
