<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'student') {
    header('Location: ../common/error.html');
} else {

    $userID = $_SESSION['userID'];
    $userType = $_SESSION['userType'];


?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/pop.js"></script>
        <script src="../js/nav.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/messages.css">
        <link type="text/css" rel="stylesheet" href="../css/view.css">
        <link type="text/css" rel="stylesheet" href="../css/register.css">
        <link type="text/css" rel="stylesheet" href="../css/profile.css">
        <link type="text/css" rel="stylesheet" href="../css/pop.css">
        <link type="text/css" rel="stylesheet" href="../css/main_stu.css">
    </head>

    <body>
        <div id="nav"></div>

        <div class="content">
            <div class="card">
                <?php if (isset($_GET['error'])) { ?>
                    <div id="error" style="margin-left:-10px; line-height:20px;"><?php echo $_GET['error']; ?></div>
                <?php } ?>
                <h1>Requests forms</h1>

            </div>

            <br>
            <table class="cert-table">
                <tr>
                    <td class="cert-td">
                        <div class="container modal">
                            <h2>Request character certificate</h2>
                            <br>
                            <button id="character-btn" onclick="openCharacterForm()">Open Form</button>


                            <div id="character-form" class="model">


                                <div class="modal-content" style="margin-left: 120px;">
                                    <span class="close1 close_character" onclick="closeCharacterForm()">&times;</span>
                                    <h2>Character Certificate Request Form</h2>

                                    <form action="../../src/characterRequest.php" method="POST" enctype="multipart/form-data">
                                        <hr>
                                        <input type="hidden" name="userID" value="<?php echo $userID ?>" required>
                                        <input type="hidden" name="userType" value="<?php echo $userType ?>" required>


                                        <label for="reason"><b>Reason for request</b></label>
                                        <textarea id="reason" name="reason" rows="4" cols="50"></textarea>
                                        <br>
                                        <label for="image"><b>Proof Document Image</b></label>
                                        <!-- <input type="hidden" name="size" value="1000000" required> -->

                                        <div>
                                            <input type="file" name="image[]" id="image" multiple required />
                                        </div>

                                        <button type="submit" name="requestCharacter" class="registerbtn">Request</button>
                                        <hr>
                                    </form>
                                </div>

                            </div>


                        </div>
                    </td>
                    <td class="cert-td">
                        <div class="container modal">
                            <h2>Request Leaving Document</h2>
                            <br>
                            <button id="leaving-btn" onclick="openLeavingForm()">Open Form</button>
                            <div id="leaving-form" class="model">


                                <div class="modal-content" style="margin-left: 120px;">
                                    <span class="close2 close_leaving" onclick="closeLeavingForm()">&times;</span>
                                    <h2>Leaving Request Form</h2>
                                    <form action="../../src/characterRequest.php" method="POST" enctype="multipart/form-data">
                                        <hr>
                                        <input type="hidden" name="userID" value="<?php echo $userID ?>" required>
                                        <input type="hidden" name="userType" value="<?php echo $userType ?>" required>

                                        <label for="reason"><b>Reason for request</b></label>
                                        <textarea id="reason" name="reason" rows="4" cols="50"></textarea>
                                        <br>
                                        <label for="image"><b>Proof Document</b></label>

                                        <div>
                                            <input type="file" name="image[]" id="image" multiple required />
                                        </div>
                                        <!-- <input type="file" name="proof" required> -->

                                        <button type="submit" name="requestLeaving" class="registerbtn">Request</button>
                                        <hr>
                                    </form>
                                </div>

                            </div>


                        </div>



                    </td>
            </table>


        </div>


    </body>

    </html>

<?php } ?>