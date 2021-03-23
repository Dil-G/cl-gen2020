<?php
session_start();

if (!isset($_SESSION['userType']) && !isset($_SESSION['userID'])) {
  $error = "Please Login!";
  header('Location: ../common/loginFile.php?error=' . $error);
} elseif ($_SESSION['userType'] == 'officer') {

  $dutyID = array();
  $dutyID = $_SESSION['dutyID'];

  if (in_array("d2", $dutyID)) {

    include('../../src/of_viewAl.php');

?>

    <!DOCTYPE html>

    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Students User List</title>
      <link rel="stylesheet" href="../css/view.css " type="text/css">
      <link type="text/css" rel="stylesheet" href="../css/main.css">
      <link type="text/css" rel="stylesheet" href="../css/tabs.css">
      <link type="text/css" rel="stylesheet" href="../css/users.css">
      <script src="../js/jquery-1.9.1.min.js"></script>
      <script src="../js/pop.js"></script>
      <script src="../js/nav.js"></script>
    </head>

    <body>
      <div id="officeNav"></div>

      <div class="content">
        <div class="card">
        <h1 style="color: #6a7480;">G.C.E A/L Examination Results</h1>
          <form class="search">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
          </form>
        </div>
        <br>
        <!-- <div class="btn-box">
                <button id="button1" onclick="MATHS()">Combined Maths</button>
                <button id="button2" onclick="BIO()">Biological Science</button>
                <button id="button3" onclick="COMMERCE()">Commerce</button>
            </div> -->

        <div id="page1" class="page">
          <br>
          <div class="card">
            <hr>
            <div class="scroll">
              <table>
                <tr>
                  <th>Exam</th>
                  <th>Student</th>
                  <th>Subject</th>
                  <th>Stream</th>
                  <th>Grade</th>


                </tr>
                <?php

                while ($row = mysqli_fetch_assoc($result_alresults)) {
                ?>
                  <tr>
                    <td><?php echo $row['examName'] ?></td>
                    <td><?php echo $row['fName'] . " " . $row['lName'] ?></td>
                    <td><?php echo $row['subjectName'] ?></td>
                    <td><?php echo $row['streamName'] ?></td>
                    <td><?php echo $row['grade'] ?></td>



                  </tr>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
        <!--Page1 end-->
        <!--Page 2-->
        <div id="page2" class="page">
          <div class="container">
            <h2>Biological Science</h2>
            <br>
            <div class="card">
              <hr>
              <table>
                <tr>
                  <th rowspan="2">Student Index Number</th>
                  <th rowspan="2">A/L Index Number</th>
                  <th rowspan="2">Student Name</th>
                  <th colspan="6">Subjects</th>
                </tr>
                <tr>
                  <th>Bio Science</th>
                  <th>Chemistry</th>
                  <th>Physics</th>
                  <th>Agriculture</th>
                  <th>General English</th>
                  <th>General Knowledge</th>
                </tr>
                <tr>
                  <td>S12345</td>
                  <td>65610</td>
                  <td>A.B.C. Student</td>
                  <td>A</td>
                  <td>C</td>
                  <td>B</td>
                  <td>A</td>
                  <td>A</td>
                  <td>86</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!--Page2 End-->
        <!--Page3-->
        <div id="page3" class="page">
          <div class="container">
            <h2>Commerce</h2>
            <br>
            <div class="card">
              <hr>
              <table>
                <tr>
                  <th rowspan="2">Student Index Number</th>
                  <th rowspan="2">A/L Index Number</th>
                  <th rowspan="2">Student Name</th>
                  <th colspan="6">Subjects</th>
                </tr>
                <tr>
                  <th>Business Studies</th>
                  <th>Accounting</th>
                  <th>Economics</th>
                  <th>ICT</th>
                  <th>General English</th>
                  <th>General Knowledge</th>
                </tr>
                <tr>
                  <td>S12345</td>
                  <td>65610</td>
                  <td>A.B.C. Student</td>
                  <td>A</td>
                  <td>C</td>
                  <td>B</td>
                  <td>A</td>
                  <td>A</td>
                  <td>86</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!--Page 3 end-->
      </div>

      <script>
        var page1 = document.getElementById("page1");
        var page2 = document.getElementById("page2");
        var page3 = document.getElementById("page3");
        var button1 = document.getElementById("button1");
        var button2 = document.getElementById("button2");
        var button3 = document.getElementById("button3");

        let url = window.location.href;
        if (url == "http://localhost/CL-GEN/public/office/o_al.php?") {
          page1.style.display = "block";
          page2.style.display = "none";
          page3.style.display = "none";
          button1.style.color = "#008080";
          button2.style.color = "#000";
          button3.style.color = "#000";
        } else if (url == "http://localhost/CL-GEN/public/office/o_al.php") {
          page1.style.display = "block";
          page2.style.display = "none";
          page3.style.display = "none";
          button1.style.color = "#008080";
          button2.style.color = "#000";
          button3.style.color = "#000";
        }

        function MATHS() {
          page1.style.display = "block";
          page2.style.display = "none";
          page3.style.display = "none";
          button1.style.color = "#008080";
          button2.style.color = "#000";
          button3.style.color = "#000";

        }

        function BIO() {
          page1.style.display = "none";
          page2.style.display = "block";
          page3.style.display = "none";
          button1.style.color = "#000";
          button2.style.color = "#008080";
          button3.style.color = "#000";
        }

        function COMMERCE() {
          page1.style.display = "none";
          page2.style.display = "none";
          page3.style.display = "block";
          button1.style.color = "#000";
          button2.style.color = "#000";
          button3.style.color = "#008080";
        }
      </script>
    </body>

    </html>

<?php }
} ?>