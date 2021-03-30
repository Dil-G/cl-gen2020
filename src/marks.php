<?php

require_once '../config/conn.php';



if (isset($_POST["upload_marks"])) {

    $teacherID = $_POST["teacherID"];
    $classID = $_POST["classID"];
    $term = $_POST["term"];

    $allowed =  array('csv');
    $checkFile = $_FILES["file"]["name"];
    $ext = pathinfo($checkFile, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {

        $error = "Upload a CSV file";
        header('Location: ../public/office/o_classes.php?Ggrades=' . $thisGrade . '&error=' . $error);
        exit();
    } else {
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

                    $c = 0;
                    $items2 = mysqli_real_escape_string($conn, $datas[0]);
                    $items3 = mysqli_real_escape_string($conn, $datas[1]);
                    $items4 = mysqli_real_escape_string($conn, $datas[2]);

                    $retrieve_class = "SELECT * FROM classstudent WHERE studentID='$items2'";
                    $class_result =  mysqli_query($conn, $retrieve_class);

                    if (mysqli_num_rows($class_result) == 0) {
                        $error = "Student " . $items2 . " not assigned to the class ";
                        echo $error;
                        header('Location: ../public/teacher/Tcr_class.php?error=' . $error);
                        exit();
                    } else {
                        while ($row = mysqli_fetch_assoc($class_result)) {
                            if ($row['classID'] == $classID) {
                                $c=$c + 1;
                            }else{
                                continue;
                            }
                        }
                    }
                    if ($c == 0) {
                        $error = "Student " . $items2 . " not assigned to the class ";
                        echo $error;
                        header('Location: ../public/teacher/Tcr_class.php?error=' . $error);
                        exit();
                    }

                    $MIDs = "T" . $term . substr($items2, 2) . substr($items3, 1);
                    echo $MIDs . " / ";

                    if (in_array($MIDs, $IDarray)) {
                        $error = "Duplicate records in CSV file";
                        echo $error;
                        header('Location: ../public/teacher/Tcr_class.php?examID=' . $examID . '&error=' . $error);
                        exit();
                    } else {
                        array_push($IDarray, $MIDs);
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

                    $data2 = mysqli_real_escape_string($conn, $data[0]);
                    $data3 = mysqli_real_escape_string($conn, $data[1]);
                    $data4 = mysqli_real_escape_string($conn, $data[2]);

                    // echo "ID- ".$data2."whaat... ";
                    $MID = "T" . $term . substr($data2, 2) . substr($data3, 1);
                    // echo $MID." /-";
                    $retrieve = "SELECT * FROM marks WHERE markID='$MID'";
                    $marks_result =  mysqli_query($conn, $retrieve);

                    if (mysqli_num_rows($marks_result) > 0) {
                        $query = "UPDATE marks SET `mark` = '$data4' WHERE markID='$MID'";
                    } else {

                        $sql = "INSERT into marks(markID,teacherID,admissionNumber,subjectID,mark,classID,term) values('$MID','$teacherID','$data2','$data3','$data4','$classID','$term')";
                        $import_result = mysqli_query($conn, $sql);
                    }

                    if ($import_result) {
                        echo "2";
                    } else {
                        $error = "Error in uploading";
                        header('Location: ../public/teacher/Tcr_class.php?error=' . $error);
                    }
                    // $maxID = $maxID + 1;
                }
                fclose($handle);
                header('Location: ../public/teacher/Tcr_class.php');
            }
        }
    }
}
