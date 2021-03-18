<?php
require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));


    $sql = "SELECT * FROM newsfeed ORDER BY newsID DESC";

	
	$news_result= mysqli_query($conn,$sql);

    if($news_result){
    //echo "Sucessfull";
    }
    else{
    echo"failed";	
    }
?>