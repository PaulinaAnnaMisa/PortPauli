<?php
session_start();

// Überprüfe, ob der Benutzer bereits angemeldet ist
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: dashboard.php");
  exit;
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
  <section id="adminContent" class="flex flex-col flex-1 ml-[200px]">

    <!-- Header-->
    <header
      id="adminHeader"
      class="flex flex-col justify-start items-start my-10">
      <div
        id="headerText"
        class="flex flex-col justify-start items-start ml-20">
        <h3 class="text-gray-500">Willkommen Pauli!</h3>
        <h1 class="text-violet-500">Dashboard</h1>
      </div>
    </header>

    <!-- Main-->
    <main class="flex flex-col m-0 p-0 min-h-screen">

      <!-- Analyses-->
      <section
        id="analyses"
        class="flex justify-start items-start gap-10 bg-white/30 shadow-lg backdrop-blur-md ml-10 p-20 w-1/3">

        <!-- Arbeitgeber -->
        <div class="items-center bg-white shadow-lg p-6 border border-gray-200 rounded-2xl">
          <h3 class="mb-2 font-semibold text-gray-800 text-xl">Arbeitgeber Besucher</h3>
          <canvas id="employerChart" class=""></canvas>
        </div>

        <!-- Interessenten -->
        <div class="bg-white shadow-lg p-6 border border-gray-200 rounded-2xl">
          <h3 class="mb-2 font-semibold text-gray-800 text-xl">Interessenten Besucher</h3>
          <canvas id="interestChart"></canvas>
        </div>

      </section>

      <!-- Project Menagement-->
      <section
        id="projectManagement"
        class="flex flex-col justify-start items-start bg-white/30 shadow-lg backdrop-blur-md ml-10 p-20">
        <h3 class="">Projektverwaltung</h3>

        <section id="projectsupload">
          <p class="mt-5 mb-10">Hier kannst du deine Datei hochladen</p>

          <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Datei hochladen" name="submit">
          </form>
        </section>
      </section>
    </main>
  </section>

  <!-- Container for orbs (behind the content) -->
  <div id="orbs" aria-hidden="true" class="-z-10 absolute inset-0">
    <div id="circle-3d"></div>
  </div>

  <!--JavaScripts-->
  <script src="../frontend/src/js/animation.js"></script>
  <script src="../frontend/src/js/logos.js"></script>
  <script src="../frontend/src/js/darkmode.js"></script>
  <script src="../frontend/src/js/stats.js"></script>
</body>

</html>