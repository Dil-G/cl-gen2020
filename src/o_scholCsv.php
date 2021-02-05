<?php

include_once '../config/conn.php';

    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }

    if(isset($_POST['savebtn'])){

        if($_FILES['scholCsvFile']['name'])
        {
         $filename = explode(".", $_FILES['scholCsvFile']['name']);
         if($filename[1] == 'csv')
         {
          $handle = fopen($_FILES['scholCsvFile']['tmp_name'], "r");
          while($data = fgetcsv($handle))
          {
           $item0 = mysqli_real_escape_string($connect, $data[0]);  
           $item1 = mysqli_real_escape_string($connect, $data[1]);
           $item2 = mysqli_real_escape_string($connect, $data[2]);
           $item3 = mysqli_real_escape_string($connect, $data[3]);

           $query = "INSERT into schol_RSheet(examID, admissionNo, studentIndex, studentName) 
              values('$item0','$item1','$item2','$item3')";
          
        
          mysqli_query($connect, $query);
          }
          fclose($handle);
          echo "<script>alert('Import done');</script>";
         }
        }

    }else{
        $error = "Cannot add the record";
        header('Location: ../public/office/o_viewSchol.php?error='.$error);
    }



    //--------------------------
 
    $conn->close();
?>
