<?php

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$cteacher_sql = "SELECT COUNT(teacherType) FROM teachertype where teacherType='classTeacher'";
$cteacher_result = mysqli_query($conn, $cteacher_sql);
$iteacher_sql = "SELECT COUNT(teacherType) FROM teachertype where teacherType='teacherIncharge'";
$iteacher_result = mysqli_query($conn, $iteacher_sql);

$ctteacher_sql = "SELECT teacher.*,teachertype.* FROM teachertype 
LEFT JOIN teacher ON teacher.teacherID=teachertype.teacherID where teacherType='classTeacher'";
$classTeacher_result = mysqli_query($conn, $ctteacher_sql);
$icteacher_sql = "SELECT teacher.*,teachertype.*,csocieties.*,csports.* FROM teachertype 
LEFT JOIN teacher ON teacher.teacherID=teachertype.teacherID
LEFT JOIN csports ON csports.SportID=teachertype.entityAssigned
LEFT JOIN csocieties ON csocieties.SocietyID=teachertype.entityAssigned where teacherType='teacherIncharge'";
$incharge_result = mysqli_query($conn, $icteacher_sql);

$teachers_sql = "SELECT t1.* FROM teacher t1
LEFT JOIN teachertype t2 ON t2.teacherID = t1.teacherID WHERE t2.teacherID IS NULL";
$teachers_result = mysqli_query($conn, $teachers_sql);

$sports_sql = "SELECT * FROM csports";
$societies_sql = "SELECT * FROM csocieties";
$sports_result = mysqli_query($conn, $sports_sql);
$societies__result = mysqli_query($conn, $societies_sql);

// $sports_sql = "SELECT s1.* FROM csports s1
// LEFT JOIN teachertype t2 ON t2.entityAssigned = t1.SportID WHERE t2.entityAssigned IS NULL";
// $sports_result = mysqli_query($conn, $sports_sql);

// $societies_sql = "SELECT s1.* FROM csocieties s1
// LEFT JOIN teachertype t2 ON t2.entityAssigned = s1.SocietyID WHERE t2.entityAssigned IS NULL";
// $societies__result = mysqli_query($conn, $societies_sql);

if (!$cteacher_result || !$iteacher_result || !$classTeacher_result || !$incharge_result) {
    $error = "Cannot Retrieve Data";
} else {
}

// $year = date('Y');
// $sql_grades = "SELECT * FROM grades WHERE Year='$year'";
// $grades_result = mysqli_query($conn,$sql_grades);




if (isset($_POST['assign_teachers'])) {

    $IDarray = array();

    $count = 0;
    if ($_FILES['file']['name']) {
        $filenames = explode(".", $_FILES['file']['name']);
        if ($filenames[1] == 'csv') {
            $handles = fopen($_FILES['file']['tmp_name'], "r");
            while ($datas = fgetcsv($handles)) {

                $count++;
                if ($count == 1) {
                    continue;
                }

                $items2 = mysqli_real_escape_string($conn, $datas[0]);
                $items3 = mysqli_real_escape_string($conn, $datas[1]);


                $retrieve_teacher = "SELECT * FROM teacher WHERE teacherID='$items2'";
                $teacher_result =  mysqli_query($conn, $retrieve_teacher);

                if (mysqli_num_rows($teacher_result) == 0) {
                    $error = "Invalid Teacher ID " . $items2 . " in the CSV file";
                    echo $error;
                    header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
                    exit();
                }

                $categoryType = substr($item3, 0, 2);
                if ($categoryType == 'SP') {
                    $retrieve_entity = "SELECT * FROM csports WHERE SportID='$items3'";
                } else if ($categoryType == 'SO') {
                    $retrieve_entity = "SELECT * FROM csocieities WHERE SocietyID='$items3'";
                } else {
                    $retrieve_entity = "SELECT * FROM classes WHERE classID='$items3'";
                }
                $entity_result =  mysqli_query($conn, $retrieve_entity);

                if (mysqli_num_rows($teacher_result) == 0) {
                    $error = "Invalid Category ID " . $items3 . " in the CSV file";
                    echo $error;
                    header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
                    exit();
                }


                $retrieve_class = "SELECT * FROM teacherType WHERE teacherID='$items2'";
                $class_result =  mysqli_query($conn, $retrieve_class);
                while ($row = mysqli_fetch_assoc($class_result)) {

                    //chech uploaded file for class ID
                    $categoryUploaded = substr($item3, 4, 1);
                    //check DB for class ID
                    $categoryDB = substr($row['entityAssigned'], 4, 1);
                    //if both matches and are class IDs,
                    if ($categoryDB == $categoryUploaded) {
                        if ($categoryDB == 'G') {
                            $error = "Cannot allocate another class to " . $items2;
                            echo $error;
                            header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
                            exit();
                        }
                    }

                    $retrieve_entity = "SELECT * FROM teacherType WHERE entityAssigned ='$items3'";
                    $entiity_result =  mysqli_query($conn, $retrieve_entity);
                    if (mysqli_num_rows($entiity_result) > 0) {
                        $error = "Teacher Already assigned to entity " . $items3;
                        echo $error;
                        header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
                        exit();
                    }


                    $MIDs = $items3 . substr($items2, 2);

                    if (in_array($MIDs, $IDarray)) {
                        $error = "Duplicate records in CSV file";
                        echo $error;
                        header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
                        exit();
                    } else {
                        array_push($IDarray, $MIDs);
                    }
                }
            }
        }
    }
    fclose($handles);

    $c = 0;
    if ($_FILES['file']['name']) {
        $filename = explode(".", $_FILES['file']['name']);
        if ($filename[1] == 'csv') {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while ($data = fgetcsv($handle)) {

                $c++;
                if ($c == 1) {
                    continue;
                }

                $item2 = mysqli_real_escape_string($conn, $data[0]);
                $item3 = mysqli_real_escape_string($conn, $data[1]);

                $id = $item3 . substr($item2, 2);
                $retrieve = "SELECT * FROM teacherType WHERE id='$id'";
                $marks_result =  mysqli_query($conn, $retrieve);


                $categoryType = substr($item3, 0, 2);
                if ($categoryType == 'SP' || $categoryType == 'SO') {
                    $teacherType = "teacherIncharge";
                } else {
                    $teacherType = "classTeacher";
                }

                $query = "INSERT into teacherType(teacherID,teacherType,entityAssigned,id) 
                values('$item2','$teacherType','$item3','$id')";


                $import_result = mysqli_query($conn, $query);
                if ($import_result) {
                } else {
                    $error = "Error in uploading";
                    header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
                }
                // $maxID = $maxID + 1;
            }
            fclose($handle);
            header('Location: ../public/office/office_assignTeachers.php');
        }
    }
}

