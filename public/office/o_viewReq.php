<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Requests</title>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/nav.js"></script>
<link type="text/css" rel="stylesheet" href="../css/main.css">
<link type="text/css" rel="stylesheet" href="../css/view.css">
<link type="text/css" rel="stylesheet" href="../css/users.css">
</head>
<body>
	<div id="nav"></div>
     
         </div>
         <div class="content">
		
            <h1>Requests List</h1>
            <form class="search" action="of_addStudentDetails.html">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
            </form>
            
            
            <br>
            <br>
            <br>
            
    
                
                  <div class="card">
            
                    <br>
                    <br>
                    
                    <hr>
                    <table>
                        <tr>
                            <th>Request ID</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Student email</th>
                            <th>View Request</th>
                            <th>Delete Request</th>
                            
                            
                        </tr>
                        <tr>
                            <td>Req1234</td>
                            <td>S1234</td>
                            <td>A.B.C. Student</td>
                            <td>Student@gmail.com</td>
                            <td><form><button class="btn editbtn" type="submit" formaction="of_reqCc.html">View Request</button></form></td>
                            <td><button class="btn dltbtn" type="submit">Download</button></td>
                            
                        </tr>
                    </table>
                    </div>
            
				
		</div>
		
</body>
</html>