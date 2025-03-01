import AOS from 'aos';
import 'aos/dist/aos.css';

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        once: true, // Ensures animations only happen once
        duration: 800, // Adjust animation speed (milliseconds)
        easing: 'ease-in-out', // Smooth animations
    });
});