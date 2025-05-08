/* Navbar */

document.querySelectorAll('.nav-link').forEach(link => {
    if(link.href === window.location.href ) {
        link.classList.add('active');
    }
});

document.addEventListener('scroll', function() {
    const navbar = document.getElementById('Navbar');
    if (window.scrollY > 50) {
        navbar.style.backgroundColor = 'rgba(255,255,255,0.95)';
        navbar.style.boxShadow  = '0 2px 10px rgba(0, 0, 0, 0.1)'
    } else {
        navbar.style.backgroundColor = '#fff'
        navbar.style.boxShadow = 'none'
    }
});

