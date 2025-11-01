let formAddProject = document.querySelector("#formAddProject");
let resultAdd = document.querySelector("#resultAdd");

formAddProject.addEventListener("submit", (event) => {
  event.preventDefault();

  fetch("../backend/addproject.php", {
    method: "POST",
    body: new FormData(formAddProject),
  })
    .then((res) => {
      if (!res.ok) throw new Error("Serverfehler: " + res.status);
      return res.json();
    })
    .then((project) => {
      if (project.error) {
        resultAdd.innerHTML = "Fehler: " + project.error;
        return;
      }
      let tbody = document.querySelector("tbody");
      let tr = document.createElement("tr");
      tr.className = "shadow-sm" ;

      tr.innerHTML = `
      <td class="px-2 py-2 whitespace-nowrap">${project.id}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.title}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.description}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.image}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.category}</td>
      <td class="px-2 py-2 whitespace-nowrap">${project.areas}</td>
      <td class="py-2 whitespace-nowrap">
        <button class="flex items-center gap-2 py-1 text-gray-900 cursor-pointer" >
          <img src="../frontend/src/images/admin/Icons-edit-orange.png" class="w-[20px]">
          Bearbeiten
        </button>
      </td>
      <td class="px-6 py-6 text-start whitespace-nowrap">
        <button class="flex items-center gap-2 py-1 text-gray-900 cursor-pointer deleteBtn" data-id="${project.id}">
          <img src="../frontend/src/images/admin/Icons-delete-red.png" alt="" class="w-[20px]">
            Löschen
        </button>
      </td>
    `;
      tbody.appendChild(tr);
      toggleModal(false);
      event.target.reset();
    })
    .catch((err) => {
      console.error(err);
      resultAdd.innerHTML = "Fehler: " + err.message;
    });
});
