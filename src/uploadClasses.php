<?php
 require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

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

  if(isset($_GET['class'])){

    $thisClass = $_GET['class'];
  $sql = "SELECT * FROM classes WHERE classID = '$thisClass'"; 
  $result = $conn->query($sql);
  
  if(!$result  ){
      $error="Invalid year";
  }
  
  else{
          
  }


  }




  if(isset($_POST['uploadClass'])){

    
    $teacherID = $_POST['teacherID'];
    $medium = $_POST['medium'];
    $classID = $_POST['classID'];

   
    $sql1 = "SELECT * FROM teacher WHERE teacherID = '$teacherID'"; 
    $result1 = mysqli_query($conn, $sql1);
  

    if($result1 == FALSE){
     
      $error="Incorrect Teacher ID";
      header('Location: ../public/office/o_class.php?class='.$classID.'&error=' . $error);
      exit();
  }else{
    while($row1= $result1->fetch_assoc()) {
      
      $tcrname = $row1['fName']." ".$row1['lName'] ;

      $sql2 = "UPDATE classes SET  teacherIncharge='$tcrname', teacherID='$teacherID', medium='$medium' WHERE classID = '$classID'" ;
        $result2 = mysqli_query($conn, $sql2);

        if($result2 == FALSE){
          $error = "Cannot delete";
          header('Location: ../public/office/o_class.php?class='.$classID.'&error=' . $error);
        }else{
          
         header('Location: ../public/office/o_class.php?class='.$classID);
        }
     }
    }
}else{}
  


  
 ?>