const galleryImages = document.querySelectorAll(".gallery-img");
const overlay = document.getElementById("imageOverlay");
const overlayImg = document.getElementById("overlayImage");

galleryImages.forEach(img => {
  img.addEventListener("click", () => {
    overlayImg.src = img.src;
    overlay.classList.remove("hidden");
    overlay.classList.add("flex");
  });
});

// Overlay schließen
overlay.addEventListener("click", () => {
  overlay.classList.add("hidden");
  overlay.classList.remove("flex");
});
