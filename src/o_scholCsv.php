<?php

use FontLib\Table\Type\head;

include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    //echo "Connected Successfully";

    if(isset($_POST['savebtn'])){

        $examID = $_POST['examID'];
        $examYear = $_POST['scholExamYear'];
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



  /* if(isset($_POST['savebtn'])){

        $read= "SELECT * FROM addScholExam where examID='".$_POST['examID']."'";
        $res= mysqli_query($conn,$sql);
        if($res != 0){
            $error = "Duplicate records";
            header('Location: ../public/office/o_viewSchol.php?error='.$error);
        }else{

        $examYear = $_POST['scholExamYear'];
        $examName = $_POST['examName'];

        $prefix = "G5SE/";
        $examID = $prefix . $examYear ;

        $sql = "INSERT INTO addScholExam (examID, examYear, examName) VALUES ('$examID','$examYear','$examName');";
        
        if($conn->query($sql)===TRUE){
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/o_viewSchol.php');
        }else{
            
            echo "Error : " . $sql . "<br>" . $conn->error;
         }
        }
    } */
    $conn->close();
?>
