<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
	header('Location: ../common/error.html');
} else {

	$userID = $_SESSION['userID'];
?>


<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/category.css">
</head>

<body>
    <div id="nav2"></div>

    <div class="content">

        <h1>EDUCATIONAL ACTIVITIES</h1>
        <form class="search" action="action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
        <br>
        <br>
        <br>
        <hr>


        <div class="card">
            <form>
                <button type="submit" formaction="add_education.php">Add Educational category</button>
            </form>
            <br>
            <br>
        </div>
        <div class="card">
            <h2><b>Educational Category A</b></h2>
            <hr>
            <table>
                <tr>
                    <th>Educational category ID</th>
                    <th>Educational category </th>
                    <th>Teacher In Charge ID</th>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
            </table>
        </div>

        <div class="card">
            <h2><b>Educational Category B</b></h2>
            <hr>
            <table>
                <tr>
                    <th>Educational category ID</th>
                    <th>Educational category </th>
                    <th>Teacher In Charge ID</th>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
                <tr>
                    <td>AAA</td>
                    <td>BBB</td>
                    <td>BBB</td>

                </tr>
            </table>
        </div>

    </div>

</body>

</html>

<?php } ?>