let form = document.querySelector("#formContact");
let result = document.querySelector("#result");

form.addEventListener("submit", (event) => {
  event.preventDefault(); 

  result.style.display = "block";
  result.innerHTML = "Bitte warten...";

  console.log("Formular wird gesendet...");

  //fetch
  fetch("../backend/contact.php", {
    method: "POST",
    body: new FormData(form),
  })
    .then((response) => {
      if (response.ok) {
      return response.text(); }
      console.log(response);
    })
    .then((text) => {
      console.log("Antwort von API:", text);
      result.innerHTML = text;
      result.classList.add("!text-emerald-500");
    })
    .catch((error) => {
      console.error("Fehler:", error);
      result.innerHTML = "Etwas ist schiefgelaufen!";
      result.classList.add("!text-red-500");
    })
    .then(() => { // delay
      form.reset();
      setTimeout(() => {
        result.style.display = "";
      }, 5000);
    });
});

