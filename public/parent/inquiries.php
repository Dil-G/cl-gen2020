<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] != 'parent') {
	header('Location: ../common/error.html');
} else {

	$userID = $_SESSION['userID'];
	include_once '../../src/view_inquiery.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inquiries</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/tabs.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main_stu.css">
    <link type="text/css" rel="stylesheet" href="../css/news.css">
    <link type="text/css" rel="stylesheet" href="../css/button.css">
</head>

<body>

    <div id="nav1"></div>

    <div class="content">

        <div class="feed">

            <div class="btn-box">
                <button id="button2" onclick="activated()">Recieved Inquiries</button>
                <button id="button1" onclick="notActivated()">Sent Inquiries</button>
            </div>
			
            <div id="page1" class="page">
                <div class="card" style="width: 90%; height:100%;">
                    <?php
						if (mysqli_num_rows($count_res) == 0) {
						?>
                    <h2><b>No Recieved Inquiries</b></h2>
                    <img src="../../images/message.png">
                    <?php
						} else {
							while ($row = mysqli_fetch_assoc($recieved_res)) {
							?>
                    <div class="container" style="width: 95%; height:100%;">
                        <?php echo " <button type='submit' style='float:right' class='search'><a href=AddInquiery.php?userID=" . $row['reciever'] . " >Reply</a></button>" ?>

                        <h2><b><?php echo "From :" . $row['sender'] ?></b></h2>
                        <hr>
                        <h2><b><?php echo "Title :" . $row['title'] ?></b></h2>
                        <p> <?php echo $row['message'] ?></p>

                    </div>
                    <?php }
						}
						?>

                </div>
            </div>

            <div id="page2" class="page">
                <div class="card" style="width: 90%; height:100%;">
                    <?php
						if (mysqli_num_rows($res1) == 0) {
						?>
                    <h2><b>No Sent Inquiries</b></h2>
                    <img src="../../images/message.png">
                    <?php
						} else {
							while ($row = mysqli_fetch_assoc($res_sender)) {
							?>
                    <div class="container" style="width: 95%; height:100%;">
                        <?php echo " <button type='submit' style='float:right' class='search'><a href=AddInquiery.php?userID=" . $row['reciever'] . " >Reply</a></button>" ?>

                        <h2><b><?php echo "To :" . $row['reciever'] ?></b></h2>
                        <hr>
                        <h2><b><?php echo "Title :" . $row['title'] ?></b></h2>
                        <p> <?php echo $row['message'] ?></p>

                    </div>
                    <?php }
						}
						?>
                </div>

            </div>
        </div>

</body>

</html>

<?php } ?>