
// sticky navbar
window.onscroll = function() {
    stickyBar();
};

var navbar = document.getElementById("navbar");
var sideBar = document.getElementById("side");
var sticky = 50;

function stickyBar() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }

  if (window.pageYOffset >= 50) {
    sideBar.classList.add("sticky1")
  } else {
    sideBar.classList.remove("sticky1");
  }

}

