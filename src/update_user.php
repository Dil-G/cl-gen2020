<?php
session_start();
//require_once('cl_gen.php');
require_once '../config/conn.php';


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
        if($_SESSION['userType'] == 'officer'){
            header('Location: ../public/office/update_student.php?message='.$message);
        }else{
            header('Location: ../public/admin/updateStudent.php?message='.$message);
        }
    }else{
        echo "nso";
        if($_SESSION['userType'] == 'officer'){
            
            header('Location: ../public/office/o_studentsList.php');
        }else{
            header('Location: ../public/admin/student.php');
        }
    }
    if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_studentsList.php');
    }else{
        header('Location: ../public/admin/student.php');
    }

    }else{
        $error = "Cannot add record";
        echo "nxo";
        if($_SESSION['userType'] == 'officer'){
               header('Location: ../public/office/o_studentsList.php?error='.$error);
        }else{
            header('Location: ../public/admin/student.php?error='.$error);
        }
   }

}else{
    $error = "Cannot add the record";
    if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_studentsList.php?error='.$error);
    }else{
        header('Location: ../public/admin/student.php?error='.$error);
    }
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
        if($_SESSION['userType'] == 'officer'){
            header('Location: ../public/office/o_officersList.php?error='.$error);
            exit();
        }else{
            header('Location: ../public/admin/staff.php?error='.$error);
            exit();
        }
    }
else{
    if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_officersList.php');
    }else{
        header('Location: ../public/admin/staff.php');

    }
    }
 
}




if (isset($_POST['update_teacher'])) {
    // echo ("ss");

    $teacherID = $_POST['id'];
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
    

    $sql = "UPDATE teacher
    SET  fName='$fName', lName='$lname', dob='$dob', address='$address', email='$email', contactNo='$contactNo', gender='$gender', nic='$nic',teacherType='$type'
      WHERE teacherID='$teacherID'";
 

 $result = $conn->query($sql);
 if ($result == false){
     $error = "Error in entering data";
     if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_teachersList.php?error='.$error);
        exit();
     }else{
        header('Location: ../public/admin/teachers.php?error='.$error);
        exit();
     }
 }
else{
    if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_teachersList.php');
    }else{
        header('Location: ../public/admin/teachers.php');

    }
 }


}

if (isset($_POST['update_parent'])) {
   


$admissionNo = $_POST['userID'];

$parentID = $_POST['pID'];
$pName = $_POST['parentName'];
$pNIC = $_POST['pNIC'];
$pOcc = $_POST['occ'];
$pContact = $_POST['Pcontact'];
$pEmail = $_POST['pEmail'];

 $sql = "UPDATE parent
    SET  name='$pName', email='$pEmail', contactNo='$pContact', occupation='$pOcc', nic='$pNIC'
      WHERE parentID='$parentID'";




$result = $conn->query($sql);
if ($result == false){
    $error = "Error in entering data";
    if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_parentsList.php?error='.$error);
        exit();
    }else{
        header('Location: ../public/admin/parent.php?error='.$error);
        exit();
    }
}
else{
    if($_SESSION['userType'] == 'officer'){
        header('Location: ../public/office/o_parentsList.php');
    }else{
        header('Location: ../public/admin/parent.php');

    }
}


}
$conn->close();

?>

