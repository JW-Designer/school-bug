import './style.scss';  // or './style.css' if using plain CSS
import 'aos/dist/aos.css'; // Import AOS CSS

document.addEventListener("DOMContentLoaded", function() {
    AOS.init({
        once: true,
        offset: 200,
        duration: 1000,
    });
});
