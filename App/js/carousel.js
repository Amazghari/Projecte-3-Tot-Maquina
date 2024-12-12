
const track = document.getElementById("carousel-track");
const items = document.querySelectorAll(".carousel-item");
const itemWidth = items[0].offsetWidth;
let currentIndex = 1;

// Desplazamiento automático
const interval = 3000; // 1 segundo
setInterval(() => {
  currentIndex = (currentIndex + 2) % items.length;
  track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
}, interval);