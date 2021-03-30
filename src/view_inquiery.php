<?php


require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));


$username = $_SESSION['username'];

$sql_sender = "SELECT * FROM inquiry WHERE `sender`='$username'";
$res_sender = mysqli_query($conn, $sql_sender);



$sender_count = "SELECT COUNT(*) FROM inquiry WHERE sender= '$username'";
$resSender_count = mysqli_query($conn, $sender_count);


$sql = "SELECT * from inquiry where reciever = '$userID'";
$result = mysqli_query($conn, $sql);

if ($result) {
  //echo "Sucessfull";
} else {
  echo "failed";
}
$count = "SELECT COUNT(*) FROM inquiry WHERE sender= '$username'";


$sql_sender = "SELECT * FROM `inquiry` WHERE sender='$username'";

$res1 = mysqli_query($conn, $count);

if ($res_sender && $res1 ) {
  //echo "Sucessfull";
} else {
  echo "failed";
}


$recieved_sql = "SELECT * FROM inquiry WHERE reciever='$username' ORDER BY inquiryID DESC";
$recieved_count = "SELECT COUNT(*) FROM inquiry WHERE reciever= '$username'";

$recieved_res = mysqli_query($conn, $recieved_sql);
$count_res = mysqli_query($conn, $recieved_count);

if ($recieved_res) {
  //echo "Sucessfull";
} else {
  echo "failed";
}