(function() {
  const easing = 'cubicBezier(0.33, 1, 0.68, 1)';
  const duration = 1000;

  /**
   * Animation settings
   */
  const settings = {
    fade: (element) => {
      return {
        targets: element,
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeStart: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeEnd: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeUp: (element) => {
      return {
        targets: element,
        translateY: ['100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeDown: (element) => {
      return {
        targets: element,
        translateY: ['-100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeUpStart: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        translateY: ['100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeUpEnd: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        translateY: ['100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeDownStart: (element) => {
      return {
        targets: element,
        translateX: ['100px', 0],
        translateY: ['-100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeDownEnd: (element) => {
      return {
        targets: element,
        translateX: ['-100px', 0],
        translateY: ['-100px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeZoomIn: (element) => {
      return {
        targets: element,
        scale: [.85, 1],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeZoomOut: (element) => {
      return {
        targets: element,
        scale: [1.175, 1],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeBounceDown: (element) => {
      return {
        targets: element,
        translateY: ['-200px', 0],
        opacity: {value: 1, duration: 600, easing: 'easeOutQuart'},
        duration: 1200,
        easing: 'easeOutBounce',
      }
    },
    fadeBounceDownAndRotate: (element) => {
      return {
        targets: element,
        translateY: ['-200px', 0],
        rotate: ['-180deg', 0],
        opacity: {value: 1, duration: 600, easing: 'easeOutQuart'},
        duration: 1200,
        easing: 'easeOutBounce',
      }
    },
    fadeRollStart: (element) => {
      const circ = element.offsetWidth * Math.PI;

      return {
        targets: element,
        translateX: [circ * .5, 0],
        rotate: ['.5turn', 0],
        opacity: {value: 1, duration: 1000},
        duration: 4000,
        easing: 'easeOutElastic(1, .3)',
      }
    },
    fadeRollEnd: (element) => {
      const circ = element.offsetWidth * Math.PI;

      return {
        targets: element,
        translateX: [circ * -.5, 0],
        rotate: ['-.5turn', 0],
        opacity: {value: 1, duration: 1000},
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
      : settings[transition]

    // Duration
    if (transitionDuration) {
      animation.duration = transitionDuration;
    }

    // Delay
    if (transitionDelay) {

      // If the delay is a function (anime.stagger) add it
      // to the timeout, and if it's a normal value, add it
      // as a delay property.
      // if (animation.delay instanceof Function) {
      //   animation.startDelay = transitionDelay;
      // } else {
      //   animation.delay = animation.delay 
      //     ? +animation.delay + +transitionDelay
      //     : transitionDelay;
      // }

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