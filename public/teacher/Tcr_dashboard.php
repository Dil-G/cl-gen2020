<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
  $error = "Please Login!";
  header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'teacher') {

  $userID = $_SESSION['userID'];
  include('../../src/dashboard2.php');
  include('../../config/conn.php');

  $user_sql = "SELECT * FROM teacher WHERE teacherID='$userID'";
  $user_res = $conn->query($user_sql);

?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../images/font-awesome-4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/nav.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/main.css">
    <link type="text/css" rel="stylesheet" href="../css/dashboard.css">
    <title>Teacher Dashboard</title>
  </head>

  <body>


  

    <div id="teacherNav"></div>
    <div class="content">
      <div class="welcome">
        <div class="dash-content">
        <h1>Hello <?php  while($uRow = $user_res->fetch_assoc()){
   echo  $uRow['fName'] ." ". $uRow['lName']."!";
  } ?></h1>
          <h2>Welcome to CL-GEN</h2>
          <?php echo "Date : " . date("Y/m/d"); ?>
        </div>
      </div>
      </table>




      <table class="statis one">
        <tr>

          <th>
          <a href=newsfeed.php>
            <div class="box "><h2 style=" float:left;margin-left:20px;">NEWS</h2>
            <p style="float:right;line-height:35px;margin-right:25px;">View More<i class="fa fa-angle-right" style="float:right;margin-left:85%;line-height:120px;"></i></p>
          </div>
          </a>
            
          </th>

        </tr>
        <tr>
          <td>
            <div class="box">
              <?php
              while ($Nrow = $news_result->fetch_assoc()) {
                echo "<h3>" . $Nrow["title"] . "<hr></h3>";

                echo substr($Nrow['news'], 0, 200) . "...<br>";
              ?>
                <hr>
              <?php
              } ?>

            </div>
          </td>

        </tr>
      </table>


     

  </body>

  </html>

<?php } ?>