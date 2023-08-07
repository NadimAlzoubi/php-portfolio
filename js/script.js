

const navBtn=document.querySelector('#navbar-toggler');
const navDiv=document.querySelector('.navbar-collapse');

navBtn.addEventListener('click', () => {
    navDiv.classList.toggle('showNav');
});

// stopping animation and transition during window resizing
let resizeTimer;
window.addEventListener('resize', () => {
    document.body.classList.add('resize-animation-stopper');
    clearTimeout(resizeTimer);
    resizeTimer=setTimeout(() => {
        document.body.classList.remove('resize-animation-stopper');
    }, 400);
});

let slideIndex=0;
showSlides();

// Next-previous control
function nextSlide() {
  slideIndex++;
  showSlides();
  timer=_timer; // reset timer
}

function prevSlide() {
  slideIndex--;
  showSlides();
  timer=_timer;
}

// Thumbnail image controlls
function currentSlide(n) {
  slideIndex=n - 1;
  showSlides();
  timer=_timer;
}

function showSlides() {
  let slides=document.querySelectorAll(".mySlides");
  let dots=document.querySelectorAll(".dots");

  if (slideIndex > slides.length - 1) slideIndex=0;
  if (slideIndex < 0) slideIndex=slides.length - 1;
  
  // hide all slides
  slides.forEach((slide) => {
    slide.style.display="none";
  });
  
  // show one slide base on index number
  slides[slideIndex].style.display="block";
  
  dots.forEach((dot) => {
    dot.classList.remove("active");
  });
  
  dots[slideIndex].classList.add("active");
}

// autoplay slides --------
let timer=7; // sec
const _timer=timer;

// this function runs every 1 second
setInterval(() => {
  timer--;

  if (timer < 1) {
    nextSlide();
    timer=_timer; // reset timer
  }
}, 1000); // 1sec