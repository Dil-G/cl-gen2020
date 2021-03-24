<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
  $error = "Please Login!";
  header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'student') {
  header('Location: ../common/error.html');
} else {

  $userID = $_SESSION['userID'];
  include('../../src/newsfeed.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Notification</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/pop.js"></script>

    <link type="text/css" rel="stylesheet" href="../css/main_stu.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link type="text/css" rel="stylesheet" href="../css/button.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>


    <div id="nav"></div>

    <div class="content">
        <br>
        <?php

      while ($row = mysqli_fetch_array($sql_noti)) { ?>
        <div class="container stu">
            <a href="newsfeed.php" id="view-btn">Back</a>

            <hr>
            <td class="time">
                <p class="d"> <?php echo $row['dateTime']?>
                </p>
            </td>
            <h2><?php echo $row['title'] ?></h2>
            <hr>
            <p><?php echo $row['messages'] ?></p>
            
            <button id="character-btn" class="registerbtn"
                name="view_character"><?php echo "<a href = ../common/leaving_document.php?userID=" . $userID . " > View </a> " ?></button>

            <?php}?>

        </div>
    </div>

</body>

</html>


<?php }
    } ?>