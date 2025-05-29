/**
 * Extention to transition.js
 * 
 * Allows to add letterize effect to text
 */

window.Transition?.addSetting('letterize', (element, anime) => {
  const animations = {
    roll: {
      translateX: (element) => [(element.offsetWidth + element.offsetHeight) * 2 * -.2, 0],
      rotate: ['-.1turn', 0],
      opacity: 1,
      delay: anime.stagger(60, {grid: [5]}),
      duration: 2500,
      easing: 'easeOutElastic(1, .5)',
    },
    zoom: {
      opacity: {value: 1, easing: 'linear', duration: 500},
      scale: [.5, 1],
      delay: anime.stagger(50, {grid: [4]}),
      duration: 2000,
      easing: 'easeOutElastic(1, .5)',
    },
    fadeEnd: {
      translateX: (element) => [(element.offsetWidth + element.offsetHeight) * -.25, 0],
      opacity: {value: 1},
      // scale: [.9, 1],
      delay: anime.stagger(100, {grid: [6]}),
      duration: 2000,
      // easing: 'spring(1, 40, 8, 1)',
      easing: 'easeOutQuint',
    },
  };

  const {
    transitionType = 'zoom',
    transitionTargets, 
    transitionOrder,
  } = element.dataset;

  const targets = transitionTargets ? [...element.querySelectorAll(transitionTargets)] : [element];

  targets.forEach(target => {
    const sentence = target.textContent.trim();
    const words = sentence.split(/\s+/);

    // Clear the original content
    target.innerHTML = "";

    // Create and append a div for each word
    words.forEach(word => {
      const div = document.createElement("span");
      div.className = "word";
      div.textContent = word;
      target.appendChild(div);
    });
  });

  // Convert to letters
  let letterize = new Letterize({
    targets,
    wrapper: 'i',
    className: 'letter'
  });

  element.letterize = letterize;

  element.style.opacity = 1;

  // Get the actual elements
  let letters = letterize.listAll;

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