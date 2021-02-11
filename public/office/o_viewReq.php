<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d4", $dutyID)) {
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Requests</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/register.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/profile.css">
    <link type="text/css" rel="stylesheet" href="../css/view.css">
    <link type="text/css" rel="stylesheet" href="../css/pop.css">
</head>

<body>
    <?php

            require_once '../../config/conn.php';

            $sql = "SELECT * FROM Request ORDER BY requestID DESC";

            $res = mysqli_query($conn, $sql);

            if ($res) {
                //echo "Sucessfull";
            } else {
                echo "failed";
            }

            ?>





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
            <h1 style="color: #6a7480;"> Request List "IMAGE DOWNLOAD WENNE NA"</h1>
            <br>
            <form class="search">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit">Search</button>
            </form>
        </div>

        <br>


        <div class="card">


            <br>


            <hr>

            <table>
                <tr>
                    <th>Request ID</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Request</th>
                    <th>Proof</th>
                    <th>Date</th>
                    <th>Time</th>

                </tr>
                <?php
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                <tr>
                    <td><?php echo $row['requestID'] ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['request'] ?></td>
                    <td>
                        <?php
                                    if ($row['image'] == TRUE) { ?>
                        <a download="<?php echo $row['image'] ?>" href="../../images/" title="Image">
                            <div class="news-image">
                                <?php echo "<img src='../../images/" . $row['image'] . "' height='100'  >"  ?></div>

                        </a>
                        <?php } else {
                                        echo "No Image..";
                                    } ?>
                    </td>
                    <td><?php echo $row['requestDate'] ?></td>
                    <td><?php echo $row['requestTime'] ?></td>


                    <td><button
                            class="dltbtn"><?php echo "<a href = ../../src/delete_news.php?requestID='" . $row['requestID'] . "' > Delete </a> " ?></button>
                    </td>

                </tr>
                <?php
                        }
                        ?>
            </table>
        </div>



    </div>
    <script>
    var form1 = document.getElementById("character-form");

    var characterbtn = document.getElementById("character-btn");

    var close1 = document.getElementsByClassName("close1")[0];
    var close2 = document.getElementsByClassName("close2")[0];

    characterbtn.onclick = function() {
        form1.style.display = "block";
    }

    close1.onclick = function() {
        form1.style.display = "none";
    }
    close2.onclick = function() {
        form2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>


</body>

</html>

<?php }
} ?>