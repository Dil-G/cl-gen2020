<?php
include_once '../../config/conn.php';



// $requestID = $_GET['requestID'];
//                                     $sql = "SELECT * FROM proofs WHERE requestID='$requestID'";
//                                     $result = mysqli_query($conn,$sql);

//                                     while($row1 = mysqli_fetch_assoc($result)){

// echo "<embed src='data:". $row1['fileType'].";base64,".base64_encode($row1['fileData'])."'height='500/>"; 
// }

?>
<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Character Certificates</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/profile.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
</head>

<body>
    <div id="officeNav"></div>
    <div class="content">
        <div class="card">
            <?php
            $proofID = $_GET['proofID'];
            $sql = "SELECT * FROM proofs WHERE proofID='$proofID'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if ($row['fileType'] == 'application/pdf') {
                header('Content-Type:' . $row['fileType']);
                echo $row['fileData'];
            } else {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['fileData']) . '" style="margin-left:5%"/>';
            }

            ?>
        </div>
    </div>

</body>



</html>