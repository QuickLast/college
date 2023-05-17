const tableActionElements = document.querySelectorAll(".table-action");

tableActionElements.forEach((element) => {
  const showButton = element.querySelector(".btn.btn-success");
  const listEl = element.querySelector("ul");

  showButton.addEventListener("click", () => {
    listEl.classList.toggle("d-none");
    listEl.classList.toggle("d-flex");
  });
});
