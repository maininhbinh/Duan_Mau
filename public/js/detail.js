var up = document.querySelector(".up");
var down = document.querySelector(".down");
var inputQuantity = document.querySelector(".quantity-input");
var quantity = inputQuantity.value;

up.addEventListener("click", function () {
  inputQuantity.value = ++quantity;
});

down.addEventListener("click", function () {
  if (Number(quantity) === 1) return;
  inputQuantity.value = --quantity;
});
