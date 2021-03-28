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
        $pass_mark = $_POST['pass-mark'];

        $sql = "INSERT INTO addScholExam (examID, examYear, examName,pass_mark) VALUES ('$examID','$examYear','$examName',$pass_mark);";
        
        if($conn->query($sql)===TRUE){
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/office_add_view_scholarship_exams.php');
        }else{
            
            echo "Error : " . $sql . "<br>" . $conn->error;
         }
        
    }
    $conn->close();
?>
