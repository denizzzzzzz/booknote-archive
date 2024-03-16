document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden'); // Show/hide the mobile menu
    });
});
