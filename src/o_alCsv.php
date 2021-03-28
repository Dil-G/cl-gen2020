<?php
// Load the database configuration file
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));


if(isset($_POST['submit'])){

    $examID = $_POST['examID'];

    $year = explode("/","['examID']");

        $prefix_maths = "AL/PS/";
        $prefix_bio = "AL/BS/";
        $prefix_commerce = "AL/CS/";
        
        $maths_streamID = $prefix_maths . $year[1] ;
        $bio_streamID = $prefix_bio . $year[1] ;
        $commerce_streamID = $prefix_commerce . $year[1] ;


  if($_FILES['file']['name'])
  {
   $filename = explode(".", $_FILES['file']['name']);
   if($filename[1] == 'csv')
   {
    if($_FILES["file"]["size"] > 0){
      $csvFile = file($_FILES['file']['tmp_name']);

      //security feature - save to a folder
      move_uploaded_file($_FILES['file']['tmp_name'],'../public/tmp/'.$_FILES['file']['name']);
      $data = [];


      //read & store each line in $data
      foreach ($csvFile as $line) {
          $data = str_getcsv($line);
          print_r($data);
      }
      //get each line in $data and  drived the relevent values
      $count=26;
     //print_r($count);

      while ($count < count($data)){

         $item1 = mysqli_real_escape_string($conn, $data[$count+0]);
         $item2 = mysqli_real_escape_string($conn, $data[$count+1]);  
         $item3 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item4 = mysqli_real_escape_string($conn, $data[$count+3]);
         $item5 = mysqli_real_escape_string($conn, $data[$count+4]);
         $item6 = mysqli_real_escape_string($conn, $data[$count+5]);
         $item7 = mysqli_real_escape_string($conn, $data[$count+6]);
         $item8 = mysqli_real_escape_string($conn, $data[$count+7]);
         $item9 = mysqli_real_escape_string($conn, $data[$count+8]);
         $item10 = mysqli_real_escape_string($conn, $data[$count+9]);
         $item11 = mysqli_real_escape_string($conn, $data[$count+10]);
         $item12 = mysqli_real_escape_string($conn, $data[$count+11]);
         $item13 = mysqli_real_escape_string($conn, $data[$count+12]);
         $item14 = mysqli_real_escape_string($conn, $data[$count+13]);
         $item15 = mysqli_real_escape_string($conn, $data[$count+14]);
         $item16 = mysqli_real_escape_string($conn, $data[$count+15]);
         $item17 = mysqli_real_escape_string($conn, $data[$count+16]);
         $item18 = mysqli_real_escape_string($conn, $data[$count+17]);
         $item19 = mysqli_real_escape_string($conn, $data[$count+18]);
         $item20 = mysqli_real_escape_string($conn, $data[$count+19]);
         $item21 = mysqli_real_escape_string($conn, $data[$count+20]);
         $item22 = mysqli_real_escape_string($conn, $data[$count+21]);
         $item23 = mysqli_real_escape_string($conn, $data[$count+22]);
         $item24 = mysqli_real_escape_string($conn, $data[$count+23]);
         $item25 = mysqli_real_escape_string($conn, $data[$count+24]);
         $item26 = mysqli_real_escape_string($conn, $data[$count+25]);
        //print_r($item1);
         
         $sql = "INSERT into ol_rsheet(examID, admissionNo, studentIndex, studentName,Buddhism,Saivaneri,Catholicism,Christianity,Islam,Sinhala,Tamil,History,Science,Mathematics,English,BAStudies,SLSinhala,SLTamil,French,Art,Oriental_Music,Western_Music,Oriental_Dancing,ICT,Health_Physical_Edu,Media_Studies)
         values('$item1','$item2','" .$item3. "','" . $item4. "','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13','$item14','$item15','$item16','$item17','$item18','$item19','$item20','$item21','$item22','$item23','$item24','$item25','$item26')";
         mysqli_query($conn, $sql);
        
         
         $count=$count+25;
        
        //print_r($count);
      }
   
      
    echo "<script>alert('Import done');</script>";
    
    }
    
   }
  }

}else{
  $error = "Cannot add the record";
  header('Location: ../public/office/office_add_view_AL_exams.php?error='.$error);
}

 
    $conn->close();
?>



























<!-- <?php

use FontLib\Table\Type\head;

include_once '../config/conn.php';

    if ($conn->connect_error){
        die("Connection failed : " . $conn->connect_error);
    }
    //echo "Connected Successfully";

    if(isset($_POST['savebtn'])){

        $examID = $_POST['examID'];
        $examYear = $_POST['alExamYear'];
        $examName = $_POST['alExamName']; 
        $mathsCsv = $_FILES['fileName']['name'];
        $bioCsv = $_FILES['fileName']['name'];
        $commerceCsv = $_FILES['fileName']['name'];
        $targetMaths = "../images/examResults".basename($alCsv);
        $targetBio = "../images/examResults".basename($alCsv);
        $targetCommerce = "../images/examResults".basename($alCsv);

        $sql = "INSERT INTO schol_RSheet (examID, examYear, examName, alCsv) VALUES
        ('$examID', '$examYear', '$examName', '$alCsv')";

        if($conn->query($sql)===TRUE){
            if(move_uploaded_file($_FILES['fileName']['temp_name'],$target)){
                $message = "File uploaded successfully";
                header('Location: ../pulic/office/office_add_ALCsv.php?message='.$message);
            }else{
                header('Location: ../public/office/office_add_ALCsv.php');
            }

            header('Location: ../public/office/office_add_ALCsv.php?userID='.$admissionNo);

            }else{
                $error = "Cannot add record";
                header('Location: ../public/office/office_add_ALCsv.php?error='.$error);
            }

    }else{
        $error = "Cannot add the record";
        header('Location: ../public/office/office_add_ALCsv.php?error='.$error);
    }



    $conn->close();
?> -->
