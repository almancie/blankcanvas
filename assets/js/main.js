/*
|--------------------------------------------------------------------------
| Header
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

// if (document.body.classList.contains('home')) {
//   anime({
//     targets: ['.custom-logo', '#main-menu .menu-item', '.header-icons > *'],
//     translateX: [-50, 0],
//     delay: anime.stagger(50),
//     opacity: 1,
//     easing: 'easeInOutCirc'
//   });

  window?.Animatab.add('.main-menu', {
    activeItemClass: 'current-menu-item',
    animateOnHover: true,
    highlighterAnimation: {
      easing: 'easeOutCirc',
      duration: 500,
    },
  });
// }

const offcanvasMenu = document.querySelector('#offcanvasMenu');

offcanvasMenu.addEventListener('show.bs.offcanvas', event => {
  anime({
    targets: event.target.querySelectorAll('.menu-item'),
    translateY: [-150, 0],
    opacity: 1,
    delay: anime.stagger(100),
    duration: 1000,
    easing: 'easeOutQuint'
  })
})

offcanvasMenu.addEventListener('hide.bs.offcanvas', event => {
  anime({
    targets: event.target.querySelectorAll('.menu-item'),
    translateY: [0, 150],
    opacity: 0,
    delay: anime.stagger(100),
    duration: 1000,
    easing: 'easeOutQuint'
  })
})

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
| Animatab Init
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Animatab.init();

/*
|--------------------------------------------------------------------------
| Revealer Init
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Revealer.init({
  color: 'var(--body-color)'
});