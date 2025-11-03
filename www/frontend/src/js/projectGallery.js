let galleryItems = document.querySelectorAll(".gallery-item");
let projectGallery = document.getElementById("projectGallery");

let categoryColors = {
  // category color
  web: "sky-500",
  design: "orange-500",
  photo: "emerald-500",
};

fetch("../backend/projectGallery.php")
  .then((res) => res.json())
  .then((projects) => {
    projects.forEach((project) => {
      let color = categoryColors[project.category] || "gray-500";
      let div = document.createElement("div");
      div.className =
        "gallery-item";

      div.dataset.category = project.category;

      div.innerHTML = `
            <div
              id="${project.id}"
              class="flex flex-col flex-wrap rounded-2xl h-full w-[300px] gallery-item"
              data-category="${project.category}"
            >
              <img
                src="${project.image}"
                alt="${project.title}"
                class="rounded-2xl w-[300px] h-[300px] object-cover scale-100 hover:scale-105 duration-300 ease-in-out"
              />
              <h4 class="mt-2 text-center">${project.title}</h4>
              <p class="text-center text-center break-words ">
                ${project.description}
              </p>
              <ul class="flex flex-row justify-center gap-5 mt-5">
                <li
                  class="px-2 border-2 border-${color} rounded-2xl min-w-12 text-${color} text-center scale-100 hover:scale-105 duration-300 ease-in-out"
                >
                  ${project.areas}
                </li>
              </ul>
      `;
      projectGallery.appendChild(div);
    });
  });
