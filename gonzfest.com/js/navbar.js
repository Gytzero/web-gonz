// NAVIGATION BAR STYLESHEET

// Mobile topnav scaling
function Scale() {
	var x = document.getElementById("Topnav");
	if (x.className === "navbar") {
			x.className += " responsive";
	} else {
			x.className = "navbar";
	}
	var DRP = document.getElementById("Dropdown");
	if (DRP.style.display = "block"){
		DRP.style.display = "none";
	}
}


// When the user clicks on the button, toggle between hiding and showing the dropdown content 
function dropFunction() {
	var vis = document.getElementById("Dropdown")
	if (vis.style.display === "none") {
		vis.style.display = "block";
	} else{
		// Problem 1 line below
		vis.style.display = "none";
	}
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
	if (!event.target.matches('.dropbtn')) {
		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.style.display = "block"){
				openDropdown.style.display = "none";
			}
		}
	}
}


// Hide navbar when scrolling 
var prevScrollpos = window.pageYOffset;
window.onscroll = function(){
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementsByClassName('navbar')[0].style.top = "0";
  } else {
    document.getElementsByClassName('navbar')[0].style.top = "-500px";
    document.getElementsByClassName('dropdown-content')[0].removeAttribute("display");
  }
  prevScrollpos = currentScrollPos;
}