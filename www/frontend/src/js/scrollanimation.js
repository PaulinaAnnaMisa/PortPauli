//port
let portHeader = document.querySelector("#portHeader");
let portAboutBox = document.querySelector("#portAboutBox");
let projectsWeb = document.querySelector("#portProjectsWeb");
let projectsDesign = document.querySelector("#portProjectsDesign");
let projectsPhoto = document.querySelector("#portProjectsPhoto");

//about me
let aboutHeader = document.querySelector("#aboutHeader");
let aboutBoxMain = document.querySelector("#aboutBoxMain");
let aboutBoxWDP = document.querySelector("#aboutBoxWDP");
let cv = document.querySelector("#cv");
let aboutInterests = document.querySelector("#aboutInterests");

//contact
let contactLeft = document.querySelector("#contactLeft");
let contactRight = document.querySelector("#contactRight");


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
  if (projectsWeb) observer.observe(projectsWeb);
  if (projectsDesign) observer.observe(projectsDesign);
  if (projectsPhoto) observer.observe(projectsPhoto);

  //about me
  if (aboutHeader) observer.observe(aboutHeader);
  if (aboutBoxMain) observer.observe(aboutBoxMain);
  if (aboutBoxWDP) observer.observe(aboutBoxWDP);
  if (cv) observer.observe(cv);
  if (aboutInterests) observer.observe(aboutInterests);

  //contact
  if (contactLeft) observer.observe(contactLeft);
  if (contactRight) observer.observe(contactRight);