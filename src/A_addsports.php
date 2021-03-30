<?php
include ('../public/admin/admin_addSport.php');
//require_once('cl_gen.php');
include_once '../config/conn.php';
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/


    $sql = "SELECT * from csports";
    $result = mysqli_query($conn,$sql);
    $maxID = 0;

    while($row=mysqli_fetch_array($result)){

        $lastId = $row['SportID'];
        $charID = substr($lastId,2);
        $intID = intval($charID);

        if($intID > $maxID){
            $maxID = $intID;
        }

    }

    if(mysqli_num_rows($result) == 0){
            $date = date("y");
            $prefix = "SP";
            $sportID = $prefix . $date . "00001" ;
    }else{

            if(substr($maxID,0,2) != date("y")){
                $date = date("y");
                $prefix = "SP";
                $sportID = $prefix . $date . "00001";
            }else{
                $prefix = "SP";
                $sportID = $prefix . ($maxID+1) ;
            }


    echo $sportID;
    }

if (isset($_POST['regbtn'])) {

    //$sportID = $_POST['Spid'];
    $sportName = $_POST['Sname'];
    $tcrID = $_POST['TID'];

$sql = "INSERT INTO csports (SportID, SportName, tcrID) VALUES
 ('$sportID','$sportName', '$tcrID');";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Details Added");';
	//echo 'window.location.href="../driver.php";';
    echo '</script>';
    echo "Succesfully Added Record";
    header('Location: ../public/admin/admin_sports.php');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>