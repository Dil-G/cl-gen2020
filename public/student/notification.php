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
    <title>Notification 1</title>
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
        <a href="newsfeed.php"  id="view-btn">Back</a>

            <hr>
            <td class="time">
                            <p class="d"> <?php echo $row['dateTime']?>
                            </p>
                        </td>
            <h2><?php echo $row['title'] ?></h2>
            <hr>
            <p><?php echo $row['messages'] ?></p>

            <button id="character-btn" class="registerbtn" name="accept"><?php echo "<a href = ../../src/characterRequest.php?accepted=" . $userID . " > Accept </a> " ?></button>
            <button id="character-btn" class="registerbtn" name="view_character"><?php echo "<a href = ../common/character_certificate_view.php?userID=" . $userID . " > View </a> " ?></button>

            

            <br>
            <button id="character-btn" class="cancel-btn" onclick="openCharacterForm()">Report Issue</button>


                        <div id="character-form" class="model">


                            <div class="modal-content" style="margin-left: 120px;">
                                <span class="close1 close_character" onclick="closeCharacterForm()">&times;</span>
                                <h2>Character Certificate Request Form</h2>


                                <form action="../../src/characterRequest.php" method="POST" enctype="multipart/form-data" >
                                    <hr>
                                    <input type="hidden" name="userID" value="<?php echo $userID?>" required>

                                    <label for="issue"><b>Issue</b></label>
                                    <textarea id="reason" name="issue" rows="4" cols="50"></textarea>
                                    <br>
                                    <label for="image"><b>Proof Document</b></label>
                                    <input type="hidden" name="size" value="1000000" required>

                                    <div>
                                        <input type="file" name="image" id="image" required/>
                                    </div>

                                    <button type="submit" name="issueCharacter" class="registerbtn">Request</button>
                                    <hr>
                                </form>
                            </div>

                        </div>

            <?php}?>

        </div>
    </div>

    <script>
    var form1 = document.getElementById("edit-form");

    var formbtn = document.getElementById("request");

    var close1 = document.getElementsByClassName("close1")[0];


    formbtn.onclick = function() {
        form1.style.display = "block";
    }

    close1.onclick = function() {
        form1.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
</body>

</html>


<?php }
    } ?>