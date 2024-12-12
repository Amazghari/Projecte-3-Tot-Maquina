<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="main.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="overflow-hidden relative w-full">
  <!-- Track del carrusel -->
  <div id="carousel-track" class="flex w-max transition-all duration-700 ease-in-out">
    <div id="churreria" class="flex w-max transition-all duration-700 ease-in-out">
    <!-- Elementos del carrusel -->
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/amazon.png" alt="amazon" class="h-20 w-auto">
    </div>

    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/churreria.png" alt="churreria" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/ministerio.png" alt="ministerio" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/santoscustoms.png" alt="santoscustoms" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/kebab.jpg" alt="kebab" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/images.jpeg" alt="peluqueria" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/grow.png" alt="santoscustoms" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/ardidas.jpeg" alt="santoscustoms" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/ardidas.jpeg" alt="santoscustoms" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/peluqueria.jfif" alt="peluqueria" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/peluqueria.jfif" alt="peluqueria" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/peluqueria.jfif" alt="peluqueria" class="h-20 w-auto">
    </div>
    <div class="carousel-item flex-shrink-0 w-auto flex items-center justify-center text-white">
      <img src="/uploads/img-slider/peluqueria.jfif" alt="peluqueria" class="h-20 w-auto">
    </div>
    
    
    </div>
  </div>
</div>

</body>
</html>

<script>
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
</script>





