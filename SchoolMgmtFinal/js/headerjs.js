$(document).ready(function() {
    // Add smooth scroll to navigation links
    $('nav ul li a, .mobile-nav ul li a').on('click', function(e) {
        if (this.hash !== "") {
            e.preventDefault();
            const hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {
                window.location.hash = hash;
            });
        }
    });

    // Fade in the header on load
    $('header').hide().fadeIn(1000);

    // Mobile Menu Toggle
    $('.hamburger').click(function() {
        $('.mobile-nav').slideToggle();
    });
});
