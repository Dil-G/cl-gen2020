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
      }
      //get each line in $data and  drived the relevent values
      $count=26;
      while ($count < count($data)){
         $last=explode("\r",$data[$count-1]);
         $item0 = mysqli_real_escape_string($conn, $last[1] );
         $item1 = mysqli_real_escape_string($conn, $data[$count+0]);  
         $item2 = mysqli_real_escape_string($conn, $data[$count+1]);
         $item3 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item4 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item5 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item6 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item7 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item8 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item9 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item10 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item11 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item12 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item13 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item14 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item15 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item16 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item17 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item18 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item19 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item20 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item21 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item22 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item23 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item24 = mysqli_real_escape_string($conn, $data[$count+2]);
         $item3 = mysqli_real_escape_string($conn, $data[$count+2]);
         $last=explode("\r",$data[$count+3]);
         $item4 = mysqli_real_escape_string($conn, $last[0]);
         
         $sql = "INSERT into ol_rsheet(examID, admissionNo, studentIndex, studentName,examMarks) values('$item0','$item1','" .$item2. "','" . $item3. "',$item4)";
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
