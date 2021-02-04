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
    <title> Classes</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
    <div id="officeNav"></div>

    <div class="content">
        <br>
        <div class="card">
        <h1 style="color:#6a7480;">Grade <?php echo substr($_GET['Ggrades'],5) ?>  Classes</h1>
        <form class="search" action="register_stu.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
        </div>
        <br>

        <div class="card">
            <form style="float:left;margin-left:50px;">
                <p><b>Upload student list</b></p>
                <input type="file" id="myFile" name="filename" required>
                </br>
                <button type="submit" formaction="">Upload</button>
            </form>
            <br>
            <br>
            <br>
            

            <form action="../../src/addClass.php" method="POST" style="float:right;margin-right:50px;">
            <input type="hidden"  name="thisGrade" value="<?php echo $_GET['Ggrades'] ?>" required>
                <button type="submit" class='btn viewbtn' name="addNewClass" >Add a class</button>
            </form>
            <br>
            <br>
            <br>
            <br>
            <hr>
            <table>
                <tr>
                    <th>Class ID </th>
                    <th>Class</th>
                    <th>View classes</th>

                </tr>

                <?php
                while($row=mysqli_fetch_assoc($class_result)) {
                    ?>
                <tr>
               
                    <td><?php echo $row['classID'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                  
                        <?php echo "<td><a class='btn editbtn' href = o_class.php?class=".$row['classID']." >View Class </a> </td>"?>
 
                </tr>
                <?php }?>

            </table>
        </div>

    </div>

</body>

</html>

<?php }} ?>