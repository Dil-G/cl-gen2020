<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'parent'){
		header('Location: ../common/error.html');
    }else{

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
    <link type="text/css" rel="stylesheet" href="../css/main_stu.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
  </head>

  <body>
    <div id="nav"></div>

    <div class="content">
      <h1>Edit Request Form</h1>


      <div class="container stu">
        <br>


        <form action="../../src/request1.php" method="POST" enctype="multipart/form-data">
          <hr>


          <label for="id">ID Number</label>
          <input type="text" name="id" value=<?php echo  $_SESSION['userID'] ?> readonly>

          <label for="request"><b>Request</b></label>
          <textarea id="request" name="request" rows="4" placeholder="News" cols="50" required></textarea>

          <label for="image"><b>Upload a proof</b></label>
          <input type="hidden" name="size" value="1000000" required>

          <div>
            <input type="file" name="image[]" id="image" required multiple />
          </div>
          <br>
          <button type="submit" class="registerbtn" id="add_news" name="add_request">Submit</button>
          <a href="editRequest.php" class="cancel-btn">Cancel</a>

        </form>
      </div>



    </div>

  </body>

  </html>

<?php } ?>