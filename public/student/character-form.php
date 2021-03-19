
<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }else if($_SESSION['userType'] != 'student'){
      header('Location: ../common/error.html');
    }else{

		$userID = $_SESSION['userID'];
		

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>

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
                                <form>
                                    <hr>



                                    <label for="reason"><b>Reason for request</b></label>
                                    <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                                    <br>
                                    <label for="image"><b>Proof Document</b></label>
                                    <input type="hidden" name="size" value="1000000" required>

                                    <div>
                                        <input type="file" name="image" id="image" />
                                    </div>

                                    <button type="submit" class="registerbtn">Request</button>
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
                                <form>
                                    <hr>

                                    <label for="reason"><b>Reason for request</b></label>
                                    <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                                    <br>
                                    <label for="prrof"><b>Proof Document</b></label>
                                    <input type="file" name="proof" required>

                                    <button type="submit" class="registerbtn">Request</button>
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