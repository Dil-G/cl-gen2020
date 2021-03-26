
<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'parent'){
		header('Location: ../common/error.html');
    }else{

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
    <link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../css/main_stu.css">
    <link type="text/css" rel="stylesheet" href="../css/news.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
	<link type="text/css" rel="stylesheet" href="../css/button.css">

</head>


<div id="nav"></div>


<div class="content">
    <div id="msg"></div>



    <div class="feed">


        <div class="btn-box">

            <button id="button2" onclick="NEWS()">News and Events</button>
            <button id="button1" onclick="ABOUT()">Notifications</button>
        </div>
        <?php if (isset($_GET['message'])) { ?>
        <div id="message"><?php echo $_GET['message']; ?></div>
        <?php } ?>

        <?php if (isset($_GET['error'])) { ?>
        <div id="error"><?php echo $_GET['error']; ?></div>
        <?php } ?>
        <div id="page2" class="page">
            <div class="banner">
            </div>


            <table>

                <?php
$size = mysqli_fetch_assoc($res1);
$c = $size['COUNT(*)'];
$i = 1;
$n=1;



for($i;$i <= $c;$i++){
    ?>
                <tr>
                    <?php
    for($j=1;$j<4 && $j < $c;$j++){
        ?>
                    <td>
                        <?php
            $n++;
                    $row=mysqli_fetch_array($res);?>

                        <table class="inner">
                            <tr>

                                <td class="time">
                                    <p class="d"> <?php echo $row['newsDate']?>
                                        <span><?php echo  $row['newsTime']?></span>
                                    </p>
                                </td>

                            </tr>
                            <tr>
                                <th>
                                    <h2><b><?php echo $row['title'] ?></b></h2>
                                    <hr>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    <p> <?php echo substr($row['news'], 0, 200) . "..."?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>

								
                                    <form method="POST" action="news.php">
                                        <input type="hidden" name="newsID" value="<?php echo $row['newsID']; ?>" />
                                        <button class="view-btn" style="width:100px;" type="submit" id="view_news"
                                            name="view_news"><b>View More</b></button>
                                    </form>
                                </td>
                            </tr>

                        </table>
                    </td>

                    <?php if($n>$c ){
                                break;
                            } } ?>
                </tr>
                <?php
            if($n>$c ){
            break;
        }			

    } ?>

            </table>





        </div>


        <div id="page1" class="page">

            <a name="new"></a>
            <table>

                <?php
            
                    while($row=mysqli_fetch_array($res_notifications)){?>

                <table class="inner">
                    <tr>

                        <td class="time">
                            <p class="d"> <?php echo $row['dateTime']?>
                            </p>
                        </td>


                    </tr>
                    <tr>
                        <th>
                            <h2><b><?php echo $row['title'] ?></b></h2>
                            <hr>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <p> <?php echo $row['messages']?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>

						<button id="view-btn" class="registerbtn" name="view_notification"><?php echo "<a href = notification.php?view_notification=" . $row['notificationID'] . " > View More </a> " ?></button>

                            <!-- <form method="POST" action="notification.php">
                                <input type="hidden" name="notificationID"
                                    value="" />
                                <button class="view-btn" style="width:100px;" type="submit" id="view_notification"
                                    name="view_notification"><b>View More</b></button>
                            </form> -->
                        </td>
                    </tr>

                </table>
                </td>

                <?php 
                             } ?>
                </tr>

            </table>

        </div>
    </div>
</div>


</div>
<script>
var page1 = document.getElementById("page1");
var page2 = document.getElementById("page2");
var button1 = document.getElementById("button1");
var button2 = document.getElementById("button2");

let url = window.location.href;
if (url == window.location.href) {
    page1.style.display = "none";
    page2.style.display = "block";
    button1.style.color = "#000";
    button2.style.color = "#008080";
}

function ABOUT() {
    page1.style.display = "block";
    page2.style.display = "none";
    button1.style.color = "#000";
    button2.style.color = "#008080";

}

function NEWS() {
    page1.style.display = "none";
    page2.style.display = "block";
    button1.style.color = "#008080";
    button2.style.color = "#000";
}
</script>



</body>

</html>

<?php } ?>