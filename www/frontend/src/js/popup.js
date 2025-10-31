function toggleModal(show) {
    let popup = document.querySelector("#popupNewProject");
    let overlay = document.querySelector("#overlayAdd");
    
    if (show) {
      popup.classList.remove("hidden");
      overlay.classList.remove("hidden");
    } else {
      popup.classList.add("hidden");
      overlay.classList.add("hidden");
    }
  }