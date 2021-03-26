<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d2", $dutyID)) {
        $streamID = $_GET['streamID'];
        include('../../src/view_subjects.php');
	?>

<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Advanced Level Subject Streams</title>
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    
    <div class="content">
        <br>
        <?php
       
                    $sql = "SELECT streamName FROM alstreams WHERE streamID='$streamID'" ;
                    $result = mysqli_query($conn,$sql);
                    $rows = mysqli_fetch_assoc($result);
                    ?>
        <h1 style="color: #6a7480;"><?php echo $rows['streamName'];?> Stream</h1>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>

        <br>
        <br>
        <br>

        <div class="card">
            <br>
            <br>
            <hr>
            <table>
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Name</th>


                </tr>
                <tr>
                    <?php
                    
                    while($row=mysqli_fetch_assoc($result_streamsubjects)){
                    ?>
                <tr>
                    <td><?php echo $row['subjectID']?></td>
                    <td><?php echo $row['subjectName']?></td>
                     

                </tr>
                <?php
                    }
                    ?>
            </table>
        </div>

    </div>
</body>

</html>

<?php }} ?>