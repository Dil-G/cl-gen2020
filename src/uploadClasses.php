<?php
require_once '../config/conn.php';

 if(isset($_POST["Import"])){
    
  $thisGrade =$_POST["grade"];
  $allowed =  array('csv');
  $checkFile=$_FILES["file"]["name"];
    $filename=$_FILES["file"]["tmp_name"];   
    print_r(pathinfo($checkFile,PATHINFO_BASENAME));
    $ext = pathinfo($checkFile, PATHINFO_EXTENSION);
    echo "///EXTENSIOM" . $ext;
    if(!in_array($ext,$allowed) ) {
      // echo "<script type=\"text/javascript\">
      //       alert(\"Upload a CSV file\");
      //       window.location = \"../public/office/o_classes.php?Ggrades='.$thisGrade\"
      //     </script>";
      $error = "Upload a CSV file";
            header('Location: ../public/office/o_classes.php?Ggrades='.$thisGrade.'&error=' . $error);
            exit();
    }

    

    $firstLine = TRUE;
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 1000, ",")) !== FALSE)
           {
            if($firstLine) { $firstLine = false; continue; }
            $retireve = "SELECT * from classStudent WHERE studentID = $getData[1]";
            $resultRetrieve= mysqli_query($conn,$retireve);
        
            
            if($resultRetrieve == TRUE){
             
              //$sql = "UPDATE classStudent SET classID = $getData[0] WHERE studentID = $getData[1]";
              $sql1 = "DELETE FROM classStudent WHERE studentID = $getData[1]" ;
              $result1 = mysqli_query($conn, $sql1);

              if($result1 == FALSE){
                $error = "Cannot delete the file";
                header('Location: ../public/office/o_classes.php?error='.$error);
              }
              }
                $sql = "INSERT into classStudent (classID,studentID) values ('".$getData[0]."','".$getData[1]."')";
                $result = mysqli_query($conn, $sql);
             
        if(!isset($result))
        {
          $error = "Cannot Upload the file";
            header('Location: ../public/office/o_classes.php?error='.$error);
        }
        else {
         header('Location: ../public/office/o_classes.php?Ggrades='.$thisGrade);
        }
           }
      
           fclose($file);  
     }
  }   
 ?>