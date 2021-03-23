    <?php
    include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    echo "Connected Successfully";

    if(isset($_POST['savebtn'])){


        $examYear = $_POST['alExamYear'];
        $examName = $_POST['alExamName'];

        $prefix = "GCEAL/";
        $examID = $prefix . $examYear ;

        $prefixName = "G.C.E. A/L Examination - ";
        $examName = $prefixName.$examYear;

        $sql = "INSERT INTO addAlExam (examID, examYear, examName) VALUES ('$examID','$examYear','$examName');";
        
        if($conn->query($sql)===TRUE){
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/o_viewAl.php');
        }else{
            
            echo "Error : " . $sql . "<br>" . $conn->error;
         }
        
    }
    $conn->close();
?>
