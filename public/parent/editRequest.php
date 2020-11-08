
<?php
    session_start();

    if(!isset($_SESSION['userType'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'parent'){

        $userID = $_SESSION['userID'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link type="text/css" rel="stylesheet" href="../css/pop.css">
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/pop.js"></script>
<script src="../js/nav.js"></script>
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/view.css">
<link type="text/css" rel="stylesheet" href="../css/register.css">
</head>
<body>
  <div id="nav"></div>
		
  <div class="content">
    <div class="card">
      <h1>Edit Request Form</h1>


      <div class="container">
    <br>


        <form>
          <hr>

						<label for="userID"><b>Student Admission Number</b></label>
						<input type="text" name="id" placeholder="Admission Number" required>
			
						<label for="reason"><b>Reason for request</b></label>
						<textarea id="reason" placeholder="Reason "name="reason" rows="4" cols="50"></textarea>
                        <br>
						<label for="TID"><b>Teacher in charge ID</b></label>
                        <input type="text"  name="TID" placeholder="Teacher In charge ID" required>
            
            <button type="submit" class="registerbtn">Request</button>
						<hr>
        </form>
      </div>
    
    </div>
    
     
</div>


</body>
</html>

<?php } ?>

