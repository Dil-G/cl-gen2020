<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] == 'officer'){
      
      $dutyID = array();
      $dutyID = $_SESSION['dutyID'];

      if (in_array("d6", $dutyID)) {

        include_once '../../config/conn.php';
        include_once '../../src/addClass.php';
      
	?>

<!DOCTYPE html>
<html>

<head>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assign Classes</title>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <link rel="stylesheet" href="../css/messages.css " type="text/css">
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/confirm.js"></script>
</head>

<body>
    <div id="officeNav"></div>

    <div class="content">
        <br>
        <div class="card">
        <h1 style="color:#6a7480;margin-left:-20px;">Academic Years</h1>
        <hr>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
        </div>
        <br>

        <div class="card">
        <?php if (isset($_GET['error'])) { ?>
        <div id="error" style="margin-left:-10px; line-height:20px;"><?php echo $_GET['error']; ?></div>
    <?php } ?>
            <form action="../../src/addClass.php">
                <button type="submit" name="addYear" value=1 onclick="confirmation()">Add Year</button>
            </form>
            <br>
            <br>

            <hr>
            <table>
                <tr>
                    <th>Year </th>
                    <th>View Grades</th>

                </tr>
                <?php 
                    $year=0;
                    while($row = $year_result->fetch_assoc()) {
                        if($year == $row["Year"]){
                            continue;
                        }else{
                        ?>
                <tr>
                    <td>
                    <?php
                            echo $row["Year"]. "<br>";
                            $year = $row["Year"];
                        }
                        
					?></td>
                    <?php echo "<td><a class='btn editbtn' href = o_addClassGrades.php?Gyear=".$year." >View Grades </a> </td>"?>
                  

                </tr>
                <?php }?>

            </table>
        </div>

    </div>

</body>

</html>

<?php }} ?>