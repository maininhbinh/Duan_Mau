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

//=========================================================================
var clickTrack = document.querySelector(".product-track");
var clickNext = document.querySelectorAll(".slider-arrow");
var firstCardWitdh = clickTrack.querySelector("form").offsetWidth;
var next = document.querySelector(".next-arrow");
var prve = document.querySelector(".prve-arrow");

var isDragging = false,
  startX,
  startScrollLeft;

clickNext.forEach((btn) => {
  btn.addEventListener("click", () => {
    clickTrack.scrollLeft += btn.className.includes("slider-arrow prve-arrow")
      ? -firstCardWitdh
      : firstCardWitdh;
  });
});

function infiniteScroll() {
  if (clickTrack.scrollLeft === 0) {
    prve.classList.add("click-disable");
  } else if (
    Math.ceil(clickTrack.scrollLeft) ===
    clickTrack.scrollWidth - clickTrack.offsetWidth
  ) {
    next.classList.add("click-disable");
  } else {
    prve.classList.remove("click-disable");
    next.classList.remove("click-disable");
  }
}
infiniteScroll();

clickTrack.addEventListener("scroll", infiniteScroll);
