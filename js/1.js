let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide() {
      slides.forEach((slide, index) => {
        slide.style.transform = `translateX(-${currentSlide * 100}%)`;
      });
    }

    function prevSlide() {
      currentSlide = Math.max(0, currentSlide - 1);
      showSlide();
    }

    function nextSlide() {
      currentSlide = Math.min(slides.length - 1, currentSlide + 1);
      showSlide();
    }

    setInterval(function () {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide();
      }, 5000);

      document.getElementById('loginForm').addEventListener('submit', function (event) {
      });

       // JavaScript to show/hide the "Back to Top" button
       window.onscroll = function() {
        var backToTopButton = document.getElementById('backToTop');
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    };

    // JavaScript to scroll to the top when the "Back to Top" link is clicked
    document.getElementById('backToTop').addEventListener('click', function(e) {
        e.preventDefault();
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    });