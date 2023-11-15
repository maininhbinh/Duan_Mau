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
var navBar = document.querySelector('.navbar')
window.onscroll = function() {
  if(window.pageYOffset > header.offsetTop){
    navBar.classList.add('sticky');
  }else{
    navBar.classList.remove('sticky');
  }
}

// ======= next category ==========

var clickTrack = document.querySelector('.click-track');
var clickNext = document.querySelectorAll('.slider-arrow')
var firstCardWitdh = clickTrack.querySelector('.click-slide').offsetWidth;
var next = document.querySelector('.next-arrow');
var prve = document.querySelector('.prve-arrow');

var isDragging = false, startX, startScrollLeft;


clickNext.forEach((btn) => {
  btn.addEventListener('click', () => {
    clickTrack.scrollLeft += btn.className.includes('slider-arrow prve-arrow') ? -firstCardWitdh : firstCardWitdh;
  })
})

function dragStart(e){
  isDragging = true;
  clickTrack.classList.add('dragging');

  startX = e.pageX;
  startScrollLeft = clickTrack.scrollLeft;
}

function dragStop(){
  isDragging = false;
  clickTrack.classList.remove('dragging');
}

function dragging(e){

  if(!isDragging) return;
  clickTrack.scrollLeft = startScrollLeft - (e.pageX - startX);
}

function infiniteScroll() {
  if(clickTrack.scrollLeft === 0){
    prve.classList.add('click-disable');
  }else if(Math.ceil(clickTrack.scrollLeft) === clickTrack.scrollWidth - clickTrack.offsetWidth){
    next.classList.add('click-disable');
  }else{
    prve.classList.remove('click-disable');
    next.classList.remove('click-disable');
  }
}
infiniteScroll();

clickTrack.addEventListener('mousemove', dragging)
clickTrack.addEventListener('mousedown', dragStart)
document.addEventListener('mouseup', dragStop)
clickTrack.addEventListener('scroll', infiniteScroll)