if(isset($_GET['delete'])){

    $sql = "DELETE FROM teacherType";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        $error = "Error in Deleting";
        header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
    }else{
        header('Location: ../public/office/office_assignTeachers.php');
    }
}


if(isset($_GET['deleteuser'])){

    $userID = $_GET['deleteuser'];
    $sql = "DELETE FROM teachertype WHERE teacherID='$userID'";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        $error = "Error in Deleting";
        header('Location: ../public/office/office_assignTeachers.php?error=' . $error);
    }else{
        header('Location: ../public/office/office_assignTeachers.php');
    }
}

if(isset($_POST['assign_teacher'])){

    $userID = $_POST['teacherID'];

    if(isset($_POST['classID'])){
        $classID = $_POST['classID'];
        $sql = "SELECT * from teachertype WHERE entityAssigned='$classID'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            $error = "Class already Assigned";
            header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
        }else{
            $id = $classID . substr($userID, 2);
            $update = "INSERT INTO teachertype(teacherID,teacherType,entityAssigned,id) values('$userID','classTeacher','$classID','$id')";
        }

    }else if(isset($_POST['categoryID'])){
        $category = strtoupper($_POST['categoryID']);
        $categoryName = str_replace(' ', '', $category);
        echo $categoryName;
        $sql = "SELECT * from csports WHERE upper(SportName)='$categoryName'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            $row=mysqli_fetch_assoc($result);
            $sportID = $row['SportID'];

            $sql = "SELECT * from teachertype WHERE entityAssigned='$sportID'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                $error = "Sport already Assigned";
                header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
            }else{


                $id = $sportID . substr($userID, 2);
                $update = "INSERT INTO teachertype(teacherID,teacherType,entityAssigned,id) values('$userID','teacherIncharge','$sportID','$id')";
                $result2 = mysqli_query($conn,$update);
                if(!$result2){
                    $error = "Error in Assigning";
                    header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
                }else{
                    header('Location: ../public/office/office_assignTeachers.php');
                }
            }
        }else if(mysqli_num_rows($result) == 0){
            $sql1 = "SELECT * from csocieties WHERE upper(REPLACE(`SocietyName`, ' ', ''))='$categoryName'";
            $result1 = mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1) > 0){
                $row=mysqli_fetch_assoc($result1);
                $societyID = $row['SocietyID'];
                
                $sql = "SELECT * from teachertype WHERE entityAssigned='$societyID'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $error = "Society already Assigned";
                    header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
                }else{


                    $id = $societyID . substr($userID, 2);
                    $update = "INSERT INTO teachertype(teacherID,teacherType,entityAssigned,id) values('$userID','teacherIncharge','$societyID','$id')";
                    $result2 = mysqli_query($conn,$update);
                    if(!$result2){
                        $error = "Error in Assigning";
                        header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
                    }else{
                        header('Location: ../public/office/office_assignTeachers.php');
                    }
                }
            }else if(mysqli_num_rows($result1) == 0){
            $error = "Invalid Category Name";
            header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
        }
        }else{
            $error = "Invalid Category Name";
            header('Location: ../public/office/office_assignNewTeachers.php?error=' . $error);
        }
    }


    
}
