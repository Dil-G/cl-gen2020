<?php 

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

$userType = $_SESSION['userType'];

$count = "SELECT COUNT(*)  FROM newsfeed";
$sql = "SELECT * FROM newsfeed ORDER BY newsID DESC";

$res= mysqli_query($conn,$sql);
$res1= mysqli_query($conn,$count);

if($res){
 //echo "Sucessfull";
}
else{
echo"failed";	
}


if (isset($_POST['view_news'])) {


    require_once '../../config/conn.php';

    $newsID = $_POST['newsID'];

    $sql = "SELECT * FROM newsfeed WHERE newsID='$newsID'";

    $news_res = mysqli_query($conn, $sql);

    if ($news_res) {
        //echo "Sucessfull";
    } else {
        echo "failed";
    }
}



if (isset($_SESSION['newsID'])) {

$newsID =$_SESSION['newsID'];

$sql_news = "SELECT * FROM newsfeed WHERE newsID = $newsID";

$res_news= mysqli_query($conn,$sql_news);
$row_news=mysqli_fetch_assoc($res_news);

if($res_news){
//echo "Sucessfull";
}
else{
echo"failed";	
}
}

if($userType == 'student' ||$userType == 'parent' ){
    $sql_notifications = "SELECT *  FROM notifications WHERE reciever='$userID' ORDER BY notificationID DESC";
    $count_notifications = "SELECT COUNT(*)  FROM notifications WHERE activeStatus='0' AND reciever='$userID'";

    $res_notifications= mysqli_query($conn,$sql_notifications);
    $res_count= mysqli_query($conn,$count_notifications);

    if($res_notifications){
    //echo "Sucessfull";
    }
    else{
    echo"failed";	
    }
}

if (isset($_GET['view_notification'])) {

    $notificationID =$_GET['view_notification'];

    $update = "UPDATE notifications SET activeStatus='1' WHERE reciever='$userID' AND notificationID=$notificationID";
    $sql_noti = "SELECT *  FROM notifications WHERE reciever='$userID' AND notificationID=$notificationID ";
    
    $sql_noti= mysqli_query($conn,$sql_noti);
    $update_noti= mysqli_query($conn,$update);
    
    if($sql_noti){
    //echo "Sucessfull";
    }
    else{
    echo"failed";	
    }
}
// if (isset($_SESSION['userID'])) {

//     $userID =$_SESSION['userID'];
    
//     $sql_notification = "SELECT * FROM notifications WHERE reciever = $userID";
    
//     $res_notification= mysqli_query($conn,$sql_notification);
    
//     if($res_notification){
//     //echo "Sucessfull";
//     }
//     else{
//     echo"failed ss";	
//     }
//     }
