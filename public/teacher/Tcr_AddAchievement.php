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
    <title>Users</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">



</head>

<body>
    <div id="teacherNav"></div>

    <div class="content">

        <h1 style="color: #6a7480;">ADD ACHIEVEMENT</h1>

        <div class="view">

            <div class="scroll">
                <table class="usertable">
                    <tr>
                        <td class="usertd">
                            <a href="Tcr_AddSports.php">
                                <div class="container user">

                                    <br>
                                    <img src="../../images/sport.png" width="110" height="100">
                                    <h2><b>SPORTS</b></h2>
                                </div>
                            </a>
                        </td>
                        <td class="usertd">
                            <a href="Tcr_AddSocieties.php">
                                <div class="container user">

                                    <br>
                                    <img src="../../images/users.png" width="110" height="100">
                                    <h2><b>SOCIETIES</b></h2>

                                </div>
                            </a>
                        </td>
                </table>
            </div>
        </div>

    </div>

</body>

</html>

<?php }} ?>