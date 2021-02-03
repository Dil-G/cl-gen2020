<?php
include ('../public/admin/Tcr_fees5.php');

//require_once('cl_gen.php');
include_once '../config/conn.php';
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/


    $sql = "SELECT * from fees";
    $result = mysqli_query($conn,$sql);
    $maxID = 0;

    while($row=mysqli_fetch_array($result)){

        $lastId = $row['FeesID'];
        $charID = substr($lastId,2);
        $intID = intval($charID);

        if($intID > $maxID){
            $maxID = $intID;
        }

    }

    if(mysqli_num_rows($result) == 0){
            $date = date("y");
            $prefix = "FE";
            $feesID = $prefix . $date . "00001" ;
    }else{

            if(substr($maxID,0,2) != date("y")){
                $date = date("y");
                $prefix = "FE";
                $feesID = $prefix . $date . "00001";
            }else{
                $prefix = "FE";
                $feesID = $prefix . ($maxID+1) ;
            }


    echo $feesID;
    }

if (isset($_POST['regbtn'])) {

    //$sportID = $_POST['Spid'];
    $TeacherID = $_POST['FID'];
    $StudentID = $_POST['SID'];
    $StudentName = $_POST['Sname'];
    $FeeType = $_POST['Ftype'];
    $Amount = $_POST['amount'];
    $Status = $_POST['Stats'];
    $date = date('Y-m-d');
    $time = date('H:i:s');

$sql = "INSERT INTO fees (feesID, TeacherID, StudentID,StudentName,FeeType,Amount,Status,Date,Time) VALUES
 ('$feesID','$TeacherID', '$StudentID','$StudentName','$FeeType', '$Amount','$Status','$date', '$time');";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Details Added");';
	//echo 'window.location.href="../driver.php";';
    echo '</script>';
    echo "Succesfully Added Record";
    header('Location: ../public/teacher/Tcr_fees4.php');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();

?>