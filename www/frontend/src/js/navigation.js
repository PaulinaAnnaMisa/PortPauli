let dropdown = document.getElementById("dropdown");
let burgerBtn = document.getElementById("burgerBtn");

burgerBtn.addEventListener("click", () => {
  dropdown.classList.toggle("hidden"); 
  
  let expanded = burgerBtn.getAttribute("aria-expanded") === "true";
  burgerBtn.setAttribute("aria-expanded", !expanded);
});

// options default values
let options = {
    placement: "bottom",
    triggerType: "click",
    offsetSkidding: 0,
    offsetDistance: 10,
    delay: 300,
    ignoreClickOutsideClass: false,
    onHide: () => {
        console.log("dropdown has been hidden");
    },
    onShow: () => {
        console.log("dropdown has been shown");
    },
    onToggle: () => {
        console.log("dropdown has been toggled");
    },
};

// instance options object
let instanceOptions = {
  id: "dropdown",
  override: true
};