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
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div id="officeNav"></div>
    <?php

        
require_once '../../config/conn.php';

$sql = "SELECT * FROM addolexam where examID ='".$_GET['examID']."'";

$res= mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);

if($res){

}
else{
echo"failed";	
}
?>
    <div class="content">
    <div class="container" style="margin-left:250px;">
            <form action="../php/register.php" method="POST">
                <h1><?php echo $row['examName']?></h1>
                <hr>

                <label for="examID"><b>Exam ID</b></label>
                <input type="text" id="username" name="id" value="<?php echo $row['examID']?>" name="examID" readonly>

                <label for="myFile"><b>Enter CSV File</b></label>
                <input type="file" id="myFile" name="filename" class="nextpgbtn" required></br>


                    <button type="submit" class="registerbtn">Save</button>
                <a href="o_viewOl.php" class="cancel-btn">Cancel</a>
                </form>

        </div>

    </div>


</body>

</html>

<?php }} ?>