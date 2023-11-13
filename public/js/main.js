/* ========== Navigation =========== */
const navList = document.querySelector(".nav-list");
const closeMark = document.querySelector(".closeMark");

document.querySelector(".hamburger").onclick = () => {
  navList.classList.add("show");
  closeMark.style.display = 'block';

};

document.querySelector(".close").onclick = () => {
  navList.classList.remove("show");
  closeMark.style.display = 'none';
};


/* ========== User Form =========== */
// var header = document.querySelector('.header');
// var navBar = document.querySelector('.navbar')
// window.onscroll = function() {
//   if(window.pageYOffset > header.offsetTop){
//     navBar.classList.add('sticky');
//   }else{
//     navBar.classList.remove('sticky');
//   }
// }