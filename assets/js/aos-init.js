// aos-init.js
document.addEventListener('DOMContentLoaded', function () {
    AOS.init({
        duration: 800, // Animation duration
        offset: 120,   // Offset (in px) from the original trigger point
        easing: 'ease-in-out', // Easing type
        once: true, // Whether animation should happen only once
    });
});