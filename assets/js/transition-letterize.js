/**
 * Extention to transition.js
 * 
 * Allows to add letterize effect to text
 */

window.Transition?.addSetting('letterize', (element, anime) => {
  const animations = {
    roll: {
      translateX: (element) => {
        return [(element.offsetWidth + element.offsetHeight) * 2 * -.25, 0];
      },
      rotate: ['-.25turn', 0],
      opacity: 1,
      delay: anime.stagger(100, {grid: [2]}),
      duration: 3000,
      easing: 'easeOutElastic(1, .3)',
    },
    zoom: {
      opacity: {value: 1, easing: 'linear', duration: 500},
      scale: [0, 1],
      delay: anime.stagger(50, {grid: [2]}),
      duration: 2000,
      easing: 'easeOutElastic(1, .5)',
    }
  };

  const {
    transitionType = 'zoom',
    transitionTargets, 
    transitionOrder,
  } = element.dataset;

  // Convert to letters
  let letters = new Letterize({
    targets: transitionTargets ? element.querySelectorAll(transitionTargets) : element, 
    className: 'letter'
  });

  // Get the actual elements
  letters = letters.listAll;

  element.style.opacity = 1;

  if (transitionOrder === 'end') {
    letters = letters.reverse();
  }

  if (transitionOrder === 'random') {
    letters = letters.sort(() => Math.random() - 0.5) ;
  }

  return {
    targets: letters,
    ...animations[transitionType]
  };
});