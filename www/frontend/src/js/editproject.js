document.addEventListener("click", (event) => {

  let btn = event.target.closest(".editBtn");
  //console.log("Element geklickt:", event.target);
  if (!btn) return;

  let projectId = btn.getAttribute("data-id");
  //console.log("Projekt-ID:", projectId); //debug

  // Prüfen, ob es der Edit-Button ist (z.B. über Klasse oder Icon)
  if (btn) {
    const tr = btn.closest("tr");
    const projectId = tr.querySelector("td:first-child").textContent;
    const title = tr.children[1].textContent;
    const description = tr.children[2].textContent;
    const image = tr.children[3].textContent;
    const category = tr.children[4].textContent;
    const areas = tr.children[5].textContent;

    // Modal öffnen
    toggleModal(true); // wie bei addProject

    // Formularfelder befüllen
    formAddProject.querySelector("[name='id']").value = projectId; // verstecktes Feld
    formAddProject.querySelector("[name='title']").value = title;
    formAddProject.querySelector("[name='description']").value = description;
    formAddProject.querySelector("[name='image']").value = image;
    formAddProject.querySelector("[name='category']").value = category;
    formAddProject.querySelector("[name='areas']").value = areas;

    // Eventuell Submit-Button-Text ändern
    formAddProject.querySelector("button[type='submit']").textContent =
      "Projekt speichern";
  }
});
