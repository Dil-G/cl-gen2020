  
 <?php

//require_once('cl_gen.php');

require_once(realpath(dirname(__FILE__) . '/../config/conn.php'));
if (isset($_POST['add_rep'])){

    $inquiryID = $_POST['inquiry'];
    $senderID= $_POST['sID'];
    $recieverID = $_POST['rID'];
    $reply= $_POST['reply'];

   


$sql="INSERT INTO `reply`(`inquiryID`, `senderID`, `recieverID`, `reply`) VALUES ('$inquiryID','$senderID','$recieverID','$reply')";
$result=mysqli_query($conn,$sql);

    if ($result) {
      /*  echo '<script language="javascript">';
        echo 'alert("Details Added");';
        //echo 'window.location.href="../driver.php";';
        echo '</script>';
        echo "Succesfully Added Record";
      */
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn->close();
    
    ?>