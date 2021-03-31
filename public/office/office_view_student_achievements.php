<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d1", $dutyID)) {
      //  include ('../../src/office_view_student_achievements.');
        include_once '../../config/conn.php';
        $studentID =$_GET['userID'];
    ?>

<!DOCTYPE html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Achievements List</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/tabs.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link type="text/css" rel="stylesheet" href="../css/messages.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">

</head>

<body>
    <div id="officeNav"></div>
    <div class="content">


        <h1 style="margin-top:20px;">Achievements List</h1>

        <div class="btn-box" style="margin-left:5px;">
            <button id="button2" style="margin-left: 10%;" onclick="activated()">Sports Achievements</button>
            <button id="button1" onclick="notActivated()">Society Achievements</button>
        </div>


       <!-- sports -->
       <div id="page1" class="page">

<div>

    </div>
    <form class="search" style="margin-right: 10%;">
        <input type="text" id="Inputs" placeholder="Search.." name="search">
        <button type="submit">Search</button>
    </form>
    <div class="card">
        <?php
            $studentID =$_GET['userID'];
            $sql2 = "SELECT * FROM sports_achievements where studentID='$studentID'";
            $result2 = mysqli_query($conn,$sql2);
            
                ?>
        <hr>
        <div class="scroll">
            <table>
                <tr>
                    <th>Achievement ID</th>
                    <th>Achievement Name</th>
                    <th>Position </th>
                    <th>Important Value</th>
                    <th>Description</th>
                    <th>Achievement Date</th>
                    <th>Update</th>
                </tr>
                <?php
                while($row2=mysqli_fetch_assoc($result2)){
                ?>
                <tbody id="Table">
                    <tr>
                    <?php $achievementID_sports = $row2['achievementID'];?>
                        <td><?php echo$achievementID_sports?></td>
                        <td><?php echo$row2['achievementName']?></td>
                        <td><?php echo$row2['position']?></td>
                        <td><?php echo$row2['impValue']?></td>
                        <td><?php echo$row2['description']?></td>
                        <td><?php echo$row2['achievementDate']?></td>
                        
                        <td><?php echo "<a href=office_update_sports_achievements.php?achievementID=".$achievementID_sports." class='button editbtn'>Update</a>" ?></td>

                        <!-- <td><input type="text" velue="" name="achievementID">
                        </td>
                        <td><input type="text" velue=""
                                name="achievementName"></td>
                        <td><input type="text" velue="" name="position"></td>
                        <td><input type="text" velue="" name="impValue"></td>
                        <td><input type="text" velue="" name="ach_description">
                        </td>
                        <td><input type="text" velue=""
                                name="achievementDate"></td>
                        <th> <button type="submit" class="registerbtn" style="margin-left: 5px;"
                                name="update_ach_sop">Update</button></th> -->

                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>

<!-- societies -->
        <div id="page2" class="page">
            <div>
           
            </div>

            <form class="search" style="margin-right: 10%;">
                <input type="text" id="Inputs" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>


            <br>
            <div class="card">

                <?php if (isset($_GET['error'])) { ?>
                <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>


                <?php
                   
                      
                    //$studentID =$_GET['userID'];
                    $sql1 = "SELECT * FROM societies_achievements where studentID='$studentID'";
                    $result1 = mysqli_query($conn,$sql1);
                    
                        ?>

                <hr>
                <div class="scroll">

                    <table>
                        <tr>
                            <th>Achievement ID</th>
                            <th>Achievement Name</th>
                            <th>Position </th>
                            <th>Important Value</th>
                            <th>Description</th>
                            <th>Achievement Date</th>
                            <th>Update</th>

                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result1)){
                        ?>
                        <tbody id="Table">
                            <tr>
                            <?php $achievementID = $row['achievementID'];
                                echo $achievementID; ?>
                                <td><?php echo$achievementID?></td>
                                <td><?php echo$row['achievementName']?></td>
                                <td><?php echo$row['position']?></td>
                                <td><?php echo$row['impValue']?></td>
                                <td><?php echo$row['description']?></td>
                                <td><?php echo$row['achievementDate']?></td>
                                
                                <td><?php echo "<a href='office_update_achievements.php?achievementID='".$achievementID." class='button editbtn'>Update</a>" ?></td>


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

<?php }
   } ?>