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
    targets: ['.custom-logo', '#main-menu .menu-item', '.header-icons > *'],
    translateX: [-50, 0],
    delay: anime.stagger(50),
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
  color: 'var(--primary)'
});