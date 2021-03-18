
<?php
    session_start();

    if(!isset($_SESSION['userType']) && !isset($_SESSION['userID'])){
        $error = "Please Login!";
        header('Location: ../common/loginFile.php?error='.$error);
    }elseif($_SESSION['userType'] != 'parent'){
		header('Location: ../common/error.html');
    }else{

		$userID = $_SESSION['userID'];
		$username = $_SESSION['username'];
		include_once '../../src/view_inquiery.php';

?>


<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inquiries</title>
<script src="../js/jquery-1.9.1.min.js"></script>
<script src="../js/nav.js"></script>
<link type="text/css" rel="stylesheet" href="../css/main_stu.css">
<link type="text/css" rel="stylesheet" href="../css/news.css">
<link type="text/css" rel="stylesheet" href="../css/button.css">
</head>
<body>


<div id="nav"></div>


		<div class="content">


	<div class="feed">
		
		<div class="btn-box">

		<button id="button2" onclick="SENT()">Sent Inquiries</button>
		<button id="button1" onclick="RECIEVED()">Recieved Inquiries</button>
		
		</div>
		<div id="page4" class="page">
		<div class="card" style="width: 90%; height:100%;">
		<div class="container" style="width: 95%; height:100%;"> 
                <h2><b>To Reciever : Inquiry 1</b></h2>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>           
            </div>
            <div class="container" style="width: 95%; height:100%;"> 
                <h2><b>To Reciever : Inquiry 2</b></h2>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>           
            </div>
            <div class="container" style="width: 95%; height:100%;"> 
                <h2><b>To Reciever : Inquiry 33</b></h2>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>           
            </div>
            <div class="container" style="width: 95%; height:100%;"> 
                <h2><b>To Reciever : Inquiry 4</b></h2>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>           
            </div>
            <div class="container" style="width: 95%; height:100%;"> 
                <h2><b>To Reciever : Inquiry 5</b></h2>
                <hr>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>           
            </div>
		
	</div>



		
		</div>
		<div id="page2" class="page">
		<div class="card" style="width: 90%; height:100%;">
    <?php
    if(mysqli_num_rows($res) == 0){ 
         ?>
					 <h2><b>No Sent Inquiries</b></h2>
					 <img src="../../images/message.png">
        <?php
           } else{
		while($row=mysqli_fetch_assoc($res)){
			?>
			<div class="container" style="width: 95%; height:100%;"> 
				
			<h2><b><?php echo "To :" .$row['reciever']?></b></h2>
			<hr>
            <h2><b><?php echo "Title :" . $row['title'] ?></b></h2>
            <p> <?php echo $row['message'] ?></p>
			<?php echo " <button type='submit' class='search'><a href=AddInquiery.php?userID=".$row['reciever']." >Reply</a></button>"?>
        </div>
        <?php }}
        ?>
        
           
        </div>

		</div>
	</div>
			
		</div>
	</div>

	</div>
</div>
		 
	
	</div>	
	<script>
		var page1 = document.getElementById("page4");
		var page2 = document.getElementById("page2");
		var button1 = document.getElementById("button1");
		var button2 = document.getElementById("button2");
		
		let url = window.location.href;
		if(url == "http://localhost/CL-GEN/public/parent/inquiries.php"){
			page1.style.display = "none";
			page2.style.display = "block";
			button1.style.color= "#000";
			button2.style.color= "#008080";
			
		}else if(url == "http://localhost/CL-GEN/public/admin/newsfeed.php?loggedin"){
			page1.style.display = "block";
			page2.style.display = "none";
			button1.style.color= "#008080";
			button2.style.color= "#000";
		}

		function RECIEVED(){
			page1.style.display = "block";
			page2.style.display = "none";
			button1.style.color= "#008080";
			button2.style.color= "#000";
			
		}

		function SENT(){
			page1.style.display = "none";
			page2.style.display = "block";
			button1.style.color= "#000";
			button2.style.color= "#008080";
		}
	</script>	
			


		
</body>
</html>

	<?php } ?>