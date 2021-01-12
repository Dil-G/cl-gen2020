<?php
     session_start();

     if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
         $error = "Please Login!";
         header('Location: ../common/loginFile.php?error='.$error);
	 }else if($_SESSION['userType'] != 'admin'){
			header('Location: ../common/error.html');
		}
		else{

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
    <script>
    $(document).ready(function() {
        $("#Inputs").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    </script>
    <link rel="stylesheet" href="../css/view.css " type="text/css">
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/register.css">
</head>

<body>
    <div id="nav2"></div>

    <div class="content">

        <h1 style="color: #6a7480;">SPORTS</h1>
        <form class="search" action="register_stu.html">
            <input type="text" id="Inputs" placeholder="Search.." name="search">
            <button type="submit">Search</button>
        </form>
        <br>
        <br>
        <br>
        <hr>


        <div class="card">
            <form>
                <button type="submit" formaction="add_sport.php">Add Sport</button>
            </form>
            <h2><b>SPORT A</b></h2>
            <hr>

            <table>



                <tr>
                    <th>Sport ID</th>
                    <th>Sport </th>
                    <th>Teacher In Charge ID</th>
                    <th>Update</th>
                    <th>Deactivate</th>

                </tr>

                <?php
				while($row=mysqli_fetch_assoc($result)){

			?>
                <tbody id="Table">
                    <tr>
                        <td><?php echo $row['sportID'] ?></td>
                        <td><?php echo $row['sportName'] ?></td>
                        <td><?php echo $row['tcrID'] ?></td>
                        <?php
							echo "<td><a class='btn editbtn' href = updateSport.php?sportID=".$row['sportID']." > Update </a> </td>";
						 ?>
                        <?php 
							echo "<td><a class='btn dltbtn' href = # > Deactivate </a> </td>";
					 ?>

                    </tr>

                </tbody>


                <?php
    }
    
  
    ?>


</body>

</html>

<?php } ?>