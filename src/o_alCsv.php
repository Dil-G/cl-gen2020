<?php

use FontLib\Table\Type\head;

include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    //echo "Connected Successfully";

    if(isset($_POST['savebtn'])){

        $examID = $_POST['examID'];
        $examYear = $_POST['alExamYear'];
        $examName = $_POST['alExamName']; 
        $alCsv = $_FILES['fileName']['name'];
        $target = "../images/examResults".basename($alCsv);

        $sql = "INSERT INTO schol_RSheet (examID, examYear, examName, alCsv) VALUES
        ('$examID', '$examYear', '$examName', '$alCsv')";

        if($conn->query($sql)===TRUE){
            if(move_uploaded_file($_FILES['fileName']['temp_name'],$target)){
                $message = "File uploaded successfully";
                header('Location: ../pulic/office/o_alCsv.php?message='.$message);
            }else{
                header('Location: ../public/office/o_alCsv.php');
            }

            header('Location: ../public/office/o_alCsv.php?userID='.$admissionNo);

            }else{
                $error = "Cannot add record";
                header('Location: ../public/office/o_alCsv.php?error='.$error);
            }

    }else{
        $error = "Cannot add the record";
        header('Location: ../public/office/o_alCsv.php?error='.$error);
    }



    $conn->close();
?>
