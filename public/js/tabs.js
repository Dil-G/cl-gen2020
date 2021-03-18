
window.onload = function() {
    let url = window.location.href;
    if (url == window.location.href) {
        document.getElementById("page1").style.display = "block";
        document.getElementById("page2").style.display = "none";
        document.getElementById("button1").style.color = "#008080";
        document.getElementById("button2").style.color = "#000";

    }
}

    function activated() {
        document.getElementById("page1").style.display = "block";
        document.getElementById("page2").style.display = "none";
        document.getElementById("button1").style.color = "#008080";
        document.getElementById("button2").style.color = "#000";

    }

    function notActivated() {
        document.getElementById("page1").style.display = "none";
        document.getElementById("page2").style.display = "block";
        document.getElementById("button1").style.color = "#000";
        document.getElementById("button2").style.color = "#008080";
    }
