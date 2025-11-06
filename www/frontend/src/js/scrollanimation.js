//port
let portHeader = document.querySelector("#portHeader");
let portAboutBox = document.querySelector("#portAboutBox");

//about me
let aboutHeader = document.querySelector("#aboutHeader");
let aboutBoxMain = document.querySelector("#aboutBoxMain");
let aboutBoxWDP = document.querySelector("#aboutBoxWDP");
let cv = document.querySelector("#cv");
let aboutInterests = document.querySelector("#aboutInterests");


let observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("opacity-100", "translate-y-0");
        entry.target.classList.remove("opacity-0", "translate-y-10");
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.3 });

  //port
  if (portHeader) observer.observe(portHeader);
  if (portAboutBox) observer.observe(portAboutBox);

  //about me
  if (aboutHeader) observer.observe(aboutHeader);
  if (aboutBoxMain) observer.observe(aboutBoxMain);
  if (aboutBoxWDP) observer.observe(aboutBoxWDP);
  if (cv) observer.observe(cv);
  if (aboutInterests) observer.observe(aboutInterests);
