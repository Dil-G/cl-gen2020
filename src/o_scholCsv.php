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
          print_r($data);
      }
      //get each line in $data and  drived the relevent values
      $count=5;
      while ($count < count($data)){
         $last=explode("\r",$data[$count-1]);
         $item1 = mysqli_real_escape_string($conn, $last[1] );
         $item2 = mysqli_real_escape_string($conn, $data[$count+0]);  
         $item3 = mysqli_real_escape_string($conn, $data[$count+1]);
         $item4 = mysqli_real_escape_string($conn, $data[$count+2]);
         $last=explode("\r",$data[$count+3]);
         $item5 = mysqli_real_escape_string($conn, $last[0]);
         
         $sql = "INSERT into schol_rsheet(examID, admissionNo, studentIndex, studentName,examMarks) values('$item1','$item2','" .$item3. "','" . $item4. "',$item5)";
         mysqli_query($conn, $sql);
        
        $count=$count+4;
      }
   
      
    echo "<script>alert('Import done');</script>";
    header('Location: ../public/office/o_viewSchol.php');
    
    }
    
   }
  }

}else{
  $error = "Cannot add the record";
  header('Location: ../public/office/o_viewSchol.php?error='.$error);
}

 
    $conn->close();
?>
