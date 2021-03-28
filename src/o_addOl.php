<?php
    include_once '../config/conn.php';

    

    if(isset($_POST['savebtn'])){

       
        $examYear = $_POST['olExamYear'];
        $examName = $_POST['examName'];

        $prefix = "GCEOL/";
        $examID = $prefix . $examYear ;

        $prefixName = "G.C.E. O/L Examination - ";
        $examName = $prefixName.$examYear;

        $sql = "INSERT INTO addolexam (examID, examYear, examName) VALUES ('$examID','$examYear','$examName');";

        if($conn->query($sql)===TRUE){
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/office_add_view_OL_exams.php');
        }else{
            echo "Error : " . $sql . "<br>" . $conn->error;
            }
    }
    $conn->close();
?>

