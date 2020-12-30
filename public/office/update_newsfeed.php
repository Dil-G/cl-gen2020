<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d5", $dutyID)) {
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
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
</head>

<body>

    <?php

require_once '../../config/conn.php';
if (isset($_GET['newsID'])){

    $newsID = $_GET['newsID'];

    $sql = "SELECT * FROM newsfeed WHERE newsID = $newsID";

    $res= mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);

    if($res){
    //echo "Sucessfull";
    }
    else{
    echo"failed";	
    }
}

?>
    <div id="officeNav"></div>

    <div class="content">
            <h1>Add News</h1>


            <div class="container" style="margin-left:25%!important;
  width: 50% !important;">
                <br>


                <form action="../../src/newsfeed_update.php" method="POST" enctype="multipart/form-data">
                    <hr>

                    <label for="NID"><b>News ID</b></label>
                    <input type="text" name="NID" placeholder="News ID" value="<?php echo $row['newsID']?>" readonly>

                    <label for="title"><b>Title</b></label>
                    <input type="text" name="title" placeholder="Title" value="<?php echo $row['title']?>" required>

                    <label for="news"><b>News</b></label>
                    <?php echo "<textarea  name=\"news\" rows=\"4\" cols=\"50\"  required>" .$row['news']." </textarea> "?>
                    <br>

                    <?php 
            if($row['image']==TRUE){ ?>
                    <label class="radio"> <input type="checkbox" name="delete" value="delete"> <b>Delete Image</b>
                        <span class="checkmark"></span></label>
                    <br>
                    <br>
                    <div class="image">
                        <?php echo "<img src='../../images/".$row['image']."'>"; ?>
                    </div>
                    <?php } 
                        ?>
                    <label for="image"><b>Update Images</b></label>
                    <br>
                    <input type="hidden" name="size" value="1000000" required>
                    <div>
                        <input type="file" name="image" id="image" />
                    </div>
                    <button type="submit" class="registerbtn" id="add_news" name="add_news">Update</button>
                    <a href="news_list.php" class="cancel-btn">Cancel</a>
                    <hr>
                </form>
            </div>

    


    </div>


</body>

</html>

<?php }} ?>