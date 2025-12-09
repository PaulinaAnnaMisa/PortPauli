const navItems = document.querySelectorAll(".nav-item");

navItems.forEach(item => {
  const greyIcon = item.querySelector(".iconGrey");
  const violetIcon = item.querySelector(".iconViolet");

  item.addEventListener("mouseenter", () => {
    greyIcon.classList.add("hidden");
    greyIcon.classList.remove("flex");

    violetIcon.classList.remove("hidden");
    violetIcon.classList.add("flex");
  });

  item.addEventListener("mouseleave", () => {
    greyIcon.classList.remove("hidden");
    greyIcon.classList.add("flex");

    violetIcon.classList.add("hidden");
    violetIcon.classList.remove("flex");
  });
});
