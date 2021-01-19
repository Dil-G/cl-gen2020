<?php
    include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    //echo "Connected Successfully";

    if(isset($_POST['savebtn'])){


        $examYear = $_POST['scholExamYear'];
       
        $prefix = "G5SE/";
        $examID = $prefix . $examYear ;

        $prefixName = "Grade 5 Scholarship Examination - ";
        $examName = $prefixName.$examYear;

        $sql = "INSERT INTO addScholExam (examID, examYear, examName) VALUES ('$examID','$examYear','$examName');";
        
        if($conn->query($sql)===TRUE){
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/o_viewSchol.php');
        }else{
            
            echo "Error : " . $sql . "<br>" . $conn->error;
         }
        
    }
    $conn->close();
?>
