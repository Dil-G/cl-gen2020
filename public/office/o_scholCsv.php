<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d2", $dutyID)) {
	?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Scholarship Results</title>
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    <?php

        
				require_once '../../config/conn.php';

				$sql = "SELECT * FROM addscholexam where examID ='".$_GET['examID']."'";

                $res= mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($res);

				if($res){

				}
				else{
				echo"failed";	
                }
                
                if(isset($_POST["submit"]))
         {
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
             mysqli_query($conn, $query);
            }
            fclose($handle);
            echo "<script>alert('Import done');</script>";
           }
          }
         }
?>
    <div class="content">
        <div class="container" style="margin-left:250px;">
            <form method="POST" enctype="multipart/form-data">
                
                <h1><?php echo $row['examName']?></h1>
                <hr>

                <label for="examID" ><b>Exam ID</b></label>
                <input type="text" value= "<?php echo $row['examID']?>" required>
                
                <label name="scholCsvFile"><b>Enter CSV File</b></label>
                <input type="file" id="myFile" name="scholCsvFile" class="nextpgbtn" required></br>

                <button type="submit" class="registerbtn" name="savebtn">Save</button>
                <a href="o_viewSchol.php" class="cancel-btn">Cancel</a>



                </form>

        </div>

</div>

</body>

</html>

<?php }} ?>
