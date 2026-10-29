document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.gallery-slide');
    const prevButton = document.getElementById('galleryPrev');
    const nextButton = document.getElementById('galleryNext');

    if (!slides.length || !prevButton || !nextButton) {
        return;
    }

    let currentIndex = 2;

    function updateGallery() {

        slides.forEach((slide, index) => {

            slide.classList.remove(
                'active',
                'left',
                'right',
                'far-left',
                'far-right'
            );

            const position =
                (index - currentIndex + slides.length) % slides.length;

            if (position === 0) {
                slide.classList.add('active');
            } else if (position === 1) {
                slide.classList.add('right');
            } else if (position === slides.length - 1) {
                slide.classList.add('left');
            } else if (position === 2) {
                slide.classList.add('far-right');
            } else {
                slide.classList.add('far-left');
            }

        });

    }

    nextButton.addEventListener('click', function () {

        currentIndex =
            (currentIndex + 1) % slides.length;

        updateGallery();

    });

    prevButton.addEventListener('click', function () {

        currentIndex =
            (currentIndex - 1 + slides.length) % slides.length;

        updateGallery();

    });

    updateGallery();

    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function () {
            navMenu.classList.toggle('show');
        });
}

});