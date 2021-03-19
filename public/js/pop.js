
// var form1 = document.getElementById("edit-form");

// var formbtn = document.getElementById("request");

// var close1 = document.getElementsByClassName("close1")[0];


// formbtn.onclick = function() {
//   form1.style.display = "block";
// }

// function close() {
//   form1.style.display = "none";
// }

// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }


function openCharacterForm(){
  document.getElementById("character-form").style.display = "block";

}
function openLeavingForm(){
  document.getElementById("leaving-form").style.display = "block";

}

function closeCharacterForm(){
  document.getElementById("character-form").style.display = "none";
}

function closeLeavingForm(){
  document.getElementById("leaving-form").style.display = "none";
}



window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}