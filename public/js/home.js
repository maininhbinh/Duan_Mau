var clickTrack = document.querySelector(".click-track");
var clickNext = document.querySelectorAll(".slider-arrow");
var firstCardWitdh = clickTrack.querySelector(".click-slide").offsetWidth;
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

function dragStart(e) {
  isDragging = true;
  clickTrack.classList.add("dragging");

  startX = e.pageX;
  startScrollLeft = clickTrack.scrollLeft;
}

function dragStop() {
  isDragging = false;
  clickTrack.classList.remove("dragging");
}

function dragging(e) {
  if (!isDragging) return;
  clickTrack.scrollLeft = startScrollLeft - (e.pageX - startX);
}

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

clickTrack.addEventListener("mousemove", dragging);
clickTrack.addEventListener("mousedown", dragStart);
document.addEventListener("mouseup", dragStop);
clickTrack.addEventListener("scroll", infiniteScroll);

//=========view===================================
var productTrack = document.querySelector(".product-track");
var productNext = document.querySelectorAll(".slider-products_arrow");
var firstCardWitdhProducts =
  productTrack.querySelector(".product-form").offsetWidth;
var nextProduct = document.querySelector(".next-products_arrow");
var prveProduct = document.querySelector(".prve-products_arrow");

var isDraggingProducts = false,
  startXProducts,
  startScrollLeftProducts;

productNext.forEach((btn) => {
  btn.addEventListener("click", () => {
    productTrack.scrollLeft += btn.className.includes(
      "slider-products_arrow prve-products_arrow"
    )
      ? -firstCardWitdhProducts
      : firstCardWitdhProducts;
  });
});

function infiniteScrollProduct() {
  if (productTrack.scrollLeft === 0) {
    prveProduct.classList.add("click-disable");
  } else if (
    Math.ceil(productTrack.scrollLeft) ===
    productTrack.scrollWidth - productTrack.offsetWidth
  ) {
    nextProduct.classList.add("click-disable");
  } else {
    prveProduct.classList.remove("click-disable");
    nextProduct.classList.remove("click-disable");
  }
}
infiniteScrollProduct();

productTrack.addEventListener("scroll", infiniteScrollProduct);
