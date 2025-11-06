function toggleModal(show, type = 'add') {
  let popupAdd = document.querySelector("#popupNewProject");
  let overlayAdd = document.querySelector("#overlayAdd");
  let popupEdit = document.querySelector("#popupEditProject");
  let overlayEdit = document.querySelector("#overlayEdit");

  if (type === 'add') {
    popupAdd.classList.toggle("hidden", !show);
    overlayAdd.classList.toggle("hidden", !show);
  } else if (type === 'edit') {
    popupEdit.classList.toggle("hidden", !show);
    overlayEdit.classList.toggle("hidden", !show);
  }
}
// global
window.toggleModal = toggleModal;
