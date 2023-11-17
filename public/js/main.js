/* ========== Navigation =========== */
const navList = document.querySelector(".nav-list");
const closeMark = document.querySelector(".closeMark");

document.querySelector(".hamburger").onclick = () => {
  navList.classList.add("show");
  closeMark.style.display = "block";
};

document.querySelector(".close").onclick = () => {
  navList.classList.remove("show");
  closeMark.style.display = "none";
};

/* ========== User Form =========== */
var navBar = document.querySelector(".navbar");
var body = document.querySelector("body");
window.onscroll = function () {
  if (window.pageYOffset > body.offsetTop) {
    navBar.classList.add("sticky");
  } else {
    navBar.classList.remove("sticky");
  }
};

var clickUser = document.querySelector(".click-user");
var profile = document.querySelector(".profile");

function openProfile() {
  const computedStyle = window.getComputedStyle(profile);
  const displayValue = computedStyle.display;

  if (displayValue === "none") {
    profile.style.display = "block";
  } else {
    profile.style.display = "none";
  }
}

clickUser.addEventListener("click", openProfile);

// ======= next category ==========
