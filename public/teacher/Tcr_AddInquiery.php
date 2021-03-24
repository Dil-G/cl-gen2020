<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'teacher'){
      
      $teacherType = array();
      $teacherType = $_SESSION['teacherType'];

    //  echo $_SESSION['username'];
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
				<form action="../../src/add_inquiery.php" method="POST"  onsubmit="return validateTeacher()">
               
                <h1 style="color: #6a7480;">INQUIERY FORM</h1>


                    <label for="title"><b> Sender's ID</b></label>
                    <input type="text" id="sender" name="sender" value = "<?php  echo  $_SESSION['username']?>" readonly>

					<label for="title"><b> Inquiry Title</b></label>
                    <input type="text" id="title" name="title" placeholder="Type Inquiry ID.." value="<?php if(isset($_GET['title'])){echo $_GET['title'];} ?>" required>
                    
	
					<label for="reciever"><b>Reciever's ID</b></label>
					<input type="text" id="username" name="rID" placeholder="Type Reciever's ID.." value="<?php if(isset($_GET['sender'])){echo $_GET['sender'];} ?>" onblur="validateUsername(rID.value)"  required>
                    <div class="text" id="uName"></div>

					<label for="msge"><b> Message </b></label>
                    <textarea id="msge" name="msge" placeholder="Write something.." style="height:200px" required></textarea>
                    
                    <button type="submit" class="registerbtn" name="add_inq">Save</button>
                <a href="Tcr_ReplyInquiery.php" class="cancel-btn">Cancel</a>
					<hr>
					
					
	
				</form>
			</div>

			
	</div>

</body>

</html>

<?php 
	 }
?>