let banner = document.querySelector("#banner");
let bannerLogos = document.querySelector("#bannerLogos");
let x = 0;
let speed = 0.5;

// 1. Dupliziere Inhalte einmal für nahtlosen Loop
bannerLogos.innerHTML += bannerLogos.innerHTML;

// 2. Berechne Breite der Original-Reihe
let totalWidth = bannerLogos.scrollWidth / 2;

function animate() {
  x -= speed;

  // Wenn Hälfte der Reihe vorbei, zurücksetzen
  if (-x >= totalWidth) {
    x += firstWidth;               // sanft korrigieren
    bannerLogos.appendChild(first); // erstes Logo ans Ende hängen
  }

  bannerLogos.style.transform = `translateX(${x}px)`;
  requestAnimationFrame(animate);
}

animate();
