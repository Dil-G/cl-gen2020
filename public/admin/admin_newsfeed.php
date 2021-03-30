<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
	 }else if($_SESSION['userType'] != 'admin'){
			header('Location: ../common/error.html');
		}
		else{

         $userID = $_SESSION['userID'];
         include_once '../../src/newsfeed.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Feed</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/newsfeed.css">
</head>


<div id="nav2"></div>
<div class="content">
    <div class="feed">
        <div class="banner">
        </div>
<br>
<h5>Pages</h5>
        <?php
        $totsl_records = mysqli_num_rows($number_result);
        $total_page = ceil($totsl_records/$num_per_page);

         for($i=1;$i<=$total_page;$i++){
            echo "<a href='admin_newsfeed.php?page=".$i."' id='pagebtn'>$i</a>";
        }

		while($row=mysqli_fetch_assoc($res)){
			?>
            
        <div class="container">
            <table>
                <tr>
                    <th width="60%">
                        <h2><b><?php echo  $row['title'] ?></b></h2>
                        <hr>
                    </th>
                </tr>
                <tr>
                    <td width="60%">
                        <p> <?php echo $row['news'] ?></p>
                    </td>
                    <?php if($row['image']==TRUE){ ?>
                    <td width="30%">
                        <div class="image">
                            <?php echo "<img src='../../images/".$row['image']."'>"; ?>

                        </div>
                    </td>
                    <?php } ?>
                </tr>
            </table>
        </div>
        <?php
		}
		?>
    </div>
    <br>
    <?php
        $totsl_records = mysqli_num_rows($number_result);
        $total_page = ceil($totsl_records/$num_per_page);

         for($i=1;$i<=$total_page;$i++){
            echo "<a href='admin_newsfeed.php?page=".$i."' id='pagebtn' style='background-color:black;'>$i</a>";
        }
?>
</div>
</body>

</html>

<?php } ?>