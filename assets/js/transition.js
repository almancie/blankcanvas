(function() {
  /**
   * Animation settings
   */
  const settings = {
    default: {
      opacity: 1,
    },
    fade: () => {
      return {
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeStart: () => {
      return {
        translateX: ['150px', 0],
        duration: 1000,
        opacity: {value: 1, delay: 1000 / 4},
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeEnd: () => {
      return {
        translateX: ['-150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeUp: () => {
      return {
        translateY: ['150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeDown: () => {
      return {
        translateY: ['-150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeUpStart: () => {
      return {
        translateX: ['150px', 0],
        translateY: ['150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeUpEnd: () => {
      return {
        translateX: ['-150px', 0],
        translateY: ['150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeDownStart: () => {
      return {
        translateX: ['150px', 0],
        translateY: ['-150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeDownEnd: () => {
      return {
        translateX: ['-150px', 0],
        translateY: ['-150px', 0],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeZoomIn: () => {
      return {
        scale: [.85, 1],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1500,
        easing: 'easeInOutQuart',
      }
    },
    fadeZoomOut: () => {
      return {
        scale: [1.175, 1],
        opacity: {value: 1, delay: 1000 / 4},
        duration: 1500,
        easing: 'easeInOutQuart',
      }
    },
    fadeBounceDown: () => {
      return {
        translateY: ['-200px', 0],
        opacity: {value: 1, duration: 1000, easing: 'easeOutQuart'},
        duration: 1200,
        easing: 'easeOutBounce',
      }
    },
    fadeBounceDownAndRotate: () => {
      return {
        translateY: ['-200px', 0],
        rotate: ['-180deg', 0],
        opacity: {value: 1, duration: 1000, easing: 'easeOutQuart'},
        duration: 1200,
        easing: 'easeOutBounce',
      }
    },
    fadeRollStart: (element) => {
      const circ = element.offsetWidth * Math.PI;

      return {
        translateX: [circ * .5, 0],
        rotate: ['.5turn', 0],
        opacity: {value: 1},
        duration: 4000,
        easing: 'easeOutElastic(1, .3)',
      }
    },
    fadeRollEnd: (element) => {
      const circ = element.offsetWidth * Math.PI;

      return {
        translateX: [circ * -.5, 0],
        rotate: ['-.5turn', 0],
        opacity: {value: 1},
        duration: 4000,
        easing: 'easeOutElastic(1, .3)',
      }
    }
  }

  /**
   * On begin event handler
   */
  function onBegin(element) {
    element.classList.add('transition-start');
  }

  /**
   * On complete event handler
   */
  function onComplete(element) {
    element.classList.add('transition-done');
  }

  /** 
   * Setup transition from data attributes
   */
  function setup(element) {
    const {
      transition, 
      transitionDuration, 
      transitionDelay, 
      transitionAnchor = element
    } = element.dataset;

    const animation = settings[transition] instanceof Function 
      ? settings[transition](element, anime)
      : settings[transition] ?? settings.default;

    // Duration
    if (transitionDuration) {
      animation.duration = transitionDuration;
    }

    // Delay
    if (transitionDelay) {
      animation.startDelay = transitionDelay;
    }

    onScreen(transitionAnchor, () => {
      setTimeout(() => {
        anime({
          targets: element,
          ...animation,
          begin: () => {
            onBegin(element);
            animation.begin?.call(null, element);
          },
          complete: () => {
            animation.complete?.call(null, element);
            onComplete(element);
          },
        });
      }, animation.startDelay ?? 0);
    });
  
    element.classList.add('transition-init');
  }

  /**
   * Allows to extend settings list
   */
  function addSetting(name, animation) {
    settings[name] = animation;
  }

  /**
   * Initilize
   */
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    container.querySelectorAll('[data-transition]').forEach(setup);
  };

  window.Transition = {init, addSetting}
})();