let currentSlide = 0;
const slides = document.querySelectorAll('.carousel-item');
const totalSlides = slides.length;

function changeSlide(n) {
  currentSlide = (currentSlide + n + totalSlides) % totalSlides;
  updateCarousel();
}

function updateCarousel() {
  slides.forEach((slide, index) => {
    slide.style.transform = `translateX(${100 * (index - currentSlide)}%)`;
  });
}
