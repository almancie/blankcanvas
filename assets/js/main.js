/*
|--------------------------------------------------------------------------
| Smooth Scroll
|--------------------------------------------------------------------------
|
| 
|
*/

// Initialize Lenis
const lenis = new Lenis({
  duration: 1.2,
  easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // easeOutExpo
  smooth: true,
});

// Use requestAnimationFrame to continuously update the scroll
function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// Optional: make anchor links trigger Lenis scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      lenis.scrollTo(target);
    }
  });
});

/*
|--------------------------------------------------------------------------
| Transition Init
|--------------------------------------------------------------------------
|
| 
|
*/

window.Transition?.init();

/*
|--------------------------------------------------------------------------
| Animatab
|--------------------------------------------------------------------------
|
| 
|
*/

// Main menu
// window.Animatab?.add('.main-menu', {
//   activeItemClass: 'current-menu-item',
//   animateOnHover: true,
//   highlighterAnimation: {
//     easing: 'easeOutElastic(1, .5)',
//     duration: 1500,
//   },
// });

// themeToggleActiveBtn = document.querySelector(`.theme-toggle-switch .${theme.value}`);

// // Theme toggle
// window?.Animatab.add('.theme-toggle-btns', {
//   highlighterDefaultPosition: {
//     left: themeToggleActiveBtn.offsetLeft, 
//     width: themeToggleActiveBtn.offsetWidth, 
//   },
//   highlighterAnimation: {
//     easing: 'easeOutElastic(1, .5)',
//     duration: 1500,
//   },
// });

window.Animatab?.init();

/*
|--------------------------------------------------------------------------
| Revealer
|--------------------------------------------------------------------------
|
| 
|
*/

window.Revealer?.init({
  color: 'var(--body-color)'
});

/*
|--------------------------------------------------------------------------
| React to mouse
|--------------------------------------------------------------------------
|
| 
|
*/

window?.ReactToMouse.init();

/*
|--------------------------------------------------------------------------
| Image to SVG
|--------------------------------------------------------------------------
|
| 
|
*/

window.ImgToSvg?.init();

/*
|--------------------------------------------------------------------------
| BG Blob
|--------------------------------------------------------------------------
|
| 
|
*/

window.Blob?.init('.site');

/*
|--------------------------------------------------------------------------
| Menu items
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

// window.addEventListener('DOMContentLoaded', () => {
//   document.querySelectorAll('.main-menu > li a').forEach(item => {
//     const letters = new Letterize({targets: item, className: 'letter'}); 

//     anime({
//       targets: letters.listAll(),
//       translateX: [150, 0],
//       opacity: 1,
//       delay: anime.stagger(20, {
//           start: 200 + 50 * i
//       }),
//       easing: "spring(0.75, 90, 9, 6)"
//     })
//   });
// });

// window.addEventListener('DOMContentLoaded', () => {
//   const offcanvasMenu = document.querySelector('#offcanvasMenu');

//   const menuItems = [...offcanvasMenu.querySelectorAll('.menu-item')];

//   const menuBtn = document.querySelector('.bc-menu-btn');

//   document.querySelectorAll('.main-menu > li a').forEach(item => {
//     new Letterize({targets: item, className: 'letter'}); 

//     item.parentElement.setAttribute('data-bs-toggle', 'offcanvas');
//     item.parentElement.setAttribute('data-bs-target', '#offcanvasMenu');
//   });

//   offcanvasMenu.addEventListener('show.bs.offcanvas', () => {
//     menuItems.forEach((item, i) => {
//       const letters = [...item.querySelectorAll('.letter')].reverse();

//       anime({
//         targets: letters,
//         translateX: [150 * (i + 1), 0],
//         opacity: [0, 1],
//         delay: anime.stagger(20, {
//             start: 200 + 50 * i
//         }),
//         easing: "spring(0.75, 90, 9, 6)"
//       })
//     });
//   });

//   offcanvasMenu.addEventListener('hide.bs.offcanvas', () => {
//     menuItems.forEach((item, i) => {
//       const letters = [...item.querySelectorAll('.letter')];

//       anime({
//         targets: letters,
//         translateX: [0, -150 * (i + 1)],
//         opacity: 0,
//         delay: anime.stagger(20, {
//             // start: 200 + 50 * i  // popper original value
//             start: 50 * i
//         }),
//         easing: "spring(0.75, 90, 9, 6)"
//       })
//     });
//   });
// });
  
/*
|--------------------------------------------------------------------------
| Popup
|--------------------------------------------------------------------------
|
| Create a popup the follows the cursor position
|
*/

// (() => {
  //   document.querySelectorAll('[data-popup]').forEach(popup => {
    //     const container = document.querySelector(popup.dataset.popupContainer);

//     container.onmousemove = e => {
  //       const x = e.clientX - e.currentTarget.offsetLeft; 
//       const y = e.clientY - e.currentTarget.offsetTop; 

//       popup.animate({
//         left: `${x}px`,
//         top: `${y}px`
//       }, {duration: 3000, fill: "both", easing: 'ease-out'})
//     }
//   });
// })();

/*
|--------------------------------------------------------------------------
| Logo
|--------------------------------------------------------------------------
|
| Convert logo to SVG
|
*/

// (() => {
//   const logo = document.querySelector('.custom-logo');
  
//   ImgToSvg.convert(logo, function() {
//     this.style.opacity = 1;
    
//     anime({
//       targets: this.querySelectorAll('.cls-1, .cls-2'),
//       translateX: [-15, 0],
//       opacity: {value: 1, easing: 'linear', duration: 500},
//       scale: [1.25, 1],
//       delay: anime.stagger(50, {grid: [2], start: 800}),
//       duration: 1500,
//       easing: 'easeOutQuad',
//       easing: 'easeOutElastic(1, .7)',
//     });
    
//     anime({
//       targets: this.querySelectorAll('.cls-3'),
//       translateX: [-15, 0],
//       opacity: {value: 1, easing: 'linear', duration: 500},
//       strokeDashoffset: 960,
//       duration: 1000,
//       easing: 'easeInOutCirc',
//     });
//   });
// })();

/*
|--------------------------------------------------------------------------
| Button Double Icon Hover Effect
|--------------------------------------------------------------------------
|
| Duplicated button icon to add hover effect
|
*/

document.querySelectorAll('.btn-double-icon').forEach(btn => {
  const icon = btn.querySelector('[data-svg]');
  const iconDouble = icon.cloneNode();
  ImgToSvg.convert(iconDouble);
  btn.appendChild(iconDouble);
})