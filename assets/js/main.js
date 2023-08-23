/*
|--------------------------------------------------------------------------
| Main Menu
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

if (document.body.classList.contains('home')) {
  anime({
    targets: ['#main-menu .menu-item', '.custom-logo'],
    translateY: [50, 0],
    delay: anime.stagger(100),
    opacity: 1,
    easing: 'easeInOutCirc'
  });

  window?.Animatab.add('.main-menu', {
    activeItemClass: 'current-menu-item',
    animateOnHover: true,
    highlighterAnimation: {
      easing: 'easeOutCirc',
      duration: 500,
    },
  });
}

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