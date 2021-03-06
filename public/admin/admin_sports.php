<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
    header('Location: ../common/error.html');
} else {

    $userID = $_SESSION['userID'];
    include('../../src/view_sports.php');
?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sports</title>
        <script src="../js/jquery-1.9.1.min.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/confirm.js"></script>
        <script src="../js/search.js"></script>
        <link rel="stylesheet" href="../css/view.css " type="text/css">
        <link type="text/css" rel="stylesheet" href="../css/main.css">
        <link type="text/css" rel="stylesheet" href="../css/register.css">
    </head>

    <body>
        <div id="nav2"></div>

        <div class="content">

            <div class="card">
                <h1 style="color: #6a7480;">SPORTS</h1>
                <form class="search" action="register_stu.html">
                    <input type="text" id="Inputs" placeholder="Search.." name="search">
                    <button type="submit">Search</button>
                </form>
            </div>
            <br>
            <hr>


            <div class="card">
                <form>
                    <button type="submit" formaction="admin_addSport.php">Add Sport</button>
                </form>
                <hr>
                <div class="scroll">
                    <table>
                        <tr>
                            <th>Sport ID</th>
                            <th>Sport </th>
                            <th>Deactivate</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <tbody id="Table">
                                <tr>
                                    <td><?php echo $row['SportID'] ?></td>
                                    <td><?php echo $row['SportName'] ?></td>
                                    <?php
                                    // echo "<td><a class='btn editbtn' href = admin_updateSport.php?sportID=" . $row['SportID'] . " > Update </a> </td>";
                                    ?>

                                    <td>
                                        <form action="../../src/deactivate_account.php" method="GET" onclick="return confirmation()">
                                            <input type="hidden" name="sportID" value="<?php echo $row['SportID'] ?>" />
                                            <button class='btn dltbtn' input type="submit" name="deactivate">Deactivate</button>
                                        </form>
                                    </td>


                                </tr>
                            <?php
                        }
                            ?>
                            </tbody>
                    </table>
                </div>




    </body>

    </html>

<?php } ?>