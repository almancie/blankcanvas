(function() {

  const easing = 'cubicBezier(0.130, 0.390, 0.415, 0.920)';

  /**
   * Animations
   */
  const settings = {
    fade: (element) => {
      return {
        targets: element,
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeStart: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeEnd: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeUp: (element) => {
      return {
        targets: element,
        translateY: ['100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeDown: (element) => {
      return {
        targets: element,
        translateY: ['-100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeUpStart: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        translateY: ['100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeUpEnd: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        translateY: ['100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeDownStart: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        translateY: ['-100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeDownEnd: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        translateY: ['-100px', 0],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeZoomIn: (element) => {
      return {
        targets: element,
        scale: [.85, 1],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeZoomIn: (element) => {
      return {
        targets: element,
        scale: [1.175, 1],
        // opacity: 1,
        duration: 800,
        easing,
      }
    },
    fadeDownBounce: (element) => {
      return {
        targets: element,
        translateY: ['-2100px', 0],
        // opacity: 1,
        // delay: 200,
        duration: 1800,
        easing: 'easeOutBounce',
      }
    },
    fadeDownRotateBounce: (element) => {
      return {
        targets: element,
        translateY: ['-2100px', 0],
        rotate: ['-180deg', 0],
        // opacity: 1,
        // delay: 200,
        duration: 1800,
        easing: 'easeOutBounce',
      }
    },
    tiles: (element) => {
      const tileWidth = 150;
      const tileHeight = 150;
      const countX = Math.floor(element.offsetWidth / tileWidth);
      const countY = Math.floor(element.offsetHeight / tileHeight);
      const count = countX * countY;

      const wrapper = document.createElement('div');
      wrapper.classList.add('tiles');
      const tiles = [];

      [...Array(count + countX)].map((_, i) => {
        const tile = document.createElement('div');
        wrapper.appendChild(tile);
        tiles.push(tile);
      });

      element.prepend(wrapper);

      return {
        targets: tiles.sort(() => Math.random() - 0.5),
        opacity: 0,
        duration: 800,
        easing: 'easeOutSine', 
        delay: anime.stagger(250, {grid: [3, 3]}),
        complete: () => {
          wrapper.remove();
        }
      }
    }
  }

  function add(element) {
    const {transition, transitionDuration, transitionDelay, transitionAnchor = element} = element.dataset;

    if (! settings[transition]) return;

    const customTiming = {};

    // Duration
    if (transitionDuration) {
      customTiming.duration = transitionDuration;
    }

    // Delay
    if (transitionDelay) {
      customTiming.delay = transitionDelay;
    }

    onScreen(transitionAnchor, () => {
      anime({
        begin: () => {
          element.classList.add('transitioning');
        },
        complete: () => {
          element.classList.remove('transitioning');
          element.classList.add('transition-done');
        },
        ...settings[transition](element),
        ...customTiming
      });
    });

    element.classList.add('transition-init');
  }

  /**
   * Initilize
   */
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    container.querySelectorAll('[data-transition]').forEach(add);
  };

  window.Transition = {init}
})();