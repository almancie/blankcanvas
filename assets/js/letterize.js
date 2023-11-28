(function() {
  const letterize = (element) => {
    const animations = {
      roll: {
        translateX: (el) => {
          const circ = 2 * (el.offsetWidth + el.offsetHeight);

          return [circ * -.25, 0];
        },
        rotate: ['-.25turn', 0],
        opacity: 1,
        delay: anime.stagger(100, {grid: [2]}),
        duration: 3000,
        easing: 'easeOutElastic(1, .3)',
      },
      default: {
        opacity: {value: 1, easing: 'linear', duration: 500},
        // translateX: [-15, 0],
        scale: [0, 1],
        delay: anime.stagger(50, {grid: [2, 2]}),
        duration: 2000,
        easing: 'easeOutElastic(1, .5)',
      }
    };

    const target = element.dataset.letterizeTarget;

    const letters = (new Letterize({targets: target ? element.querySelectorAll(target) : element, className: 'letter'})).listAll;

    element.style.opacity = 1;

    const animation = animations[element.dataset.letterize] ?? animations.default;

    const anchor = element.dataset.letterizeAnchor ?? element;
  
    // const delay = element.dataset.letterizeDelay ?? 100;
  
    const order = element.dataset.letterizeOrder;
  
    const targets = order == 1 ? letters.reverse() : order == 2 ? letters.sort(() => Math.random() - 0.5) : letters;
  
    onScreen(anchor, () => {
      anime({
        targets,
        ...animation,
        // duration: 3000
      });
    });
  }

  document.querySelectorAll('[data-letterize]').forEach(letterize);
})();