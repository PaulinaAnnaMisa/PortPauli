let tbody = document.querySelector("#tbody");
let tr = document.createElement("tr");

document.addEventListener("DOMContentLoaded", () => {
  loadProjects();
});

function loadProjects() {
  fetch("../backend/getprojects.php")
    .then((res) => res.json())
    .then((projects) => {
      tbody.innerHTML = ""; // delete
      
      projects.forEach((project) => {
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
      });
    })
    .catch((err) => console.error("Fehler beim Laden der Projekte:", err));
}
