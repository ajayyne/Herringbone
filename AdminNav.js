
document.getElementById("hamburger").addEventListener("click", function() {
   var sidebar = document.getElementById("sidebar");
   // toggle the sidebar to be visible/hidden
   sidebar.classList.toggle("active"); 
});

document.getElementById("close-btn").addEventListener("click", function() {
   var sidebar = document.getElementById("sidebar");
   //remove the active class to close sidebar
   sidebar.classList.remove("active"); 
});