<?php

require_once '../config/conn.php';


if (isset($_POST["olResults"])) {

    $examID=$_POST["examID"];
    $IDarray = array();

    $count = 0;
    if ($_FILES['file']['name']) {
        $filenames = explode(".", $_FILES['file']['name']);
        if ($filenames[1] == 'csv') {
            $handles = fopen($_FILES['file']['tmp_name'], "r");
            while ($datas = fgetcsv($handles)) {

                $count++;
                
                if ($count == 1) { continue; }
                
                $items2 = mysqli_real_escape_string($conn, $datas[0]);
                $items3 = mysqli_real_escape_string($conn, $datas[1]);
                $items4 = mysqli_real_escape_string($conn, $datas[2]);
                
                
                $MIDs = substr($items2,2) . substr($items3,3);
                
                if(in_array($MIDs,$IDarray))
                {
                    $error = "Duplicate records in CSV file";
                    
                    echo $error;
                    header('Location: ../public/office/office_add_OLCsv.php?examID=' . $examID . '&error=' . $error);
                    exit();
                   
                    
                }else{
                    array_push($IDarray,$MIDs);
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
                print_r($c);
                if ($c == 1) { continue; }

                $item2 = mysqli_real_escape_string($conn, $data[0]);
                $item3 = mysqli_real_escape_string($conn, $data[1]);
                $item4 = mysqli_real_escape_string($conn, $data[2]);
                

                $MID = substr($item2,2) . substr($item3,3);
                $retrieve = "SELECT * FROM ol_results WHERE markID='$MID'";
                $marks_result =  mysqli_query($conn, $retrieve);

                if (mysqli_num_rows($marks_result) > 0) {
                    $query = "UPDATE ol_results SET `grade` = '$item4',`examID` = '$examID' WHERE markID='$MID'";
                }else{
                    $query = "INSERT into ol_results(markID,studentID,subjectID,grade,examID) 
                    
                values('$MID','$item2','$item3','$item4','$examID')";
                }

                $import_result = mysqli_query($conn, $query);
                if ($import_result) {
                } else {
                    $error = "Error in uploading";
                    header('Location: ../public/office/office_viewOL_Results.php?Ggrades=' . $error);
                }
                // $maxID = $maxID + 1;
            }
            fclose($handle);
            echo "<script>alert('Import done');</script>";
            header('Location: ../public/office/office_viewOL_Results.php?examID='.$examID);
        }
    }
}




    // $mark = "M";

    // echo "yes";

    // //    $userID = $_POST['id'];

    // $retrieve = "SELECT * FROM alresults";
    // $marks_result =  mysqli_query($conn, $retrieve);

    // $c = 0;
    // $maxID = 0;

    // while ($row = mysqli_fetch_array($marks_result)) {

    //     $lastId = $row['markID'];
    //     $charID = substr($lastId, 1);

    //     $intID = intval($charID);
    //     echo "kk" . $intID;

    //     if ($intID > $maxID) {
    //         echo "bpp ";
    //         $maxID = $intID;
    //     }
    // }
    // echo "max" . $maxID;
    // $charID = substr($maxID, 1);
