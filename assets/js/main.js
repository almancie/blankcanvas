/*
|--------------------------------------------------------------------------
| Menu Animation
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

if (document.body.classList.contains('home')) {
  anime({
    targets: '#main-menu .menu-item',
    translateY: [50, 0],
    delay: anime.stagger(100),
    opacity: 1,
    easing: 'easeInOutCirc'
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

// Main menu
window?.Animatab.add('.main-menu', {
  activeItemClass: 'current-menu-item',
  // animateOnStart: false,
  animateOnHover: true,
  highlighterAnimation: {
    easing: 'easeOutQuad',
    duration: 300
  },
  highlighterStyle: {bottom: 0, right: 0},
});

window?.Animatab.init();