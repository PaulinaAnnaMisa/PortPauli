let form = document.querySelector("#formContact");
let result = document.querySelector("#result");

form.addEventListener("submit", function (e) {
  let formData = new FormData(form);

  e.preventDefault();
  let object = {};
  formData.forEach((value, key) => {
    object[key] = value;
  });

  result.style.display = "block";
  result.innerHTML = "Bitte warten...";

  fetch("contact.php", {
    method: "POST",
    body: new FormData(form),
  })
    .then(async (response) => {
      let text = await response.text();
      result.innerHTML = text;
      result.classList.remove("text-gray-500");
      result.classList.add("text-green-500");
    })
    .catch((error) => {
      console.log(error);
      result.innerHTML = "Something went wrong!";
    })
    .then(function () {
      form.reset();
      setTimeout(() => {
        result.style.display = "none";
      }, 5000);
    });
});
