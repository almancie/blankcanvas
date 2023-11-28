(function() {

  // const easing = 'cubicBezier(0.130, 0.390, 0.415, 0.920)';
  const easing = 'easeOutElastic(1, .35)';
  const duration = 3000;

  /**
   * Animations
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
        translateX: ['75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeEnd: (element) => {
      return {
        targets: element,
        translateX: ['-75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeUp: (element) => {
      return {
        targets: element,
        translateY: ['75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeDown: (element) => {
      return {
        targets: element,
        translateY: ['-75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeUpStart: (element) => {
      return {
        targets: element,
        translateX: ['75px', 0],
        translateY: ['75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeUpEnd: (element) => {
      return {
        targets: element,
        translateX: ['-75px', 0],
        translateY: ['75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeDownStart: (element) => {
      return {
        targets: element,
        translateX: ['75px', 0],
        translateY: ['-75px', 0],
        opacity: 1,
        duration,
        easing,
      }
    },
    fadeDownEnd: (element) => {
      return {
        targets: element,
        translateX: ['-75px', 0],
        translateY: ['-75px', 0],
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
    fadeDownBounce: (element) => {
      return {
        targets: element,
        translateY: ['-200px', 0],
        opacity: {value: 1, duration: 600, easing: 'easeOutQuart'},
        duration: 1200,
        easing: 'easeOutBounce',
      }
    },
    fadeDownRotateBounce: (element) => {
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

  function add(element) {
    const {
      transition, 
      transitionDuration, 
      transitionDelay, 
      transitionAnchor = element
    } = element.dataset;

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