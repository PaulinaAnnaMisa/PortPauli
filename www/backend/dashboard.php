<?php
session_start();
// Überprüfe, ob der Benutzer bereits angemeldet ist
if (!isset($_SESSION["login_id"])) {
  header("Location: ../frontend/login.html");
  exit();
}
?>
<!DOCTYPE html>
<html lang="de" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="admin" content="Admin Bereich" />
  <link href="../frontend/src/css/output.css" rel="stylesheet" />
  <title>Admin Dashboard</title>
</head>

<body
  class="bg-gray-100 m-0 p-0 w-full">
  <!--Navigation-->
  <aside
    id="navBar"
    class="top-0 left-0 z-50 fixed flex flex-col justify-between items-center bg-gray-50 w-[200px] h-screen">
    <a href="../frontend/home.html" class="">
      <h3 class="mt-5 text-violet-500 text-2xl text-center">Port Pauli</h3>
    </a>
    <!--Navigation -->
    <nav id="nav" class="flex flex-col items-start">
      <ul
        id="navLinks"
        class="flex flex-col justify-center items-start gap-10 mt-10">
        <li
          class="flex flex-row justify-center items-center gap-2 text-gray-900 hover:text-violet-500 scale-100 hover:scale-105 duration-300 ease-in-out">
          <img
            src="../frontend/src/images/nav/Icon_home.png"
            alt="Icon Home"
            class="justify-center w-[20px] h-[20px]" />
          <a href="../frontend/home.html" class="relative focus:outline-none">Home</a>
          <span
            class="-bottom-1 left-0 absolute bg-violet-500 w-0 focus:w-full h-0.5 transition-all duration-300"></span>
        </li>
        <li
          class="flex flex-row justify-center items-center gap-2 text-gray-900 hover:text-violet-500 scale-100 hover:scale-105 duration-300 ease-in-out">
          <img
            src="../frontend/src/images/nav/Icon_skills.png"
            alt="Icon Home"
            class="justify-center w-[20px] h-[20px]" />
          <a href="../frontend/home.html#portSkills">Skills</a>
        </li>
        <li
          class="flex flex-row justify-center items-center gap-2 text-gray-900 hover:text-violet-500 scale-100 hover:scale-105 duration-300 ease-in-out">
          <img
            src="../frontend/src/images/nav/Icon_projects.png"
            alt="Icon Home"
            class="w-[20px] h-[20px]" />
          <a href="../frontend/home.html#portProjectsBox">Projekte</a>
        </li>
        <li
          class="flex flex-row justify-center items-center gap-2 text-gray-900 hover:text-violet-500 scale-100 hover:scale-105 duration-300 ease-in-out">
          <img
            src="../frontend/src/images/nav/Icon_about.png"
            alt="Icon Home"
            class="w-[20px] h-[20px]" />
          <a href="../frontend/about.html">Über mich</a>
        </li>
        <li
          class="flex flex-row justify-center items-center gap-2 text-gray-900 hover:text-violet-500 scale-100 hover:scale-105 duration-300 ease-in-out">
          <img
            src="../frontend/src/images/nav/Icon_contact.png"
            alt="Icon Home"
            class="w-[20px] h-[20px]" />
          <a href="../frontend/contact.html">Kontakt</a>
        </li>
        <li
          class="flex flex-row justify-center items-center gap-2 text-gray-900 hover:text-violet-500 scale-100 hover:scale-105 duration-300 ease-in-out">
          <img
            src="../frontend/src/images/nav/Icon_logout.png"
            alt="Icon Home"
            class="w-[20px] h-[20px]" />
          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    <!--Theme Toggle -->
    <div id="themeToggle" class="flex flex-end justify-center mt-auto">
      <button id="themeToggleBtn">
        <img
          src="../frontend/src/images/darkmode/bright-sun.svg"
          alt="Dark Mode"
          id="darkIcon"
          class="mb-4 w-[50px] h-[50px] object-cover scale-100 hover:scale-105 duration-300 ease-in-out cursor-pointer" />
        <img
          src="../frontend/src/images/darkmode/dark-sun.svg"
          alt=""
          id="Light Mode"
          style="display: none"
          class="mb-4 w-[50px] h-[50px] object-cover scale-100 hover:scale-105 duration-300 ease-in-out" />
      </button>
    </div>
  </aside>

  <!--Content-->
  <section id="adminContent" class="z-0 relative flex flex-col flex-1 ml-[200px]">

    <!-- Header-->
    <header
      id="adminHeader"
      class="flex justify-between items-center my-10 px-20">
      <div id="headerText"
        class="flex flex-col">
        <h3 class="text-gray-500">Willkommen Pauli!</h3>
        <h1 class="text-violet-500">Dashboard</h1>
      </div>
      <div id="avatar" class="flex-shrink-0 w-[50px] h-[50px]">
        <img src="../frontend/src/images/start/Paulina_Anna_Misa_840x840px.png" alt="Bild von Pauli" class="bg-orange-500 shadow-lg p-2 rounded-full scale-100 hover:scale-105 duration-300 ease-in-out">
      </div>
    </header>
    <!-- Main-->
    <main class="flex flex-col m-0 p-0 min-h-screen">

      <!-- Project Menagement-->
      <section id="projectManagement" class="flex flex-col justify-start bg-white shadow-lg backdrop-blur-md ml-10 p-20">
        <div class="flex justify-between items-center text-gray-900">
          <h3 class="">Projektverwaltung</h3>
          <button id="btnAdd" class="flex gap-2 p-2 cursor-pointer" onclick="toggleModal(true)">
            <img src="/../frontend/src/images/admin/Icons-add-emerald.png" alt="" class="w-[20px] object-cover">Neues Projekt
          </button>
        </div>

        <div id="projectsM" class="mt-10">
          <div class="w-[50vw] h-[50vh] overflow-x-auto">
            <table class="w-full border-separate border-spacing-y-4 table-auto">
              <!-- Header -->
              <thead class="bg-gray-100 py-5 pl-5 text-start">
                <tr class="">
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">ID</th>
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">Titel</th>
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">Beschreibung</th>
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">Bild-URL</th>
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">Kategorie</th>
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">Bereiche</th>
                  <th class="font-medium text-gray-500 text-start">Bearbeiten</th>
                  <th class="font-medium text-gray-500 text-start">Löschen</th>
                </tr>
              </thead>
              <!-- Body -->
              <tbody id="tbody" class="pl-5">
                <tr class="shadow-sm">
                  <td class="px-2 py-2 whitespace-nowrap">1</td>
                  <td class="px-2 py-2 whitespace-nowrap">Freitagsidee</td>
                  <td class="px-2 py-2 whitespace-nowrap">Ein fiktives Projekt, während der Weiterbildung</td>
                  <td class="px-2 py-2 whitespace-nowrap">./src/images/projects/netflix-idee.png</td>
                  <td class="px-2 py-2 whitespace-nowrap">Web Developer</td>
                  <td class="px-2 py-2 whitespace-nowrap">Frontend, Backend</td>
                  <td class="py-2 whitespace-nowrap">
                    <!-- Bearbeiten Button -->
                    <button class="flex items-center gap-2 py-1 text-gray-900 cursor-pointer">
                      <img src="../frontend/src/images/admin/Icons-edit-orange.png" alt="" class="w-[20px]">
                      Bearbeiten
                    </button>
                  </td>
                  <td class="px-6 py-6 text-start whitespace-nowrap">
                    <!-- Löschen Button -->
                    <button class="flex items-center gap-2 py-1 text-gray-900 cursor-pointer">
                      <img src="../frontend/src/images/admin/Icons-delete-red.png" alt="" class="w-[20px]">
                      Löschen
                    </button>
                  </td>
                </tr>
                <!-- Weitere Projekte -->
                <tr id="newProject" class="hidden shadow-sm"></tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
      </section>
    </main>
  </section>

  <!-- Modal -->
  <div
    id="popupNewProject"
    class="hidden z-50 fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 ml-[200px] p-4">

    <!-- Modal-Box -->
    <div class="relative bg-white shadow-xl p-20 rounded-2xl w-full max-w-xl">

      <!-- Close Button -->
      <button
        onclick="toggleModal(false)"
        class="justify-items-end text-gray-400 text-xl cursor-pointer">
        ✕
      </button>

      <!-- Content -->
      <h2 class="mb-4 font-semibold text-violet-500">Projekt erstellen</h2>
      <p class="mb-4 text-gray-600">Gib die Daten deines neuen Projekts ein:</p>

      <form
        action="../frontend/src/js/addproject.js"
        method="POST"
        id="formAddProject"
        class="flex flex-col gap-5">
        <input
          name="title"
          type="text"
          placeholder="Titel"
          class="p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-violet-500" />
        <input
          name="description"
          type="text"
          placeholder="Beschreibung"
          class="p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-violet-500" />
        <input
          name="image"
          type="text"
          placeholder="Image-URL"
          class="p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-violet-500" />
        <input
          name="category"
          type="text"
          placeholder="Kategorie"
          class="p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-violet-500" />
        <input
          name="areas"
          type="text"
          placeholder="Bereiche"
          class="mb-5 p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-violet-500" />
      </form>

      <!-- Buttons -->
      <div class="z-50 flex justify-end gap-10 mt-6">
        <button
          onclick="toggleModal(false)"
          class="hover:bg-gray-200 px-4 py-2 rounded-2xl text-gray-600 transition cursor-pointer">
          Abbrechen
        </button>
        <input type="submit"
          value="Speichern"
          onclick="event.preventDefault(); alert('Projekt gespeichert!'); toggleModal(false)"
          class="bg-violet-500 hover:bg-violet-600 px-4 py-2 rounded-2xl text-white transition cursor-pointer">
      </div>
    </div>
  </div>

  <!-- Container for orbs (behind the content) -->
  <div id="orbs" aria-hidden="true" class="-z-10 absolute inset-0">
    <div id="circle-3d"></div>
  </div>
  <!--JavaScripts-->
  <script src="../frontend/src/js/animation.js"></script>
  <script src="../frontend/src/js/popup.js"></script>
  <script src="../frontend/src/js/getprojects.js"></script>
  <script src="../frontend/src/js/addproject.js"></script>
</body>

</html>