  function toggleModal(show) {
    let popup = document.querySelector("#popupNewProject");
    
    if (show) {
      popup.classList.remove("hidden");
    } else {
      popup.classList.add("hidden");
    }
  }