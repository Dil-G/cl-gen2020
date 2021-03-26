<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
   
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['username'];
      include_once '../../src/view_inquiery.php';
      
	?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inquiries</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/search.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/button.css">
    <!-- <link type="text/css" rel="stylesheet" href="../css/register.css"> -->
    



</head>

<body>
   <?php

require_once '../../config/conn.php';

$res2 = "SELECT res2(*) FROM inquiry";
$sql = "SELECT * FROM inquiry WHERE reciever ='$userID' ORDER BY inquiryID DESC";
   

    $res= mysqli_query($conn,$sql);
    $res2= mysqli_query($conn,$sql);
   

    if($res){
    //echo "Sucessfull";
    }
    else{
    echo"failed";	
    }


?>

    <div id="teacherNav"></div>

    <div class="content">

        <div class="feed">

        <div class="card">
        <form class="search" action="register_stu.html">
                    <input type="text" id="Inputs" placeholder="Search.." name="search">
                    <button type="submit">Search</button>
                </form>
            <div class="btn-box">
                <button id="button2" onclick="activated()">Sent Inquiries</button>
                <button id="button1" onclick="notActivated()">Recieved Inquiries</button>
            </div>
        </div>
			</br>


            <div id="page1" class="page">
                <div class="card" style="width: 90%; height:100%;">
                <?php
						if (mysqli_num_rows($res1) < 1) {
						?>
                    <h2><b>No Sent Inquiries</b></h2>
                    <img src="../../images/message.png">
                    <?php
						} else {
							while ($row = mysqli_fetch_assoc($res_sender)) {
							?>
                    <div class="container" style="width: 95%; height:100%;">
                
                        <h2><b><?php echo "To:" . $row['reciever'] ?></b></h2>
                       
                        <h2><b><?php echo "Reciever's Name:" . $row['recievername'] ?></b></h2>
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
						if (mysqli_num_rows($res) == 0) {
						?>
                    <h2><b>No Recieved Inquiries</b></h2>
                    <img src="../../images/message.png">
                    <?php
						} else {
							while ($row = mysqli_fetch_assoc($recieved_res)) {
							?>
                    <div class="container" style="width: 95%; height:100%;">
                    
                    <?php echo " <button type='submit' style='float:right' class='search'><a href=Tcr_AddInquiery.php?sender=" . $row['sender']  . '&sendername=' .  $row['sendername'] .'&reciever=' .  $row['reciever'] . '&recievername=' .  $row['recievername'] . '&title=' .  urlencode($row['title'])."  >Reply</a></button>" ?>

                        <h2><b><?php echo "From :" . $row['sender'] ?></b></h2>
                        <h2><b><?php echo "Sender's Name:" . $row['sendername'] ?></b></h2>
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