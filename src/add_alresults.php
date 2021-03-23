<?php

require_once '../config/conn.php';

if (isset($_POST["alresults"])) {



    $connect = mysqli_connect("localhost", "root", "", "cl_gen");

    $mark = "M";

    echo "yes";

    //    $userID = $_POST['id'];

    $retrieve = "SELECT * FROM alresults";
    $marks_result =  mysqli_query($connect, $retrieve);

    $c = 0;
    $maxID = 0;

    while ($row = mysqli_fetch_array($marks_result)) {

        $lastId = $row['markID'];
        $charID = substr($lastId, 1);

        $intID = intval($charID);
        echo "kk" . $intID;

        if ($intID > $maxID) {
            echo "bpp ";
            $maxID = $intID;
        }
    }
    echo "max" . $maxID;
    $charID = substr($maxID, 1);


    if ($_FILES['file']['name']) {
        $filename = explode(".", $_FILES['file']['name']);
        if ($filename[1] == 'csv') {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while ($data = fgetcsv($handle)) {
                $MID = "M" . $maxID;
                $item2 = mysqli_real_escape_string($connect, $data[0]);
                $item3 = mysqli_real_escape_string($connect, $data[1]);
                $item4 = mysqli_real_escape_string($connect, $data[2]);
                $item5 = mysqli_real_escape_string($connect, $data[3]);
                $item6 = mysqli_real_escape_string($connect, $data[4]);
                $query = "INSERT into alresults(markID,studentID, subjectID, streamID,grade,examID) 
                values('$MID','$item2','$item3','$item4','$item5','$item6')";
                $import_result = mysqli_query($connect, $query);
                echo "M" . $c;
                if ($import_result) {
                } else {
                    $error = "Error in uploading";
                    header('Location: ../public/office/o_al.php?Ggrades=' . $error);
                }
                $maxID = $maxID + 1;
            }
            fclose($handle);
            //echo "<script>alert('Import done');</script>";
            header('Location: ../public/office/o_al.php');
        }
    }
}
