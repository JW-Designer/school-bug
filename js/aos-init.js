document.addEventListener("DOMContentLoaded", function () {
    // Initialize AOS
    AOS.init({
        duration: 1000, // Animation duration in milliseconds
        easing: "ease-in-out", // Easing function for animations
        once: true, // Animation happens only once when scrolled into view
        mirror: false, // Whether elements should animate out when scrolling past them
        anchorPlacement: "top-bottom", // Defines which part of the element should be in view to trigger animation
    });

    // Debugging: Log AOS initialization to the console
    console.log("AOS initialized successfully");
});
