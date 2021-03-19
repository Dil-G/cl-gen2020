<?php
    session_start();
<<<<<<< HEAD

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
      $teacherType = array();
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['userID'];
   
      
      


     
	?>

=======

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
      $teacherType = array();
      $teacherType = $_SESSION['teacherType'];
      $userID = $_SESSION['userID'];
      include('../../src/add_reply.php');
	?>

>>>>>>> 6f643f8f45a356e9dc9964b6c1fdb3b159b37f83
<!DOCTYPE html>
<html>

<head>
    <title>Inquieries 1</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
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


					<label for="title"><b> Inquiry ID</b></label>
<<<<<<< HEAD
                    <input type="text" id="title" name="title" >
                    
	
					<label for="reciever"><b>Sender's ID</b></label>
					<input type="text" id="reciever" name="reciever" value = <?php  echo  $_SESSION['userID']?> readonly>

                    <label for="reciever"><b>Reciever's ID</b></label>
					<input type="text" id="reciever" name="reciever" placeholder="Type Inquier ID.." required>

					<label for="msge"><b>Reply</b></label>
					<textarea id="msge" name="msge" placeholder="Write something.." style="height:200px" required></textarea>
=======
                    <input type="text" id="title" name="inquiry" >
                    
	
					<label for="reciever"><b>Sender's ID</b></label>
					<input type="text" id="reciever" name="sID"  value = <?php  echo  $_SESSION['userID']?> readonly> 

                    <label for="reciever"><b>Reciever's ID</b></label>
					<input type="text" id="reciever" name="rID" placeholder="Type Inquier ID.." required>

					<label for="msge"><b>Reply</b></label>
					<textarea id="msge" name="reply" placeholder="Write something.." style="height:200px" required></textarea>
>>>>>>> 6f643f8f45a356e9dc9964b6c1fdb3b159b37f83

					<button type="submit" class="registerbtn" name="add_rep" >Save</button>
                <a href="Tcr_ReplyInquiery.php" class="cancel-btn">Cancel</a>
					
	
				</form>
			</div>

           
	</div>

</body>

</html>
<?php } ?>