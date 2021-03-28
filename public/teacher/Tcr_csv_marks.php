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
                    <form enctype="multipart/form-data" method="POST" action="../../src/marks.php">
                        <h3 align="center">Upload the marks File</h3>

                        <div class="container">

                            <label for="id"><b>Teacher ID</b></label>
                            <input type="hidden" id="teacherID" name="teacherID" value=<?php echo  $_SESSION['userID'] ?> readonly>
                            <input type="hidden" id="classID" name="classID" value=<?php echo  $_SESSION['classID'] ?> readonly>


                            <label for="term"><b>Position</b></label>
                            <select name="term" id="term" required>
                                <option disabled selected value> -- Select an option -- </option>
                                <option value="1">1st Term</option>
                                <option value="2">2nd Term</option>
                                <option value="3">3rd Term</option>
                            </select>
                            <br><br>

                            <label for="filename"><b>Upload a CSV file </b></label>
                            <input type="file" placeholder="Add Your File" id="myFile" name="file" required>
                            </br>
                            </br>
                            </br>
                            <button type="submit" name="upload_marks" class="registerbtn">SUBMIT</button>
                            <hr>
                            <h2 align="center"><a href="Tcr_class.php">Cancel</a></h2>
                    </form>
                </div>
            </div>
            </div>
        </body>

    </html>

<?php
}}
?>