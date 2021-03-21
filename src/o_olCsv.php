<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

if(isset($_POST['submit'])){

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
         // print_r($data);
      }
      //get each line in $data and  drived the relevent values
      $count=26;
      while ($count < count($data)){
         $item1 = mysqli_real_escape_string($conn, $data[0]);
         $item2 = mysqli_real_escape_string($conn, $data[1]);  
         $item3 = mysqli_real_escape_string($conn, $data[2]);
         $item4 = mysqli_real_escape_string($conn, $data[3]);
         $item5 = mysqli_real_escape_string($conn, $data[4]);
         $item6 = mysqli_real_escape_string($conn, $data[5]);
         $item7 = mysqli_real_escape_string($conn, $data[6]);
         $item8 = mysqli_real_escape_string($conn, $data[7]);
         $item9 = mysqli_real_escape_string($conn, $data[8]);
         $item10 = mysqli_real_escape_string($conn, $data[9]);
         $item11 = mysqli_real_escape_string($conn, $data[10]);
         $item12 = mysqli_real_escape_string($conn, $data[11]);
         $item13 = mysqli_real_escape_string($conn, $data[12]);
         $item14 = mysqli_real_escape_string($conn, $data[13]);
         $item15 = mysqli_real_escape_string($conn, $data[14]);
         $item16 = mysqli_real_escape_string($conn, $data[15]);
         $item17 = mysqli_real_escape_string($conn, $data[16]);
         $item18 = mysqli_real_escape_string($conn, $data[17]);
         $item19 = mysqli_real_escape_string($conn, $data[18]);
         $item20 = mysqli_real_escape_string($conn, $data[19]);
         $item21 = mysqli_real_escape_string($conn, $data[20]);
         $item22 = mysqli_real_escape_string($conn, $data[21]);
         $item23 = mysqli_real_escape_string($conn, $data[22]);
         $item24 = mysqli_real_escape_string($conn, $data[23]);
         $item25 = mysqli_real_escape_string($conn, $data[24]);
         $item26 = mysqli_real_escape_string($conn, $data[25]);
         
         print_r($item1);
         
         $sql = "INSERT into ol_rsheet(examID, admissionNo, studentIndex, studentName,Buddhism,Saivaneri,Catholicism,Christianity,Islam,Sinhala,Tamil,History,Science,Mathematics,English,BAStudies,SLSinhala,SLTamil,French,Art,Oriental_Music,Western_Music,Oriental_Dancing,ICT,Health_Physical_Edu,Media_Studies)
         values('$item1','$item2','" .$item3. "','" . $item4. "','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12','$item13','$item14','$item15','$item16','$item17','$item18','$item19','$item20','$item21','$item22','$item23','$item24','$item25','$item26')";
         mysqli_query($conn, $sql);
        
         $count=$count+25;
        
        
      }
   
      
    echo "<script>alert('Import done');</script>";
    
    }
    
   }
  }

}else{
  $error = "Cannot add the record";
  header('Location: ../public/office/o_viewSchol.php?error='.$error);
}

 
    $conn->close();
?>
