let tabs = document.querySelectorAll(".tab-btn");
let galleryItems = document.querySelectorAll(".gallery-item");

tabs.forEach((tab) => {

  tab.addEventListener("click", () => {
    let category = tab.dataset.category;
    let color = tab.dataset.color;

    // buttons reset
    tabs.forEach((t) => {
      t.classList.remove(`border-${t.dataset.color}`, `text-${t.dataset.color}`);
      t.classList.add("border-gray-300", "text-gray-900");
    });

    // set button activ
    tab.classList.remove("border-gray-300", "text-gray-900");
    tab.classList.add(`border-${color}`, `text-${color}`);

    // filter gallery
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
