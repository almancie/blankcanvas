/**
 * Animations
 */
const animations = {
  start: (element) => {
    return {
      targets: element,
      translateX: ['100px', 0],
      opacity: 1,
      duration: 1500,
      easing: 'easeOutQuad',
    }
  },
  end: (element) => {
    return {
      targets: element,
      translateX: ['-100px', 0],
      opacity: 1,
      duration: 1500,
      easing: 'easeOutQuad',
    }
  },
  up: (element) => {
    return {
      targets: element,
      translateY: ['100px', 0],
      opacity: 1,
      duration: 1500,
      easing: 'easeOutQuad',
    }
  },
  down: (element) => {
    return {
      targets: element,
      translateY: ['-100px', 0],
      opacity: 1,
      duration: 1500,
      easing: 'easeOutQuad',
    }
  },
  downBounce: (element) => {
    return {
      targets: element,
      translateY: ['-100px', 0],
      opacity: 1,
      delay: 200,
      duration: 2000,
      easing: 'easeOutBounce',
    }
  },
  downRotateBounce: (element) => {
    return {
      targets: element,
      translateY: ['-100px', 0],
      rotate: ['-180deg', 0],
      opacity: 1,
      delay: 200,
      duration: 2000,
      easing: 'easeOutBounce',
    }
  },
  tiles: (element) => {
    let count = 25;

    let wrapper = document.createElement('div');

    wrapper.classList.add('tiles');

    let tiles = [];

    [...Array(count)].map((_, i) => {
      let tile = document.createElement('div');

      wrapper.appendChild(tile);

      tiles.push(tile);
    });

    element.prepend(wrapper);

    return {
      targets: tiles,
      opacity: 0,
      duration: 1000,
      easing: 'easeInExpo', 
      delay: anime.stagger(75, {from: 'center'}),
    }
  }
}

/**
 * Initilize
 */
let init = (container = 'body') => {
  container = typeof container === 'string'
    ? document.querySelector(container)
    : container

  container.querySelectorAll('[data-transition]').forEach(element => {
    let data = element.dataset;
    
    let extra = {};

    if (data.transitionExtra) {
      data.transitionExtra.split(',').forEach(transition => {
        const [property, value] = transition.split(':');

        extra[property] = value.trim();
      })
    }

    let transition = {
      ...animations[data.transition](element),
      ...extra
    }

    if (data.transitionDuration) {
      transition.delay = data.transitionDuration;
    }

    if (data.transitionDelay) {
      transition.delay = data.transitionDelay;
    }

    // Initial class
    element.classList.add('transition-init');

    // Active class
    transition.begin = () => {
      element.classList.add('transition-active');
    }

    // Complete class
    transition.complete = () => {
      element.classList.remove('transition-active');
      element.classList.add('transition-complete');
    }
    
    const anchor = data.transitionAnchor 
      ? document.querySelector(data.transitionAnchor)
      : undefined;

    if (anchor) {
      onScreen.is(anchor, () => {
        anime(transition);
      });

      return;
    }

    // Attach transition to element to be executed when it's on screen.
    onScreen.is(element, () => {
      anime(transition);
    });
  });
}

window.transition = {init}