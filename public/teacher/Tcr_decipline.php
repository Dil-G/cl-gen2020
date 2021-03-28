<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'teacher'){
        header('Location: ../common/error.html');
    }else{      
        $teacherType = array();
        $teacherType = $_SESSION['teacherType'];


        if (!in_array("classTeacher", $teacherType)) {
            header('Location: Tcr_dashboard.php');
        }else{
      

    $classID = $_SESSION['classID'];
    

     
	?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Decipline</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/errors.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/register2.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
</head>

<body name=top>

    <body>


        <div id="teacherNav"></div>
        <div class="content">
            <div class="container">
            <form action="../../src/add_decipline.php"   method="POST" enctype="multipart/form-data">
            
                <h1 style="color:#6a7480;">Decipline Form</h1>
                    <hr>

                    <label for="name"><b>Student Admission Number</b></label>
                    <input type="text" placeholder="Enter admission number"  id="username" name="sAd" required>
                  
                  
                   
                    <label><b>Decipline:</b></label>
                    <label> <input type="radio" name="dcpl" value="good">Good</label>
                    <label> <input type="radio" name="dcpl" value="bad">Bad</label>
                    <br></br>
                    <br>
                    </br>
                    <label for="TID"><b>Description:</b></label>
                    <input type="text" placeholder="Enter the description" id="username" name="des"  required>
                  
              
                <div>
                <button type="submit" class="registerbtn" name="regbtn" >Add</button>
                    <a href="Tcr_dashboard.php" class="cancel-btn">Cancel</a>
              
            </div>
        </div>
        </div>
    </body>

</html>

<?php 
	 }}
?>