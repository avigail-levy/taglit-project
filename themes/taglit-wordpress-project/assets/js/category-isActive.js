document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.category-nav__link');

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            navLinks.forEach(item => item.classList.remove('is-active'));
            this.classList.add('is-active');
        });
    });
});