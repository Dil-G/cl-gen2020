
<?php


include ('../../src/A_viewsports.php');

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
	<div id="nav"></div>
		
		<div class="content">
		
			<h1>SPORTS</h1>
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
					<button type="submit" formaction="A_sports2.php">Add Sport</button>
				</form>
				<br>
				<br>
			</div>
			  <div class="card">
				<h2><b>SPORT A</b></h2>
				<hr>

				<table>
        

      
        <tr>
						<th>Sport ID</th>
						<th>Sport </th>
						<th>Teacher In Charge ID</th>
						<th>Number of Students </th>
            
        </tr>

        <?php
				while($row=mysqli_fetch_assoc($result)){

			?>
      
      <tr>
        <td><?php echo $row['sportID'] ?></td>
				<td><?php echo $row['sportName'] ?></td>
				<td><?php echo $row['tcrID'] ?></td>
        <td><?php echo $row['numstu'] ?></td>
				
        </tr>
        
       
       
       
        <?php
    }
    
  
    ?>

 
</body>
</html>