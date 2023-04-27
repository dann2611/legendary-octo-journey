const menu = document.querySelector("#mobile-menu") /*targets whats in the index using the id set */
const menuLinks = document.querySelector(".navbar__menu")

menu.addEventListener("click", function(){
    menu.classList.toggle("is-active");
    menuLinks.classList.toggle("active");
})

function login() {
    // Get the username and password from the form
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
  
    // Check if the username and password are valid
    if (username == "admin" && password == "password") {
      // If the username and password are correct, log the user in
      console.log("Logging in...");
    } else {
      // If the username and password are incorrect, display an error message
      console.log("Invalid username or password");
    }
  }

document.addEventListener("scroll", function() {
  var highlight = document.querySelector(".highlight");
  if (window.scrollY >= 750) {
    highlight.style.opacity = "1";

  } else {
    highlight.style.opacity = "0";
  }
});