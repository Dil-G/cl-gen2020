<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'teacher'){
        header('Location: ../common/error.html');
    }else{      
        $teacherType = array();
        $teacherType = $_SESSION['teacherType'];


        if (!in_array("teacherIncharge", $teacherType)) {
            header('Location: Tcr_dashboard.php');
        }else{
      
        $userID = $_SESSION['userID'];
        include('../../src/view_societycategory.php');
     
	?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Achievements</title>
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/search.js"></script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/register.css">

</head>
<body name=top>

    <body>
        <div id="teacherNav"></div>


        <div class="content">
        
    <h1 style="color: #6a7480;">Select the category</h1>
    <form class="search" action="Tcr_ach.php">
            <input type="text" ID="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
			<hr>
            <div class="card">
		
            <table>
    

  
    <tr>
        <th>Society ID</th>
        <th>Society Name </th>
        <th>Add</th> 
    </tr>

    <?php
            while($row=mysqli_fetch_assoc($result)){

    ?>
  <tbody id="Table"> 
  <tr>
    <td><?php echo $row['SocietyID'] ?></td>
    <td><?php echo $row['SocietyName'] ?></td>
    <?php echo "<td><a class='btn editbtn' href = Tcr_achievement.php?SocietyID=".$row['SocietyID']." > Add </a> </td>"?>
  </tr>
    
  <tbody > 
   
    <?php
}


?>
<!-- End Add achievements -->




<?php
}


?>   


</body>
</html>

<?php } ?>







