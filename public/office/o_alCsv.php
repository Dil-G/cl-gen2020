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
         header('Location: o_dashboard.php');
        }
	?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add G.C.E. A/L Examination Results</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="nav"></div>

    </div>
    <div class="content">
        <div class="container">
            <form action="../php/register.php" method="POST">
                <h1>Add G.C.E. A/L Examination Results</h1>
                <hr>

                <label for="examID"><b>Exam ID</b></label>
                <input type="text" value="ALS123" name="examID" readonly>

                <label for="alExamYear"><b>Enter Exam Year</b></label>
                <input type="text" value="2016" name="alExamYear" readonly>

                <label for="alExamName"><b>Exam Name</b></label>
                <input type="text" value="G.C.E. A/L Examination - 2016" name="alExamName" readonly>

                <label for="myFile"><b>Enter CSV File</b></label>
                <input type="file" id="myFile" name="filename" class="nextpgbtn" required></br>

                <button type="submit" class="registerbtn">Save</button>
                <a href="o_viewAl.php" class="cancel-btn">Cancel</a>
                <hr>

            </form>

        </div>

    </div>


</body>

</html>

<?php } ?>