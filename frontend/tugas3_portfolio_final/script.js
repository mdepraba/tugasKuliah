document.addEventListener('DOMContentLoaded', function() {
    var home = document.querySelector('.home');
    var image = document.querySelector('.home .content img');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 60) {
            document.body.classList.add('scrolled');
            image.classList.add('fade-out');
            image.classList.remove('fade-out');
        } else {
            document.body.classList.remove('scrolled');
            image.classList.add('fade-out');
            image.classList.remove('fade-out');
        }
    });
});
