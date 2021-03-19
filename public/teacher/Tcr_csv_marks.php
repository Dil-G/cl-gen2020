<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
   
      $teacherType = $_SESSION['teacherType'];

     
	

         $connect = mysqli_connect("localhost", "root", "", "cl_gen");
         if(isset($_POST["submit"]))
         {
          if($_FILES['file']['name'])
          {
           $filename = explode(".", $_FILES['file']['name']);
           if($filename[1] == 'csv')
           {
            $handle = fopen($_FILES['file']['tmp_name'], "r");
            while($data = fgetcsv($handle))
            {
             $item1 = mysqli_real_escape_string($connect, $data[0]);  
             $item2 = mysqli_real_escape_string($connect, $data[1]);
             $item3 = mysqli_real_escape_string($connect, $data[2]);
             $item4 = mysqli_real_escape_string($connect, $data[3]);
             $item5 = mysqli_real_escape_string($connect, $data[4]);  
             $item6 = mysqli_real_escape_string($connect, $data[5]);
             $item7 = mysqli_real_escape_string($connect, $data[6]);
             $item8 = mysqli_real_escape_string($connect, $data[7]);
             $item9 = mysqli_real_escape_string($connect, $data[8]);  
             $item10 = mysqli_real_escape_string($connect, $data[9]);
             $item11 = mysqli_real_escape_string($connect, $data[10]);
             $item12 = mysqli_real_escape_string($connect, $data[11]);
             //$item5 = mysqli_real_escape_string($connect, $data[4]);
             $query = "INSERT into marks(teacherID, admissionNumber, studentName, sinhala,english,buddhism,maths,science,history,group01,group02,group03) 
                values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12')";
             mysqli_query($connect, $query);
            }
            fclose($handle);
            echo "<script>alert('Import done');</script>";
           }
          }
         }
?>

<!DOCTYPE html>
<html>

<head>
    <title>CSV Marks</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/register2.css " type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/errors.js"></script>
</head>

<body name=top>

    <body>
        <div id="teacherNav"></div>

        <div class=content>
            <div class="container">
                <form enctype="multipart/form-data" method="POST">
                    <h3 align="center">Upload the marks File.</h3>

                      <div class="container">

                        <!-- <label for="fname"> Subject Name</label>
                        <input type="text" id="SName" name="SubjectName" placeholder="Type the Subject Name.." pattern="[a-zA-Z]+" required> -->

                        <!-- <label for="fname"> Subject ID</label>
                        <input type="text" id="SID" name="SubjectID" placeholder="Type the Subject ID.." required> -->
                                                                                
						<label for="id"><b>Teacher ID</b></label>
						<input type="text"  id="username" name="id" value = <?php  echo  $_SESSION['userID']?> readonly>
                        

                    <label for="filename"><b>Upload a CSV file </b></label>
                    <input type="file" placeholder="Add Your File" id="myFile" name="file" required>
                    </br>
                    </br>
                    </br>
                    <button type="submit" name="submit" class="registerbtn">SUBMIT</button>
                    <hr>
                <h2 align="center" ><a href="Tcr_class.php">Cancel</a></h2>
                </form>
                </div>
            </div>
        </div>
    </body>

</html>

<?php 
	 }
?>