<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
  $error = "Please Login!";
  header('Location: ../common/loginFile.php?error=' . $error);
} else if ($_SESSION['userType'] != 'admin') {
  header('Location: ../common/error.html');
} else {

  $userID = $_SESSION['userID'];
  include ('../../src/dashboard.php');
  
?>
<?php
 
 $dataPoints = array( 
   array("label"=>"Industrial", "y"=>51.7),
   array("label"=>"Transportation", "y"=>264.6),
   array("label"=>"Residential", "y"=>13.9),
   array("label"=>"Commercial", "y"=>7.8)
 )
  
 ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "World Energy Consumption by Sector - 2012"
	},
	data: [{
		type: "pie",
		indexLabel: "{y}",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#36454F",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($userData, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/dashboard.css">
    <title>Admin Dashboard</title>
  </head>

  <body>

    <div id="nav2"></div>
    <div class="content">
      <div class="welcome">
        <div class="dash-content">
          <h2>Welcome to Dashboard</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
        </div>
      </div>

      <table class="statis one">
        <tr>
          <td>
            <div class="box">
              <i class="fa fa-users "></i>
              <div class="info">
                <h3><?php
					while($Srow = $student_result->fetch_assoc()) {
						echo  $Srow["COUNT(isActivated)"]. "<br>";
					}?></h3> <span>Students</span>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
            </div>
          </td>
          <td>
            <div class="box">
              <i class="fa fa-users"></i>
              <div class="info">
                <h3><?php
					while($Trow = $teacher_result->fetch_assoc()) {
						echo $Trow["COUNT(isActivated)"]. "<br>";
					}?></h3> <span>Teachers</span>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
            </div>
          </td>
          <td>
            <div class="box">
              <i class="fa fa-users "></i>
              <div class="info">
              <h3><?php
					while($Strow = $staff_result->fetch_assoc()) {
						echo $Strow["COUNT(isActivated)"]. "<br>";
					}?></h3> <span>Office Staff</span>
                <p>Lorem ipsum dolor sit amet</p>
              </div>
            </div>
          </td>
        </tr>
      </table>
 
      <table class="statis two">
        <tr>
         
       
          <td>
            <div class="box ">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
          </td>
        </tr>
      </table>

      <table class="statis two">
        <tr>
          <td>
            <div class="box ">
              <i class="fa fa-futbol-o"></i>
              <h3><?php
					while($Sprow = $sport_result->fetch_assoc()) {
						echo $Sprow["COUNT(SportID)"]. "<br>";
					}?></h3> 
              <p class="lead">Sports</p>
            </div>
          </td>
          <td>
            <div class="box ">
              <i class="fa fa-music"></i>
              <h3><?php
					while($Sorow = $society_result->fetch_assoc()) {
						echo $Sorow["COUNT(SocietyID)"]. "<br>";
					}?></h3> 
              <p class="lead">Societies</p>
            </div>
          </td>
          <td>
            <div class="box ">
              <i class="fa fa-user"></i>
              <h3><?php
					while($Urow = $user_res4->fetch_assoc()) {
						echo $Urow["COUNT(isActivated)"]. "<br>";
					}?></h3>
              <p class="lead">Users</p>
            </div>
          </td>
          <td>
            <div class="box ">
              <i class="fa fa-trophy"></i>
              <h3><?php
					while($Arow = $achievement_result->fetch_assoc()) {
						echo $Arow["COUNT(achievementID)"]. "<br>";
					}?></h3>
              <p class="lead">Achievements</p>
            </div>
          </td>
        </tr>
      </table>

      
  </body>

  </html>

<?php } ?>