<?php
session_start();

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
  <meta name="robots" content="noindex, nofollow" />
  <link href="../frontend/src/css/output.css" rel="stylesheet" />
  <title>Admin Dashboard</title>
</head>

<body
  class="bg-gray-100 m-0 p-0 w-full">

    <!--Navigation-->
    <aside
      id="navBar"
      class="hidden z-40 fixed md:flex flex-col justify-start items-center bg-gray-50 md:w-[200px] h-screen min-h-screen">
      <a href="../frontend/home.html" >
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
        </ul>
      </nav>
    </aside>

    <!--Navigation Mobile-->
    <div id="navMobile" class="md:hidden z-40 fixed flex w-full">
      <div
        id="navBarMobile"
        class="z-40 fixed flex justify-between items-center gap-10 bg-white/30 shadow-lg backdrop-blur-md p-4 w-full">
        <h3 class="text-violet-500 text-center">Port Pauli</h3>
        <button
          id="burgerBtn"
          data-dropdown-toggle="dropdown"
          class="inline-flex mt-5 mb-6"
          type="button">
          <img
            src="../frontend/src/images/nav/burgermenu_long.svg"
            alt="Burgermenu Navigation Mobile"
            class="w-[40px] cursor-pointer" />
        </button>
      </div>
      <!-- Dropdown menu -->
      <div
        id="dropdown"
        class="hidden z-50 fixed flex flex-col justify-between bg-gray-50 shadow-sm mt-20 rounded-lg w-full">
        <ul
          class="flex flex-col justify-between shadow-lg py-2 divide-y divide-gray-300 text-gray-900 text-center"
          aria-labelledby="dropdownDefaultButton">
          <li>
            <a href="../frontend/home.html" class="block p-2 px-4 hover:text-violet-500">Home</a>
          </li>
          <li>
            <a
              href="../frontend/home.html#portSkills"
              class="block px-4 py-2 hover:text-violet-500">Skills</a>
          </li>
          <li>
            <a
              href="../frontend/home.html#portProjectsBox"
              class="block px-4 py-2 hover:text-violet-500">Projekte</a>
          </li>
          <li>
            <a href="../frontend/about.html" class="block px-4 py-2 hover:text-violet-500">Über mich</a>
          </li>

          <li>
            <a href="../frontend/contact.html" class="block px-4 py-2 hover:text-violet-500">Kontakt</a>
          </li>
        </ul>
      </div>
    </div>

    <!--Content-->
    <section id="adminContent" class="relative flex flex-col flex-1 md:ml-[200px]">

      <!-- Header-->
      <header
        id="adminHeader"
        class="flex justify-between items-center my-40 lg:my-10 mb-10 px-20">
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
      <main class="z-0 flex flex-col m-0 p-0 min-h-screen">

        <!-- Project Menagement-->
        <section id="projectManagement" class="flex flex-col justify-start bg-white shadow-lg backdrop-blur-md p-20">

          <div class="flex lg:flex-row flex-col justify-between items-center text-gray-900">
            <h3 class="">Projektverwaltung</h3>
            <button id="btnAdd" class="flex gap-2 p-2 cursor-pointer" onclick="toggleModal(true)">
              <img src="/../frontend/src/images/admin/Icons-add-emerald.png" alt="Projekt Hinzufügen Button" class="w-[20px] object-cover">Neues Projekt
            </button>
          </div>

          <div id="projectsM" class="mt-10">
            <div class="overflow-x-auto">
              <table class="border-separate border-spacing-y-4 table-auto">
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
                  <!-- Weitere Projekte -->
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </section>
      </main>
    </section>

    <!-- Overlay Add -->
    <div id="overlayAdd" class="hidden z-40 fixed inset-0 flex justify-center items-center bg-black/50">

      <!-- Modal -->
      <div
        id="popupNewProject"
        class="hidden z-50 flex justify-center items-center p-4 xl:p-50 w-full">

        <!-- Modal-Box -->
        <div class="flex flex-col bg-white p-10 border border-gray-200 rounded-2xl w-3/4">

          <!-- Close Button -->
          <div id="closebutton" class="flex justify-end w-full text-end">
            <button
              onclick="toggleModal(false, 'add')"
              class="text-gray-400 cursor-pointer">
              Abbrechen
            </button>
          </div>

          <!-- Content -->
          <h2 class="mb-4 font-semibold text-violet-500">Projekt erstellen</h2>
          <p class="mb-4 text-gray-600">Gib die Daten deines Projekts ein:</p>

          <form
            method="POST"
            id="formAddProject"
            class="flex flex-col gap-5 mb-5">
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
            <input type="submit"
              value="Speichern"
              class="bg-violet-500 hover:bg-violet-600 px-4 py-2 rounded-2xl text-white transition cursor-pointer">
          </form>
          <div id="resultAdd"></div>
        </div>
      </div>
    </div>

    <!-- Overlay Edit-->
    <div id="overlayEdit" class="hidden z-40 fixed inset-0 flex justify-center items-center bg-black/50">

      <!-- Modal -->
      <div
        id="popupEditProject"
        class="hidden z-50 flex justify-center items-center p-4 xl:p-50 w-full">

        <!-- Modal-Box -->
        <div class="flex flex-col bg-white p-10 border border-gray-200 rounded-2xl w-3/4">

          <!-- Close Button -->
          <div id="closebuttonEdit" class="flex justify-end w-full text-end">
            <button
              onclick="toggleModal(false, 'edit')"
              class="text-gray-400 cursor-pointer">
              Abbrechen
            </button>
          </div>

          <!-- Content -->
          <h2 class="mb-4 font-semibold text-violet-500">Projekt erstellen</h2>
          <p class="mb-4 text-gray-600">Gib die Daten deines Projekts ein:</p>

          <form
            method="POST"
            id="formEditProject"
            class="flex flex-col gap-5 mb-5">
            <input type="hidden" name="id" class="p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-violet-500">
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
            <input type="submit"
              value="Speichern"
              class="bg-violet-500 hover:bg-violet-600 px-4 py-2 rounded-2xl text-white transition cursor-pointer">
          </form>
          <div id="resultEdit"></div>
        </div>
      </div>
    </div>



    <!-- Container for orbs (behind the content) -->
    <div id="orbs" aria-hidden="true" class="-z-10 absolute inset-0">
      <div id="circle-3d"></div>
    </div>
    <!--JavaScripts-->
    <script src="../frontend/src/js/animation.js"></script>
    <script src="../frontend/src/js/navigation.js"></script>
    <script src="../frontend/src/js/popup.js"></script>
    <script src="../frontend/src/js/getprojects.js"></script>
    <script src="../frontend/src/js/deleteproject.js"></script>
    <script src="../frontend/src/js/addproject.js"></script>
    <script src="../frontend/src/js/editproject.js"></script>
</body>

</html>