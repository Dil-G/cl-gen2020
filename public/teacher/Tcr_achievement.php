<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
   
      $teacherType = $_SESSION['teacherType'];

     
	?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Achievements</title>
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
            <form action="../../src/add_achievement.php"   method="POST" enctype="multipart/form-data">
                <h1 style="color:#6a7480;">Achievement Form</h1>
                    <hr>

                    <label for="name"><b>Student Admission Number</b></label>
                    <input type="text" placeholder="Enter admission number"  id="username" name="anumber"  onblur="validateUserID(username.value)"  required>
                  
                    
                    <label for="nic"><b>Category ID</b></label>
                    <input type="text" placeholder="Enter category ID" name="cID" required>

                    <label for="aDate"><b>Achievement Date</b></label>
                    <input type="date" placeholder="Enter Date of Birth" name="stuDob" required>


           
                    <label for="position"><b>Achievement Name</b></label>
                    <input type="text" placeholder="Achievement name" name="aname" required>



                    <label for="position"><b>Position</b></label>
                    <select name="position" id="district" required>
                    <option disabled selected value> -- Select an option -- </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="patticipation">Participation</option>
                        </select>
                    <br><br>

                    <label for="description"><b>Description</b></label>
                    <input type="text" placeholder="Enter description" name="description" required>

                    <label><b>Important Value:</b></label>
                    <label> <input type="radio" name="Ivalue" value="1">1</label>
                    <label> <input type="radio" name="Ivalue" value="2">2</label>
                    <label><input type="radio" name="Ivalue" value="3">3</label>

                    <br>
                    </br><br>
                    </br>
                  
                    <br>
                <div id="msg"></div>
                <hr>
                <div>
                    <button type="submit" class="registerbtn" name="regbtn">Add</button>
                    <a href="Tcr_dashboard2.php" class="cancel-btn">Cancel</a>
              
            </div>
        </div>
        </div>
    </body>

</html>

<?php 
	 }
?>