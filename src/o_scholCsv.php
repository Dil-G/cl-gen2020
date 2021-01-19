<?php

use FontLib\Table\Type\head;

include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    //echo "Connected Successfully";

    if(isset($_POST['savebtn'])){

        $examID = $_POST['scholExamID'];
        $examYear = $_POST['examYear'];
        $examName = $_POST['examName']; 
        $scholCsv = $_FILES['fileName']['name'];
        $target = "../images/examResults".basename($scholCsv);

        $sql = "INSERT INTO schol_RSheet (examID, examYear, examName, scholCsv) VALUES
        ('$examID', '$examYear', '$examName', '$scholCsv')";

        if($conn->query($sql)===TRUE){
            if(move_uploaded_file($_FILES['fileName']['temp_name'],$target)){
                $message = "File uploaded successfully";
                header('Location: ../pulic/office/o_scholCsv.php?message='.$message);
            }else{
                header('Location: ../public/office/o_scholCsv.php');
            }

            header('Location: ../public/office/o_scholCsv.php?userID='.$admissionNo);

            }else{
                $error = "Cannot add record";
                header('Location: ../public/office/o_scholCsv.php?error='.$error);
            }

    }else{
        $error = "Cannot add the record";
        header('Location: ../public/office/o_scholCsv.php?error='.$error);
    }



    //--------------------------
 
    $conn->close();
?>
