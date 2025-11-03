let formEditProject = document.querySelector("#formEditProject");
let resultEdit = document.querySelector("#resultEdit");



document.addEventListener("click", (event) => {
  let btn = event.target.closest(".editBtn");
  if (!btn) return;


  let tr = btn.closest("tr");
  let id = tr.children[0].textContent.trim();
  let title = tr.children[1].textContent.trim();
  let description = tr.children[2].textContent.trim();
  let image = tr.children[3].textContent.trim();
  let category = tr.children[4].textContent.trim();
  let areas = tr.children[5].textContent.trim();

  document.querySelector("#overlayEdit").classList.remove("hidden");
  document.querySelector("#popupEditProject").classList.remove("hidden");

  formEditProject.querySelector("[name='id']").value = id;
  formEditProject.querySelector("[name='title']").value = title;
  formEditProject.querySelector("[name='description']").value = description;
  formEditProject.querySelector("[name='image']").value = image;
  formEditProject.querySelector("[name='category']").value = category;
  formEditProject.querySelector("[name='areas']").value = areas;
});

formEditProject.addEventListener("submit", (event) => {
  event.preventDefault();

  fetch("../backend/editproject.php", {
    method: "POST",
    body: new FormData(formEditProject),
  })
    .then((res) => res.json())
    .then((project) => {
      if (project.error) {
        resultEdit.textContent = "Fehler: " + project.error;
        return;
      }

      if (project.success) {
        let tr = document
          .querySelector(`button[data-id='${project.id}']`)
          .closest("tr");

        tr.children[1].textContent = project.title;
        tr.children[2].textContent = project.description;
        tr.children[3].textContent = project.image;
        tr.children[4].textContent = project.category;
        tr.children[5].textContent = project.areas;

        alert("Projekt erfolgreich aktualisiert!");

        document.querySelector("#overlayEdit").classList.add("hidden");
        document.querySelector("#popupEditProject").classList.add("hidden");
      }
    })
    .catch((err) => {
      console.error("Fehler beim Update:", err);
      resultEdit.textContent = "Serverfehler beim Aktualisieren.";
    });
});
