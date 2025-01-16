const slides = document.querySelectorAll(".carousel-item");
let currentIndex = 0;

document.getElementById("prev").addEventListener("click", () => {
  slides[currentIndex].classList.remove("translate-x-0");
  slides[currentIndex].classList.add("translate-x-full");

  currentIndex = (currentIndex - 1 + slides.length) % slides.length;

  slides[currentIndex].classList.remove("translate-x-[200%]");
  slides[currentIndex].classList.add("translate-x-0");
});

document.getElementById("next").addEventListener("click", () => {
  slides[currentIndex].classList.remove("translate-x-0");
  slides[currentIndex].classList.add("translate-x-[200%]");

  currentIndex = (currentIndex + 1) % slides.length;

  slides[currentIndex].classList.remove("translate-x-full");
  slides[currentIndex].classList.add("translate-x-0");
});
