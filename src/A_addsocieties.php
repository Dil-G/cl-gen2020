<?php
include ('../public/admin/add_society.php');
//require_once('cl_gen.php');
include_once '../config/conn.php';
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/

$sql = "SELECT * from csocieties";
$result = mysqli_query($conn,$sql);
$maxID = 0;

while($row=mysqli_fetch_array($result)){

    $lastId = $row['SocietyID'];
    $charID = substr($lastId,2);
    $intID = intval($charID);

    if($intID > $maxID){
        $maxID = $intID;
    }

}

if(mysqli_num_rows($result) == 0){
        $date = date("y");
        $prefix = "SO";
        $societyID = $prefix . $date . "00001" ;
}else{

        if(substr($maxID,0,2) != date("y")){
            $date = date("y");
            $prefix = "SO";
            $societyID = $prefix . $date . "00001";
        }else{
            $prefix = "SO";
            $societyID = $prefix . ($maxID+1) ;
        }


echo $societyID;
}



if (isset($_POST['regbtn'])) {

    //$societyID = $_POST['Stid'];
    $societyName = $_POST['societyName'];
    $tcrID = $_POST['TID'];

$sql = "INSERT INTO csocieties (SocietyID,SocietyName, tcrID) VALUES
 ('$societyID','$societyName', '$tcrID');";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Details Added");';
	//echo 'window.location.href="../driver.php";';
    echo '</script>';
    echo "Succesfully Added Record";
    header('Location: ../public/admin/societies.php');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>
