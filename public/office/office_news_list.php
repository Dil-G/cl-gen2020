<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d5", $dutyID)) {

        include_once '../../src/newsfeed.php';
?>

        <!DOCTYPE html>
        <html>

        <head>

            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>News list</title>
            <script src="../js/jquery-1.9.1.min.js"></script>
            <script src="../js/nav.js"></script>
            <script src="../js/confirm.js"></script>
            <script src="../js/search.js"></script>
            <link rel="stylesheet" href="../css/view.css " type="text/css">
            <link type="text/css" rel="stylesheet" href="../css/main.css">
            <link type="text/css" rel="stylesheet" href="../css/users.css">
            <link type="text/css" rel="stylesheet" href="../css/tabs.css">
            <link type="text/css" rel="stylesheet" href="../css/messages.css">
            <link type="text/css" rel="stylesheet" href="../css/button.css">
        </head>

        <body>


            <div id="officeNav"></div>

            <div class="content">
                <br>
                <?php if (isset($_GET['message'])) { ?>
                    <div id="message"><?php echo $_GET['message']; ?></div>
                <?php } ?>

                <?php if (isset($_GET['error'])) { ?>
                    <div id="error"><?php echo $_GET['error']; ?></div>
                <?php } ?>

                <div class="card">
                    <h1> News List</h1>
                    <hr>
                    <form class="search">
                        <input type="text" ID="Inputs" placeholder="Search.." name="search">
                        <button type="submit">Search</button>
                    </form>
                </div>

                <br>


                <div class="card">
                    <form>
                        <button type="submit" formaction="edit_newsfeed.php">Add News</button>
                    </form>
                    <br>
                    <br>
                    <hr>
                    <div class="scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>News ID</th>
                                    <th>News Title</th>
                                    <th>News</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <?php
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                                <tbody id="Table">
                                    <tr>
                                        <td><?php echo $row['newsID'] ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td><?php echo $row['news'] ?></td>
                                        <td><?php echo $row['newsDate'] ?></td>
                                        <td><?php echo $row['newsTime'] ?></td>
                                        <td>
                                            <?php
                                            if ($row['image'] == TRUE) { ?>
                                                <div class="news-image"><?php echo "<img src='../../images/" . $row['image'] . "' >"; ?></div>
                                            <?php } else {
                                                echo "No Image..";
                                            } ?>
                                        </td>
                                        <td><button class="viewbtn"><?php echo "<a href = update_newsfeed.php?newsID='" . $row['newsID'] . "' > Update </a> " ?></button>
                                        </td>


                                        <td>
                                            <form action='../../src/delete_news.php' method="GET" onclick="return confirmation()">
                                                <input type="hidden" name="newsID" value="<?php echo $row['newsID'] ?>" />
                                                <button class='btn dltbtn' input type="submit">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php
                            }
                                ?>
                        </table>
                    </div>
                </div>

            </div>


        </body>

        </html>

<?php }
} ?>