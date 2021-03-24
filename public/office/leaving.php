<?php
//index.php
//include autoloader
session_start();

require_once '../../lib/dompdf/autoload.inc.php';
require_once '../../config/conn.php';

$userID = $_GET['userID'];

// reference the Dompdf namespace

use Dompdf\Dompdf;

//initialize dompdf class

$document = new Dompdf();

$_SESSION['studentID']=$userID;
//$document->loadHtml($html);

ob_start(); 
require 'character_certificate.php';
$page = ob_get_clean();


// $page = file_get_contents("character_certificate.php");

$document->loadHtml($page);

$connect = mysqli_connect("localhost", "root", "", "cl_gen");


//$output .= '</table>';

//echo $output;

$characterID = "CHR" . substr($userID, 2);
$sql = "SELECT * from charactercertificate WHERE characterID='$characterID'";
$result_sql = mysqli_query($connect, $sql);

if ((mysqli_num_rows($result_sql) == 0)) {

    // $document->loadHtml($output);

    //set page size and orientation

    $document->setPaper('A4', 'portrait');

    //Render the HTML as PDF

    $document->render();

    //Get output of generated pdf in Browser

    $document->stream("Character Certificate $userID", array("Attachment" => 0));
    //1  = Download
    //0 = Preview
    // $dompdf->loadHtml($html);
    $filePath = "../../pdf/";
    $file = "character-certificate-$userID.pdf";

    $files = $document->output();
    file_get_contents($files);
    $data = file_put_contents($filePath, $files);

    $dbh = new PDO("mysql:host=localhost;dbname=cl_gen", "root", "");
    $date= date('Y-m-d H:i:s');
    $stmt = $dbh->prepare("INSERT INTO characterCertificate VALUES (?,?,?,?,?)");
    $stmt->bindParam(1, $characterID);
    $stmt->bindParam(2, $userID);
    $stmt->bindParam(3, $file);
    $stmt->bindParam(4, $data);
    $stmt->bindParam(5, $date);
    $stmt->execute();

    $update = "UPDATE characterrequests SET requestStatus='1' WHERE userID='$userID'";
    $result_update = mysqli_query($conn,$update);
    
    $title = "Character Certificate";
    $message = "You character certificate has been generated. Check for accuracy and accept or report error";
    
    $sql_noti = "INSERT into notifications(title,messages,document,reciever,dateTime) VALUES ('".$title."','".$message."','".$file."','".$userID."','".$date."')";
    $result_noti = mysqli_query($conn,$sql_noti);


} else {

    $error = "Character certficate already generated";
    header('Location: o_reqCc.php?error=' . $error);
    exit();



    // $sql = "INSERT INTO characterCertificate (characterID, studentID, characterCertificate) VALUES ('1','$userID','$file');";
}
    // if ($conn->query($sql) === TRUE ) {
    //     header('Location: o_reqCc.php');
    // } else {
    //     $error = "Cannot add Classes";
    //     header('Location: o_reqCc.php?error=' . $error);
    // }
