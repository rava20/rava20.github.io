document.addEventListener('DOMContentLoaded', function () {
    const loginBtn = document.querySelector('.login-btn-header');
    if (loginBtn) {
        loginBtn.addEventListener('click', function() {
            window.location.href = 'login.html';
        });
    }

    const toggleButton = document.getElementById('toggleButton');
    const body = document.body;

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('night-mode');
        toggleButton.textContent = body.classList.contains('night-mode') ? 'Ubah ke Light Mode' : 'Ubah ke Night Mode';
    });

    const hamburger = document.getElementById('hamburger');
    const navbarLinks = document.getElementById('navbar-links');

    hamburger.addEventListener('click', () => {
        
        navbarLinks.classList.toggle('active');
    });
});
