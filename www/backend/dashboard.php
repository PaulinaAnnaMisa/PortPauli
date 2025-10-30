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
  class="flex md:flex-row flex-col justify-between bg-gray-100 m-0 p-0 w-full">
  <!--Navigation-->
  <aside
    id="navBar"
    class="z-100 fixed flex flex-col justify-between items-center bg-gray-50 w-[200px] h-screen min-h-screen">
    <a href="home.html" class="">
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
  <section id="adminContent" class="flex flex-col flex-1 mr-[200px] ml-[200px]">


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
        <div class="flex justify-between items-center">
          <h3 class="">Projektverwaltung</h3>
          <button id="btnAdd" class="flex gap-2 p-2 cursor-pointer" onclick="toggleModal(true)">
            <img src="/../frontend/src/images/admin/Icons-add-emerald.png" alt="" class="w-[20px] object-cover">Neues Projekt
          </button>
        </div>
        <!-- Modal-Hintergrund -->
        <div id="popupNewProject" class="z-50 fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 w-1/2">
          <!-- Modal-Inhalt -->
          <div class="relative bg-white shadow-lg p-6 rounded-2xl max-w-md">
            <h2 class="mb-4 font-semibold text-xl">Projekt erstellen</h2>
            <p class="mb-4 text-gray-600">Gib den Namen deines neuen Projekts ein:</p>

            <input
              type="text"
              class="mb-4 p-2 border border-gray-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-500 w-full"
              placeholder="Projektname" />

            <div class="flex justify-end gap-3">
              <button
                onclick="toggleModal(false)"
                class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg">
                Abbrechen
              </button>
              <button
                onclick="alert('Projekt gespeichert!'); toggleModal(false)"
                class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg text-white">
                Speichern
              </button>
            </div>

            <!-- Schließen-Button (oben rechts) -->
            <button
              onclick="toggleModal(false)"
              class="top-3 right-3 absolute text-gray-400 hover:text-gray-600">
              ✕
            </button>
          </div>
        </div>

        <div id="projectsM" class="mt-10">
          <div class="w-[50vw] h-[50vh] overflow-x-auto">
            <table class="w-full border-separate border-spacing-y-4 table-auto">
              <!-- Header -->
              <thead class="bg-gray-100 py-5 pl-5 text-start">
                <tr class="">
                  <th class="px-2 py-2 font-medium text-gray-500 text-start">Projektname</th>
                  <th class="font-medium text-gray-500 text-start">Kategorie</th>
                  <th class="font-medium text-gray-500 text-start">Bearbeiten</th>
                  <th class="font-medium text-gray-500 text-start">Löschen</th>
                </tr>
              </thead>
              <!-- Body -->
              <tbody class="pl-5">
                <tr class="hover:bg-gray-50 shadow-sm">
                  <td class="px-2 py-2 whitespace-nowrap">Freitagsidee</td>
                  <td class="py-2 whitespace-nowrap">Webentwicklung</td>
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
                <tr class="hover:bg-gray-50 shadow-sm rounded-lg">
                  <td class="px-2 py-2 text-start whitespace-nowrap">Logo</td>
                  <td class="py-2 text-start whitespace-nowrap">Design</td>
                  <td class="py-2 py-6 text-start whitespace-nowrap">
                    <!-- Bearbeiten Button -->
                    <button class="flex items-center gap-2 hover:bg-blue-600 py-1 text-gray-900 cursor-pointer">
                      <img src="../frontend/src/images/admin/Icons-edit-orange.png" alt="" class="w-[20px]">
                      Bearbeiten
                    </button>
                  </td>
                  <td class="py-2 text-start whitespace-nowrap">
                    <!-- Löschen Button -->
                    <button class="flex items-start gap-2 ml-2 py-1 text-gray-900 cursor-pointer">
                      <img src="../frontend/src/images/admin/Icons-delete-red.png" alt="" class="w-[20px]">
                      Löschen
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </div>
        <!--
<hr>
<section id="projectM1" class="flex pt-5 pb-5">
<div id="projectTitle">
<p class=""><strong> ${name}</strong></p>
</div>
<div id="projectCategory">
<p class=""><strong> ${Kategorie}</strong></p>
</div>
<div id="projectEdit">
<button id="btnEdit">
<img src="../frontend/src/images/admin/Icons-edit-orange.png" alt="" class="w-[10px] h-[10px]">
</button>
</div>
<div id="projectDelete">
<button id="btnDelete">
<img src="../frontend/src/images/admin/Icons-delete-red.png" alt="" class="w-[10px] h-[10px]">
</button>
</div>
</section>
<hr class="bg-gray-100">
</div>-->
        <!--Upload
<section id="projectsupload">
<p class="mt-5 mb-10">Hier kannst du deine Datei hochladen</p>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="file" name="fileToUpload" id="fileToUpload">
<input type="submit" value="Datei hochladen" name="submit">
</form>
</section>-->
      </section>
    </main>
  </section>
  <!-- Container for orbs (behind the content) -->
  <div id="orbs" aria-hidden="true" class="-z-10 absolute inset-0">
    <div id="circle-3d"></div>
  </div>
  <!--JavaScripts-->
  <script src="../frontend/src/js/animation.js"></script>
  <script src="../frontend/src/js/darkmode.js"></script>
  <script src="../frontend/src/js/stats.js"></script>
</body>

</html>