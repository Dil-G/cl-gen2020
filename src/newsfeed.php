<?php 

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));

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
?>


