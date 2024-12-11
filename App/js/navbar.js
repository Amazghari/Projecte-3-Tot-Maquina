// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Feature to toggle menu visibility
    document.getElementById("hamburger-button").addEventListener("click", function() {
        const navbar = document.getElementById("navbar-default");
        navbar.classList.toggle("hidden"); // Toggle 'hidden' class to show/hide the menu
    });
});