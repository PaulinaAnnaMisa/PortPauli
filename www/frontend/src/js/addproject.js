let formAddProject = document.querySelector("#formAddProject");

formAddProject.addEventListener("submit", async (event) => {
  event.preventDefault();

  console.log("Neues Projekt wird hinzugefügt ...");

  try {
    let response = await fetch("../backend/addproject.php", {
      method: "POST",
      body: new FormData(formAddProject),
    });

    // Prüfen, ob die Antwort OK ist
    if (!response.ok) {
      throw new Error("Fehler beim Server-Request");
    }

    const project = await response.json();

    if (project.error) {
      alert("Fehler: " + project.error);
      return;
    }

    // tbody holen (achte: in HTML muss ein <tbody> existieren!)
    let tbody = document.querySelector("tbody");
    let tr = document.createElement("tr");
    tr.className = "shadow-sm";

    tr.innerHTML = `
      <td class="px-2 py-2 whitespace-nowrap">${project.id}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.title}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.description}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.image}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.category}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.areas}</td>
      <td class="py-2 whitespace-nowrap">
        <button class="flex items-center gap-2 py-1 text-gray-900 cursor-pointer">
          <img src="../frontend/src/images/admin/Icons-edit-orange.png" class="w-[20px]">
          Bearbeiten
        </button>
      </td>
      <td class="px-6 py-6 text-start whitespace-nowrap">
        <button class="flex items-center gap-2 py-1 text-gray-900 cursor-pointer">
          <img src="../frontend/src/images/admin/Icons-delete-red.png" class="w-[20px]">
          Löschen
        </button>
      </td>
    `;

    tbody.appendChild(tr);
    toggleModal(false);
    formAddProject.reset();
  } catch (err) {
    console.error("Fehler:", err);
    alert("Es gab ein Problem beim Speichern des Projekts.");
  }
});
