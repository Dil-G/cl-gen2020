
<?php
include ('../public/admin/A_sports2.php');
//require_once('cl_gen.php');
include_once '../config/conn.php';
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/
if (isset($_POST['regbtn'])) {
        
    $SportID = $_POST['Spid'];
    $SportName = $_POST['Sname'];
    $tcrID = $_POST['TID'];
    $numStu = $_POST['NOS'];
    
$sql = "INSERT INTO Csports (SportID, SportName, tcrID, numStu) VALUES
 ($SportID, '$SportName', '$tcrID', '$numStu');";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Details Added");';
	//echo 'window.location.href="../driver.php";';
    echo '</script>';
    echo "dd";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>