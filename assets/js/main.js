/*
|--------------------------------------------------------------------------
| Transition Init
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Transition.init();

/*
|--------------------------------------------------------------------------
| Animatab
|--------------------------------------------------------------------------
|
| 
|
*/

// Main menu
window?.Animatab.add('.main-menu', {
  activeItemClass: 'current-menu-item',
  animateOnHover: true,
  highlighterAnimation: {
    easing: 'easeOutElastic(1, .5)',
    duration: 1500,
  },
});

window?.Animatab.init();

/*
|--------------------------------------------------------------------------
| Revealer
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Revealer.init({
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

window?.ImgToSvg.init();

/*
|--------------------------------------------------------------------------
| BG Blob
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Blob.init('body', true);

/*
|--------------------------------------------------------------------------
| Menu items
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

// const offcanvasMenu = document.querySelector('#offcanvasMenu');

// offcanvasMenu.addEventListener('show.bs.offcanvas', event => {
//   anime({
//     targets: event.target.querySelectorAll('.menu-item'),
//     translateY: [-100, 0],
//     // translateX: [150, 0],
//     opacity: 1,
//     delay: anime.stagger(75),
//     duration: 400,
//     easing: 'easeOutQuad'
//   })
// })

// offcanvasMenu.addEventListener('hide.bs.offcanvas', event => {
//   anime({
//     targets: [...event.target.querySelectorAll('.menu-item')].reverse(),
//     translateY: [0, 100],
//     // translateX: [0, -150],
//     opacity: 0,
//     delay: anime.stagger(75),
//     duration: 400,
//     easing: 'easeOutQuad'
//   })
// })