<?php
include ('../public/teacher/Tcr_achievement.php');

//require_once('cl_gen.php');
include_once '../config/conn.php';
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/


    $sql = "SELECT * from achievement";
    $result = mysqli_query($conn,$sql);
    $maxID = 0;

    while($row=mysqli_fetch_array($result)){

        $lastId = $row['achievementID'];
        $charID = substr($lastId,2);
        $intID = intval($charID);

        if($intID > $maxID){
            $maxID = $intID;
        }

    }

    if(mysqli_num_rows($result) == 0){
            $date = date("y");
            $prefix = "AC";
            $achievementID = $prefix . $date . "00001" ;
    }else{

            if(substr($maxID,0,2) != date("y")){
                $date = date("y");
                $prefix = "AC";
                $achievementID = $prefix . $date . "00001";
            }else{
                $prefix = "AC";
                $achievementID = $prefix . ($maxID+1) ;
            }


    echo $achievementID;
    }

if (isset($_POST['regbtn'])) {

    //$sportID = $_POST['Spid'];
    $categoryID = $_POST['cID'];
    $studentID = $_POST['anumber'];
    $achievementDate = $_POST['aDate'];
    $achievementName = $_POST['aname'];
    $position = $_POST['position'];
    $value = $_POST['Ivalue'];
    $description = $_POST['description'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

$sql = "INSERT INTO achievement(achievementID,categoryID,studentID,achievementDate,achievementName,position,value,description,date,time) VALUES
 ('$achievementID','$categoryID','$studentID', '$achievementDate','$achievementName','$position', '$value','$description','$date', '$time')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Details Added");';
	//echo 'window.location.href="../driver.php";';
    echo '</script>';
    echo "Succesfully Added Record";
    header('Location: ../public/teacher/Tcr_achievement.php');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>