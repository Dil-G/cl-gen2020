<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
        }else if($_SESSION['userType'] != 'teacher'){
            header('Location: ../common/error.html');
     }else if(($_SESSION['userType'] == 'teacher') && ($_SESSION['teacherType'] == 'both')){

         $userID = $_SESSION['userID'];
         include('../../src/view_sportcategory.php');
?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select the Category</title>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/tabs.css">
    <link type="text/css" rel="stylesheet" href="../css/users.css">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/pop.js"></script>
    <script src="../js/nav.js"></script>
</head>

<body>
<!-- Start Add achievements -->
    <div id="nav3"></div>
    <div class="content">
    <h1 style="color: #6a7480;">Select the category</h1>
	
		
			<hr>
			
                <table>
    

  
    <tr>
        <th>Sport ID</th>
        <th>Sport Name </th>
        <th>Add</th> 
    </tr>

    <?php
            while($row=mysqli_fetch_assoc($result)){

    ?>
  
  <tr>
    <td><?php echo $row['SportID'] ?></td>
    <td><?php echo $row['SportName'] ?></td>
    <?php echo "<td><a class='btn editbtn' href = Tcr_achievement2.php?SportID=".$row['SportID']." > Add </a> </td>"?>
  </tr>
    
   
   
    <?php
}


?>
<!-- End Add achievements -->


<table>
    <!-- Start Csocouey -->
<br>
<hr>
  
    <tr>
        <th>Society ID</th>
        <th>Societyt Name </th>
        <th>Add</th> 
    </tr>

    <?php
            while($row2=mysqli_fetch_assoc($result2)){

    ?>

<tr>
    <td><?php echo $row2['SocietyID'] ?></td>
    <td><?php echo $row2['SocietyName'] ?></td>
    <?php echo "<td><a class='btn editbtn' href = Tcr_achievement2.php?SocietyID=".$row2['SocietyID']." > Add </a> </td>"?>
</tr>



<?php
}


?>   


</body>
</html>

<?php } ?>

