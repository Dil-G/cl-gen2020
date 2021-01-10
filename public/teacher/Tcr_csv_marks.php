<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
        }else if($_SESSION['userType'] != 'teacher'){
            header('Location: ../common/error.html');
     }else if(($_SESSION['userType'] == 'teacher') && ($_SESSION['teacherType'] == 'classTcr')){

         $userID = $_SESSION['userID'];
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
        <div id="nav1"></div>

        <div class=content>
            <div class="container">
                <form action="../php/register.php" method="POST">
                    <h3 align="center">Upload the marks File.</h3>

                    <div class="container">

                        <label for="fname"> Subject Name</label>
                        <input type="text" id="SName" name="SubjectName" placeholder="Type the Subject Name.." pattern="[a-zA-Z]+" required>

                        <label for="fname"> Subject ID</label>
                        <input type="text" id="SID" name="SubjectID" placeholder="Type the Subject ID.." required>
                                                                                
						<label for="id"><b>Teacher ID</b></label>
						<input type="text"  id="username" name="id" value = <?php  echo  $_SESSION['userID']?> readonly>


                    <label for="filename">Click on the "Choose File" button to upload a CSV file:</label>
                    <input type="file" placeholder="Add Your File" id="myFile" name="filename" required>
                    </br>
                    </br>
                    </br>
                    <button type="submit" class="registerbtn">SUBMIT</button>
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