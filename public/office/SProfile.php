<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
    $error = "Please Login!";
    header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

    $dutyID = array();
    $dutyID = $_SESSION['dutyID'];

    if (in_array("d1", $dutyID)) {
	$userID = $_SESSION['userID'];

	if (isset($_GET['userID'])) {
		$userID = $_GET['userID'];
	}

	include_once '../../src/view_studentProfile.php'

?>


	<!DOCTYPE html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Student Profile</title>
		<script src="../js/jquery-1.9.1.min.js"></script>
		<script src="../js/nav.js"></script>
		<link rel="stylesheet" href="../css/register.css " type="text/css">

		<link type="text/css" rel="stylesheet" href="../css/news.css">
		<link type="text/css" rel="stylesheet" href="../css/main.css">
		<link type="text/css" rel="stylesheet" href="../css/profile.css">

	</head>

	<body>


		<div id="officeNav"></div>
		<?php
		require_once '../../config/conn.php';
		


		?>



		<div class="content" style="margin-left: 90px;">


			<div class="feed">
				<div class="btn-box">

					<button id="button1" onclick="GENERAL()">General</button>
					<button id="button2" onclick="EXAMS()">Exam Resuts</button>
					<button id="button3" onclick="ACHIEVEMENTS()">Achievements</button>
					<button id="button4" onclick="PARENT()">Guardian</button>
				</div>

				<!-- General Page 1 -->
				<div id="page1" class="page">
					<div class="container">


						<h2><b>User Information</b></h2>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
						?>

							<hr>
							<div class="card">
								<form>
									<div class="photo">
									<?php
                                    if ($row['stuPhoto'] == TRUE) { ?>
                        <div class="profile-image"><?php echo "<img src='../../images/" . $row['stuPhoto'] . "' class = 'profileimage'>"; ?></div>
                        <?php } else {
                                    } ?>

									</div>
									<div class="first">
										<div class="row">
											<div class="col">
												<div class="form-group ">
													<label class="label" for="input-username">First name</label>
													<input type="text" id="fname" class="inputs" value="<?php echo $row['fName'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label class="label" for="input-address">Middle name</label>
													<input type="text" id="mname" class="inputs" value="<?php echo $row['mName'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group ">
													<label class="label" for="input-username">Last name</label>
													<input type="text" id="lname" class="inputs" value="<?php echo $row['lName'] ?>"readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="form-group ">
													<label class="label" for="dob">Date of Birth</label>
													<input type="text" id="dob" class="inputs" placeholder="Date of Birth" value="<?php echo $row['dob'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label class="label" for="stunic">NIC</label>
													<input id="stunic" class="inputs" placeholder="NIC" value="<?php echo $row['stuNic'] ?>" type="text"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group ">
													<label class="label" for="gender">Gender</label>
													<input type="text" id="gender" class="inputs" placeholder="Gender" value="<?php echo $row['gender'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label class="label" for="religion">Religion</label>
													<input id="religion" class="inputs" placeholder="Religion" value="<?php echo $row['religion'] ?>" type="text"readonly>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col">
												<div class="form-group ">
													<label class="label" for="adNo">Admission Number</label>
													<input type="text" id="adNo" class="inputs" placeholder="Admission Number" value="<?php echo $row['admissionNo'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group ">
													<label class="label" for="input-username">Entered Date</label>
													<input type="text" id="Edate" class="inputs" placeholder="Entered Date" value="<?php echo $row['enteredDate'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label class="label" for="input-username">Entered Grade</label>
													<input type="text" id="Egrade" class="inputs" placeholder="Entered Grade" value="<?php echo $row['enteredGrade'] ?>"readonly>
												</div>
											</div>
										</div>



									</div>
									<h3><b>Contact Information</b></h3>
									<div class="first">
										<h4><b>Address</b></h4>
										<div class="row">
											<div class="col">
												<div class="form-group">

													<label class="label" for="street">Street</label>
													<input id="street" class="inputs" placeholder="Home Address" value="<?php echo $row['adStreet'] ?>" type="text"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label class="label" for="city">City</label>
													<input id="city" class="inputs" placeholder="Home Address" value="<?php echo $row['adCity'] ?>" type="text"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group">
													<label class="label" for="district">District</label>
													<input id="district" class="inputs" placeholder="Home Address" value="<?php echo $row['adDistrict'] ?>" type="text"readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col">
												<div class="form-group ">
													<label class="label" for="ContactNumber">Contact Number</label>
													<input type="text" id="ContactNumber" class="inputs" placeholder="Contact Number" value="<?php echo $row['contactNo'] ?>"readonly>
												</div>
											</div>
											<div class="col">
												<div class="form-group ">
													<label class="label" for="adNo">Email</label>
													<input type="text" id="email" class="inputs" placeholder="Email" value="<?php echo $row['email'] ?>"readonly>
												</div>
											</div>

										</div>
									</div>



								</form>

							</div>
						<?php } ?>
					</div>

				</div>

				<!-- /General Page 1 -->

				<div id="page2" class="page">

					<div class="container">
						<div class="first">
							<h2><b>G.C.E. Ordinary Level Results</b></h2>

							<br>
							<table>
								<?php
								$c = 9;
								$i = 1;
								$n = 1;

								for ($i; $i <= $c; $i++) {
								?>
									<tr>
										<?php
										for ($j = 1; $j < 4 && $j < $c; $j++) {
										?>
											<td>
												<?php
												$n++;
												$row = mysqli_fetch_array($ol_result); ?>

												<table class="inner">
													<tr>

														<td>
															<div class="form-group ">
																<label class="label" for="sub1"><?php echo $row['SubName'] ?></label>
																<input type="text" id="sub1" class="inputs" placeholder="Grade" value="<?php echo $row['grade'] ?>"readonly>
															</div>

															</p>
														</td>

													</tr>


												</table>
											</td>

										<?php if ($n > $c) {
												break;
											}
										} ?>
									</tr>
								<?php
									if ($n > $c) {
										break;
									}
								} ?>
							</table>

							<br>

						</div>

						<hr>
						<div class="first">
							<h2><b>G.C.E advanced level results</b></h2>
							<div class="first">
								<table class="inner">
									<tr>
										<?php
										while ($row = mysqli_fetch_array($al_result)) { ?>



											<td style="margin-right: 10px;padding:10px;">
												<div class="form-group" style="margin-right: 10px;">
													<label class="label" for="sub1"><?php echo $row['subjectName'] ?></label>
													<input type="text" id="sub1" class="inputs" placeholder="First name" value="<?php echo $row['grade'] ?>">
												</div>

												</p>
											</td>



										<?php }
										?>
								</table>
							</div>
						</div>
					</div>

				</div>

				<div id="page3" class="page">
					<div class="container">

						<h2><b>SPORTS</b></h2>
						<div class="first">
						<h2><b>Achievements</b></h2>

							<br>
							<table>
								<?php
								$size = mysqli_fetch_assoc($countSports_result);
								$c = $size['COUNT(*)'];
								$i = 1;
								$n = 1;

								for ($i; $i <= $c; $i++) {
								?>
									<tr>
										<?php
										for ($j = 1; $j < 4 && $j <= $c; $j++) {
										?>
											<td>
												<?php
												$n++;
												$row = mysqli_fetch_array($sports_result); ?>

												<table class="inner">
													<tr>

														<td>
															<div class="form-group ">
																<label class="label" for="sub1"><?php echo $row['SportName'] ?></label>
																<input type="text" id="sub1" class="inputs" placeholder="First name" value="<?php echo $row['achievementName'] ?>">
															</div>

															</p>
														</td>

													</tr>


												</table>
											</td>

										<?php if ($n > $c) {
												break;
											}
										} ?>
									</tr>
								<?php
									if ($n > $c) {
										break;
									}
								} ?>
							</table>


						</div>

				
					</form>
					<hr>

				<h2><b>CLUBS AND SOCIETIES</b></h2>
				<div class="first">
						<h2><b>Achievements</b></h2>

							<table>
								<?php
								$size = mysqli_fetch_assoc($countSociety_result);
								$c = $size['COUNT(*)'];
								$i = 1;
								$n = 1;

								for ($i; $i <= $c; $i++) {
								?>
									<tr>
										<?php
										for ($j = 1; $j < 4 && $j <= $c; $j++) {
										?>
											<td>
												<?php
												$n++;
												$row = mysqli_fetch_array($socities_result); ?>

												<table class="inner">
													<tr>

														<td>
															<div class="form-group ">
																<label class="label" for="sub1"><?php echo $row['SocietyName'] ?></label>
																<input type="text" id="sub1" class="inputs" placeholder="First name" value="<?php echo $row['achievementName'] ?>">
															</div>

															</p>
														</td>

													</tr>


												</table>
											</td>

										<?php if ($n > $c) {
												break;
											}
										} ?>
									</tr>
								<?php
									if ($n > $c) {
										break;
									}
								} ?>
							</table>


						</div>
				</form>
			</div>
		</div>


		</div>

		<!-- /Education Page 2 -->



		<!-- Aesthetic Page 5 -->
		<div id="page4" class="page">


			<div class="container">


				<h2><b>Mother's Information</b></h2>
				<?php
						while ($row = mysqli_fetch_assoc($result_parent)) {
						?>
				<hr>
				<div class="card">

					<form>
						<div class="first">
							<div class="row">
								<div class="col">
									<div class="form-group ">
										<label class="label" for="input-username">Name</label>
										<input type="text" id="fname" class="inputs" placeholder="First name" value="<?php echo $row['name'] ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group ">
										<label class="label" for="adNo">Occupation</label>
										<input type="text" id="adNo" class="inputs" placeholder="Admission Number" value="<?php echo $row['occupation'] ?>">
									</div>
								</div>
								<div class="col">
									<div class="form-group ">
										<label class="label" for="adNo">NIC</label>
										<input type="text" id="adNo" class="inputs" placeholder="Admission Number" value="<?php echo $row['nic'] ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group ">
										<label class="label" for="adNo">Contact Number</label>
										<input type="text" id="adNo" class="inputs" placeholder="Contact Number" value="<?php echo $row['contactNo'] ?>">
									</div>
								</div>
								<div class="col">
									<div class="form-group ">
										<label class="label" for="adNo">Email</label>
										<input type="text" id="email" class="inputs" placeholder="Email" value="<?php echo $row['email'] ?>">
									</div>
								</div>
							</div>
						</div>
					</form>
<?php } ?>
				</div>
		
				
			</div>
			<!-- /Aesthetic Page 5 -->
		</div>


		</div>
		<script>
			var page1 = document.getElementById("page1");
			var page2 = document.getElementById("page2");
			var page3 = document.getElementById("page3");
			var page4 = document.getElementById("page4");
			var button1 = document.getElementById("button1");
			var button2 = document.getElementById("button2");
			var button3 = document.getElementById("button3");
			var button4 = document.getElementById("button4");

			let url = window.location.href;
			if (url == window.location.href) {
				page1.style.display = "block";
				page2.style.display = "none";
				page3.style.display = "none";
				page4.style.display = "none";
				button1.style.color = "#000";
				button2.style.color = "#008080";
				button3.style.color = "#008080";
				button4.style.color = "#008080";
			}

			function GENERAL() {

				page1.style.display = "block";
				page2.style.display = "none";
				page3.style.display = "none";
				page4.style.display = "none";
				button1.style.color = "#000";
				button2.style.color = "#008080";
				button3.style.color = "#008080";
				button4.style.color = "#008080";


			}

			function EXAMS() {
				page1.style.display = "none";
				page2.style.display = "block";
				page3.style.display = "none";
				page4.style.display = "none";
				button1.style.color = "#008080";
				button2.style.color = "#000";
				button3.style.color = "#008080";
				button4.style.color = "#008080";

			}

			function ACHIEVEMENTS() {

				page1.style.display = "none";
				page2.style.display = "none";
				page3.style.display = "block";
				page4.style.display = "none";
				button1.style.color = "#008080";
				button2.style.color = "#008080";
				button3.style.color = "#000";
				button4.style.color = "#008080";
			}


			function PARENT() {

				page1.style.display = "none";
				page2.style.display = "none";
				page3.style.display = "none";
				page4.style.display = "block";
				button1.style.color = "#008080";
				button2.style.color = "#008080";
				button3.style.color = "#008080";
				button4.style.color = "#000";
			}
		</script>





	</body>

	</html>

<?php
}} ?>