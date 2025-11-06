document.addEventListener("click", (event) => {

  let btn = event.target.closest(".deleteBtn");
  //console.log("Element geklickt:", event.target);
  if (!btn) return;

  let projectId = btn.getAttribute("data-id");
  //console.log("Projekt-ID:", projectId); 

  if (!projectId) {
    console.error("Keine Projekt-ID gefunden.");
    return;
  }

  //confirm
  if (!confirm("Bist du sicher, dass du dieses Projekt löschen möchtest?")) {
    return; 
  }

  fetch("../backend/deleteproject.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `id=${encodeURIComponent(projectId)}`,
  })
    .then((res) => res.json())
    .then((project) => {

      if (project.success) {
        let tr = btn.closest("tr");
        if (tr) tr.remove();
        alert("Projekt erfolgreich gelöscht!");

      } else {
        alert("Fehler: " + (project.error || "Löschen fehlgeschlagen"));
      }
    })
    .catch((err) => {
      console.error("Fehler beim Löschen:", err);
      alert("Serverfehler beim Löschen des Projekts.");
    });
});
