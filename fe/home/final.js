/* Fixed-menu */
function debounceFn(func, wait, immediate) {
  let timeout;
  return function () {
    let context = this,
      args = arguments;
    let later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    let callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}
const header = document.querySelector(".menu");
const headerHeight = header && header.offsetHeight;
window.addEventListener(
  "scroll",
  debounceFn(function (e) {
    const scrollY = window.pageYOffset;
    if (scrollY >= headerHeight) {
      header && header.classList.add("is-fixed");
      document.body.style.paddingTop = `${headerHeight} px`;
      // if (header) {
      //   header.classList.add("is-fixed");
      // }
    } else {
      header && header.classList.remove("is-fixed");
      document.body.style.paddingTop = 0;
    }
  }, 100)
);

window.addEventListener("load", function () {
  const links = [...document.querySelectorAll(".menu-link")];
  links.forEach((item) => item.addEventListener("mouseenter", handleHoverLink));
  const line = document.createElement("div");
  line.className = "line-effect";
  document.body.appendChild(line);
  function handleHoverLink(event) {
    const { left, top, width, height } = event.target.getBoundingClientRect();
    console.log({ left, top, width, height });
    const offsetBottom = 0;
    line.style.width = `${width}px`;
    line.style.left = `${left}px`;
    line.style.top = `${top + height + offsetBottom}px`;
  }
  const menu = document.querySelector(".menu");
  menu.addEventListener("mouseleave", function () {
    line.style.width = 0;
  });
});

/* Slide img */
let currentIndex = 0;
const sliders = document.querySelectorAll(".slider-item");
const totalSliders = sliders.length;

function showNextSlider() {
  sliders[currentIndex].classList.remove("active");
  currentIndex = (currentIndex + 1) % totalSliders; // Quay vòng khi đến slider cuối cùng
  sliders[currentIndex].classList.add("active");
}

setInterval(showNextSlider, 5000); // Chuyển slider sau mỗi 5 giây
