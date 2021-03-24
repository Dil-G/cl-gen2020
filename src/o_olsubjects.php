<?php
    include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    //echo "Connected Successfully";

    if(isset($_POST['savebtn'])){


        $subName = $_POST['subject-name'];
        $catName = $_POST['subject-cat'];

        $sql = "SELECT * FROM ol_subjects ";
        $result = mysqli_query($conn, $sql);
        $maxID=0;

       

        if (mysqli_num_rows($result) == 0) {
            $prefix = "SOL";
            $subID = $prefix .  "1";
        } else {

            while($row = mysqli_fetch_array($result)){
                $lastID = $row['SubjectID'];
                $charID = substr($lastID, 3);
                $intID = intval($charID);
    
                if ($intID > $maxID) {
                    $maxID = $intID;
                }
            }

            $prefix = "SOL";
            $subID = $prefix . ($maxID + 1);
        }

        $sql = "INSERT INTO ol_subjects (SubjectID, SubName,CatName) VALUES ('$subID','$subName','$catName');";

        
        if($conn->query($sql)===TRUE){
            echo '<script language = "javascript">';
            echo 'alert("Details Added");';
            header('Location: ../public/office/o_olsubjects.php');
        }else{
            
            echo "Error : " . $sql . "<br>" . $conn->error;
         }
        
    }
    $conn->close();
?>
