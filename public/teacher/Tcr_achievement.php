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


        if (!in_array("teacherIncharge", $teacherType)) {
            header('Location: Tcr_dashboard.php');
        }else{
      
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

                    
                    <label for="nic"><b>Category ID</b></label>
                    <input type="text" placeholder="Enter category ID" name="cID"  value="<?php if (isset ($_GET['sportID'])){echo $_GET['sportID'];}?>">

                    <label for="name"><b>Student ID</b></label>
                    <input type="text" placeholder="Enter admission number"  id="username" name="anumber"  onblur="validateUserID(username.value)"  required>
                  
                    

                    <label for="aDate"><b>Achievement Date</b></label>
                    <input type="date" placeholder="Enter Date of Birth" id="date" name="aDate" onblur="checkDates(date.value)" required>


           
                    <label for="position"><b>Achievement Name</b></label>
                    <input type="text" placeholder="Achievement name" name="aname" required>



                    <label for="position"><b>Position</b></label>
                    <select name="position" id="district" required>
                    <option disabled selected value> -- Select an option -- </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="patticipation">Participation</option>
                        <option value="member">Member</option>
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

                    <p>1=Global level achievements,All island achievemnts</p>
                    </br>
                    <p>2=Provincial and district achievements</p>
                    <br>
                    <p>3=Inter school achievements,participation,membership</p>
                    <br>
                <div id="msg"></div>
                <hr>
                <div>
                    <button type="submit" class="registerbtn" name="add_achievement">Add</button>
                    <a href="Tcr_AddAchievement.php" class="cancel-btn">Cancel</a>
              
            </div>
        </div>
        </div>
    </body>

</html>

<?php 
     } }
?>