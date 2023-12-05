var buttonFilter = document.querySelector(".category-button_filter");
var buttonFilterBySort = document.querySelector(".price-button_filter");
var form = document.querySelector(".show-category");
var formPrice = document.querySelector(".price-sort_fillter");

buttonFilter.addEventListener("click", function () {
  let elemntStyle = window.getComputedStyle(form);
  let formStyle = elemntStyle.display;

  if (formStyle == "none") {
    form.style.display = "block";
    formPrice.style.display = "none";
  } else {
    form.style.display = "none";
  }
});

buttonFilterBySort.addEventListener("click", function () {
  let elemntStylePrice = window.getComputedStyle(formPrice);
  let formStylePrice = elemntStylePrice.display;

  if (formStylePrice == "none") {
    formPrice.style.display = "block";
    form.style.display = "none";
  } else {
    formPrice.style.display = "none";
  }
});
