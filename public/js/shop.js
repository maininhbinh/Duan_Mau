var buttonFilter = document.querySelector(".category-button_filter");
var form = document.querySelector(".show-category");

buttonFilter.addEventListener("click", function () {
  let elemntStyle = window.getComputedStyle(form);
  let formStyle = elemntStyle.display;

  if (formStyle == "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }
});
