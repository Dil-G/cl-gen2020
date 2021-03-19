<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
	 }else if($_SESSION['userType'] != 'admin'){
			header('Location: ../common/error.html');
		}
		else{

         $userID = $_SESSION['userID'];
?>

<!DOCTYPE html>

<head>
    <?php
      include_once '../../config/conn.php';
      ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Duty List</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/buttons.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/tabs.js"></script>
    <script src="../js/search.js"></script>
</head>

<body>
    <div id="nav2"></div>

    <div class="content">

        <?php if (isset($_GET['error'])) { ?>
        <div id="error"><?php echo $_GET['error']; ?></div>
        <?php }
         //echo "test";

         $sql = "SELECT * FROM duty";
         $sql1 = "SELECT * FROM officerduties order by officerID";

         $result = $conn->query($sql);
         $result1 = $conn->query($sql1);


         ?>
        <div class="card">
            <h1>Duty List</h1>
            <form class="search">
                <input type="text" id="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            <div class="btn-box" style="margin-left: 10px;">
                <button id="button2" onclick="return activated()">Added Users</button>
                <button id="button1" onclick="return notActivated()">Activated Users</button>
            </div>
        </div>

        <br>
        <br>
        <div id="page2" class="page">

            <div class="card">
                <form>
                    <button class="editbtn" type="submit" formaction="add_duty.php">Add Duty</button>
                </form>
                <hr>
                <table>
                    <tr>
                        <th>Duty ID</th>
                        <th>Duty</th>
                    </tr>
                    <tbody id="Table">
                        <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                        <tr>
                            <td><?php echo $row['dutyID'] ?></td>
                            <td><?php echo $row['duty'] ?></td>
                        </tr>
                        <?php
                  }
                  ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="page1" class="page">
            <div class="card">
                <hr>
                <table>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Duty Assigned</th>
                        <th>Edit </th>
                    </tr>
                    <tbody id="Table">
                        <?php
                  $officerID = "0";
                  while ($row = mysqli_fetch_assoc($result1)) {
                  ?>
                        <?php $newID = $row['officerID'] ;
                           if($newID == $officerID){
                              continue;
                           }else{
                              ?> <tr>
                            <td><?php echo $newID;
                              $sql2 = "SELECT * FROM office where officerID = '$newID' ";
                        $result2 = $conn->query($sql2);
                        $row2 = mysqli_fetch_assoc($result2);?></td>
                            <td><?php echo ($row2['fName']." ".$row2['lName']);
                           }?></td>
                            <td>
                                <?php 
                        $officerID = $row['officerID']; 
                        //echo $officerID;
                        $sql3 = "SELECT * FROM officerduties where officerID = '$officerID' ";
                        $result3 = $conn->query($sql3);
                        //$row3 = mysqli_fetch_assoc($result3);
                        while ($row3 = mysqli_fetch_assoc($result3)) {
                         echo nl2br($row3['dutyID']. "\t");
                        }?>
                            </td>
                            <?php echo "<td><a class='btn editbtn' href = edit_duty.php?userID=" . $row['officerID'] . " > update </a> </td>" ?>
                        </tr>
                        <?php
                  }
                  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php } ?>