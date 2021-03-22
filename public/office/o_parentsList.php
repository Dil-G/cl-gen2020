<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d1", $dutyID)) {
        include_once '../../config/conn.php';
        include_once '../../src/view_users.php';
	?>

<!DOCTYPE html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parents User List</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/tabs.js"></script>
</head>

<body>
    <div id="officeNav"></div>
    <div class="content">

        <div class="card">
            <h1 style="margin-top:20px;">Parents List</h1>
            <form class="search">
                <input type="text" ID="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
            <div class="btn-box" style="margin-left:5px;">
                <button id="button2" onclick="activated()">Activated Users</button>
                <button id="button1" onclick="notActivated()">Un-activated Users</button>
            </div>
        </div>

        <br>
        <br>
        <div id="page2" class="page">
            <div class="card">
                <div class="count">
                    <?php
                     while($row = $parent_result->fetch_assoc()) {
                     echo "Parent Count: " . $row["COUNT(isActivated)"]. "<br>";
                     }?>
                </div>
                <hr>
                <div class="scroll">
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>UserName</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($parent_result1)){
                        ?>
                        <tbody id="Table">
                            <tr>
                                <td><?php echo $row['userID'] ?></td>
                                <td><?php echo $row['username'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="page1" class="page">
            <div class="card">
                <div class="count">
                    <?php
                     while($row = $parent_result3->fetch_assoc()) {
                     echo "Activated Parent Count: " . $row["COUNT(isActivated)"]. "<br>";
                     }?>
                </div>
                <hr>
                <div class="scroll">
                    <table>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Edit Details</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($parent_result4)){
                        ?>
                        <tbody id="Table">
                            <tr>
                                <td><?php echo $row['userID'] ?></td>
                                <td><?php
                        $name = $conn->query("SELECT * FROM parent where parentID='$row[userID]'");

                        while($fname = mysqli_fetch_assoc($name)){
                            echo $fname['name'] ;
                        }
                        ?></td>
                                <?php echo "<td><a class='btn editbtn' href = SProfile.php?userID=".$row['userID']." > update </a> </td>"?>
                            </tr>
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php }} ?>