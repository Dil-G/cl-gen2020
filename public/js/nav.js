$(function(){
		$("#nav").load(navFunction());
		$("#nav1").load(navFunction2());
		$("#nav2").load(navFunction3());
		$("#nav3").load(navFunction4());
		$("#officeNav").load(navFunction5());
		$("#teacherNav").load(navFunction6());
		$("#footer").load(footFunction3());
});

function navFunction() {
	return "nav.php";
}

function navFunction3() {
	return "nav2.php";
}

function navFunction2() {
	return "navParent.php";
}
function navFunction4() {
	return "nav3.html";
}

function navFunction5() {
	return "office_nav.php";
}

function navFunction6() {
	return "nav5.php";
}


function footFunction3() {
	return "../common/footer.html";
}



function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
}
  
function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
}

function openWinCharacter() {
	window.open("../js/character c.pdf");
  }
function openWinLeaving(){
	window.open("../js/leaving c.pdf");
}
function goBack() {
	window.history.back();
}
