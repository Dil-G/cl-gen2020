<?php

include_once '../config/conn.php';

    if($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    if ( isset($_POST["submit"]) ) {

        if ( isset($_FILES["file"])) {
     
            //if there was an error uploading the file
             if ($_FILES["file"]["error"] > 0) {
                 echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
     
             }
             else {
                 //Print file details
                  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                  echo "Type: " . $_FILES["file"]["type"] . "<br />";
                  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
     
                //if file already exists
                  if (file_exists("upload/" . $_FILES["file"]["name"])) {
                 echo $_FILES["file"]["name"] . " already exists. ";
                  }
                  else {
                //Store file in directory "upload" with the name of "uploaded_file.txt"
                 $storagename = "uploaded_file.txt";
                 move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
                 echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
                 }
             }
          } else 
                $error = "Cannot add the record";
                header('Location: ../public/office/o_viewSchol.php?error='.$error);
                echo "No file selected <br />";
          }
     }



/*

    if(isset($_POST['submit'])){

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

*/

    //--------------------------
 
    $conn->close();
?>
