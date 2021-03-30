<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
	$error = "Please Login!";
	header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'teacher') {

	$teacherType = array();
	$teacherType = $_SESSION['teacherType'];


?>

	<?php

	include('../../src/newsfeed.php');
	?>

	<!DOCTYPE html>
	<html>

	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>News Feed</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>
		<link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="../css/main.css">
		<link type="text/css" rel="stylesheet" href="../css/news.css">
	</head>

	<body>
		<div id="teacherNav"></div>


		<div class="content">



			<div class="feed">

				<div id="page2" class="page">
					<div class="banner">
					</div>
					<table>

<br>
					<br>
						<?php


						$totsl_records = mysqli_num_rows($number_result);
						$total_page = ceil($totsl_records / $num_per_page);

						for ($i = 1; $i <= $total_page; $i++) {
							echo "<a href='newsfeed.php?page=" . $i . "' id='pagebtn'>$i</a>";
						}
						while ($row = mysqli_fetch_assoc($res)) {
						?> <td>

								<table class="inner">
									<tr>

										<td class="time">
											<p class="d"> <?php echo $row['newsDate'] ?> <span><?php echo  $row['newsTime'] ?></span></p>
										</td>

									</tr>
									<tr>
										<th>
											<h2><b><?php echo $row['title'] ?></b></h2>
											<hr>
										</th>
									</tr>
									<tr>
										<td>
											<p> <?php echo substr($row['news'], 0, 200) . "..." ?></p>
										</td>
									</tr>
									<tr>
										<td>
											<form method="POST" action="news1.php">
												<input type="hidden" name="newsID" value="<?php echo $row['newsID']; ?>" />
												<button class="view-btn" style="width:100px;" type="submit" id="view_news" name="view_news"><b>View More</b></button>
											</form>
										</td>
									</tr>

								</table>
							</td>

						<?php
						} ?>
						</tr>
						<?php


						?>

					</table>

				</div>


				<div id="page1" class="page">

					<a name="new"></a>
					<table class="none">
						<tr class="none">
						
					</table>
					<a name="old"></a>
					<table class="none">
						<tr class="none">
				
						</tr>

					</table>
				</div>
			</div>
		</div>


		</div>
		<script>

			let url = window.location.href;
			if (url == window.location.href) {
				page1.style.display = "none";
				page2.style.display = "block";
				button1.style.color = "#008080";
				button2.style.color = "#000";

			} 

		
		</script>



	</body>

	</html>

<?php
}
?>