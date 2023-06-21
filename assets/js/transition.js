(function() {
  /**
   * Animations
   */
  const settings = {
    fade: (element) => {
      return {
        targets: element,
        opacity: 1,
        duration: 1000,
        easing: 'easeInOutCirc',
      }
    },
    zoomIn: (element) => {
      return {
        targets: element,
        opacity: 1,
        duration: 1000,
        scale: [.85, 1],
        easing: 'easeInOutCirc',
      }
    },
    start: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        opacity: 1,
        duration: 1000,
        easing: 'easeInOutCirc',
      }
    },
    end: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        opacity: 1,
        duration: 1000,
        easing: 'easeInOutCirc',
      }
    },
    up: (element) => {
      return {
        targets: element,
        translateY: ['100px', 0],
        opacity: 1,
        duration: 1000,
        easing: 'easeInOutCirc',
      }
    },
    down: (element) => {
      return {
        targets: element,
        translateY: ['-100px', 0],
        opacity: 1,
        duration: 1000,
        easing: 'easeInOutCirc',
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
      const count = 25;
      const wrapper = document.createElement('div');
      wrapper.classList.add('tiles');
      const tiles = [];

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
    },
    custom: (element) => {
      return {
        targets: element,
        duration: 1000,
        easing: 'easeInOutCirc',
      };
    }
  }

  /**
   * Parse value to object
   */
  function parse(value) {
    let object;

    try {
      object = JSON.parse(value);
    } catch (e) {
      return value;
    }

    return object;
  }

  /**
   * Initilize
   */
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    container.querySelectorAll('[data-transition]').forEach(element => {
      let data = element.dataset;

      // Extra
      const extra = parse(data.transitionExtra) ?? {}

      // Animation
      let transition = {
        ...settings[data.transition](element),
        ...extra
      }

      // Duration
      if (data.transitionDuration) {
        transition.duration = data.transitionDuration;
      }

      // Delay
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

      // Anchor
      const anchor = document.querySelector(data.transitionAnchor);

      onScreen(anchor ?? element, () => {
        anime(transition);
      });
    });
  };

  window.Transition = {init}
})();