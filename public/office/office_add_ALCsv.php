<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }
    else if($_SESSION['userType'] != 'officer'){
        header('Location: ../common/error.html');
    }
    else{      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (!in_array("d2", $dutyID)) {
         header('Location: office_dashboard.php');
        }
	?> 

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add G.C.E. A/L Examination Results</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link rel="stylesheet" href="../css/messages.css " type="text/css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="nav"></div>
    <?php

        
require_once '../../config/conn.php';

$sql = "SELECT * FROM addalexam where examID ='".$_GET['examID']."'";

$res= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

if($res){

}
else{
echo"failed";	
}
?>
    </div>
    <div class="content">
        <div class="container">
            <form enctype="multipart/form-data" action="../../src/office_add_alresults.php" method="POST">
                <h1><?php echo $row['examName']?></h1>
                <hr>
                <?php if (isset($_GET['error'])) { ?>
                <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>
                <label for="examID"><b>Exam ID</b></label>
                <input type="text" value= "<?php echo $row['examID']?>" name="examID" readonly>


                <label for="filename"><b>Upload a CSV file </b></label>
                            <input type="file" placeholder="Add Your File" id="myFile" name="file" required>


                <button type="submit" class="registerbtn" name="alresults">Save</button>
                <a href="office_add_view_AL_exams.php" class="cancel-btn">Cancel</a>
                <hr>

            </form>

        </div>

    </div>


</body>

</html>

<?php } ?>