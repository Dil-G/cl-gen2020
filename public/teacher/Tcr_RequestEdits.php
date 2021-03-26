<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
      $teacherType = array();
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['userID'];



     
	?>


<!DOCTYPE html>
<html>

<head>
    <title>Request Edits 1</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/register2.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div id="teacherNav"></div>



        <div class="container">

           

            <form action="../../src/request1.php" method="POST" enctype="multipart/form-data" >
                <hr>


            
                <h1 style="color:#6a7480;">Request Edit Form</h1>

                    <label for="id">ID Number</label>
                    <input type="text"  name="id" value = <?php  echo  $_SESSION['userID']?> readonly>

                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Type the name here" pattern="['a-z''A-Z' ]+$" required>

                    <label for="request"><b>Request</b></label>
                    <textarea id="request" name="request" rows="4" placeholder="News" cols="50" required></textarea>
                
                    
                    <label for="image"><b>Upload a proof</b></label>
          <input type="hidden" name="size" value="1000000" required>

          <div>
            <input type="file" name="image" id="image" required />
          </div>
          <br>
                
                <button type="submit" class="registerbtn" id="add_news" name="add_request">Submit</button>
                 <a href="Tcr_dashboard.php" class="cancel-btn">Cancel</a>

                
            </form>
         
        </div>
    </div>
</body>

</html>
<?php 
	 }
?>