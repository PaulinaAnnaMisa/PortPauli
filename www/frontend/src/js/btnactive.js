/*let btnAll = document.querySelectorAll("#btnAll");
let btnWeb = document.querySelectorAll("#btnWeb");
let btnDesign = document.querySelectorAll("#btnDesign");
let btnPhoto = document.querySelectorAll("#btnPhoto");

btnAll.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.remove("border-gray-300", "text-gray-900");
    btn.classList.add("border-violet-500", "text-violet-500");
  });
});

btnWeb.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.remove("border-gray-300", "text-gray-900");
    btn.classList.add("border-sky-500", "text-sky-500");
  });
});

btnDesign.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.remove("border-gray-300", "text-gray-900");
    btn.classList.add("border-orange-500", "text-orange-500");
  });
});

btnPhoto.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.remove("border-gray-300", "text-gray-900");
    btn.classList.add("border-emerald-500", "text-emerald-500");
  });
});#*/

let tabs = document.querySelectorAll(".tab-btn");
let galleryItems = document.querySelectorAll(".gallery-item");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    let category = tab.dataset.category;
    let color = tab.dataset.color;

    // Alle Buttons zurücksetzen
    tabs.forEach((t) => {
      t.classList.remove(
        `border-${t.dataset.color}`,
        `text-${t.dataset.color}`
      );
      t.classList.add("border-gray-300", "text-gray-900");
    });

    // Angeclickten Button aktiv setzen
    tab.classList.remove("border-gray-300", "text-gray-900");
    tab.classList.add(`border-${color}`, `text-${color}`);

    // Galerie filtern
    galleryItems.forEach((item) => {
      if (category === "all" || item.dataset.category === category) {
        item.classList.remove("hidden");
        item.classList.add("opacity-100", "translate-y-0");
      } else {
        item.classList.add("hidden");
        item.classList.remove("opacity-100", "translate-y-0");
      }
    });
  });
});
