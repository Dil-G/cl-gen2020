<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
      $teacherType = array();
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['userID'];
      include('../../src/add_reply.php');

/*
      $query1 = "SELECT * FROM inquiry WHERE teacherID = '$userID' ";
        
      $result1 = mysqli_query($conn, $query1);  
      $row1 = mysqli_fetch_assoc($result1);

      $inquiryID = $row1["inquiry"];
      $sender = $row1["sender];
  */   
  
  
  require_once '../../config/conn.php';

if($_GET['inquiryID']){
    $inquiryID = $_GET['inquiryID'];
  

    $sql2 = "SELECT * FROM `inquiry` WHERE `inquiryID` =".$_GET['inquiryID'];
    $result2= mysqli_query($conn,$sql2);

    if($result2){
        echo "success";
    }
    else{
        echo "failed";
    }

}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Inquieries 1</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/errors.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/register2.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body >


<div id="teacherNav"></div>

<div class= content>
	
			<div class="container">
                                    
				<hr>
                <form method="POST">
                <h1 style="color: #6a7480;">REPLY FORM</h1>
                <?php
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>

					<label for="title"><b> Inquiry ID</b></label>
                   <input type="text" id="inquiryID" class="inputs" value="<?php echo $row2['inquiryID']; ?>">
	
					<label for="reciever"><b>Sender's ID</b></label>
					<input type="text" id="reciever" name="sID"  value = <?php  echo  $_SESSION['userID']; ?> readonly> 

                    <label for="reciever"><b>Reciever's ID</b></label>
					<input type="text"U id="username" name="rID" value="<?php echo $row2['sender']; ?>">
                    <div class="text" id="uName"></div>

					<label for="msge"><b>Reply</b></label>
					<textarea id="msge" name="reply" placeholder="Write something.." style="height:200px" required></textarea>

					<button type="submit" class="registerbtn" name="add_rep" >Save</button>
                <a href="Tcr_ReplyInquiery.php" class="cancel-btn">Cancel</a>
					
                <?php }
 ?>
				</form>
			</div>

           
	</div>

</body>

</html>
<?php } ?>