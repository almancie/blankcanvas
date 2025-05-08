/*
| Transition
| Ver. 1.0.0
| Author: Blank Canvas (www.blankcanvas.me)
|
| This library allows us to add transition effects to elements.
|
*/

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
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeStart: () => {
      return {
        translateX: ['150px', 0],
        duration: 1000,
        opacity: {value: 1, delay: 250},
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeEnd: () => {
      return {
        translateX: ['-150px', 0],
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeUp: () => {
      return {
        translateY: ['150px', 0],
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeDown: () => {
      return {
        translateY: ['-150px', 0],
        opacity: {value: 1, delay: 250},
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeUpStart: () => {
      return {
        translateX: ['150px', 0],
        translateY: ['150px', 0],
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeUpEnd: () => {
      return {
        translateX: ['-150px', 0],
        translateY: ['150px', 0],
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeDownStart: () => {
      return {
        translateX: ['150px', 0],
        translateY: ['-150px', 0],
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeDownEnd: () => {
      return {
        translateX: ['-150px', 0],
        translateY: ['-150px', 0],
        opacity: {value: 1, delay: 250},
        duration: 1000,
        easing: 'cubicBezier(0.33, 1, 0.68, 1)',
      }
    },
    fadeZoomIn: () => {
      return {
        scale: [.85, 1],
        opacity: {value: 1, delay: 250},
        duration: 1500,
        easing: 'easeInOutQuart',
      }
    },
    fadeZoomOut: () => {
      return {
        scale: [1.175, 1],
        opacity: {value: 1, delay: 250},
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
    },
    fadeLettersSpaceOut: () => {
      return {
        letterSpacing: '.5em',
        opacity: {value: 1},
        duration: 2000,
        easing: 'easeOutQuad',
      }
    },
    revealStart: () => {
      return {
        clipPath: ['inset(0 0 0 100%)', 'inset(0 0 0 0%)'],
        opacity: {value: 1, duration: 0},
        duration: 2000,
        easing: 'easeOutQuad',
      }
    },
    revealEnd: () => {
      return {
        clipPath: ['inset(0 100% 0 0)', 'inset(0 0% 0 0)'],
        opacity: {value: 1, duration: 0},
        duration: 2000,
        easing: 'easeOutQuad',
      }
    },
    revealUp: () => {
      return {
        clipPath: ['inset(100% 0 0 0)', 'inset(0% 0 0 0)'],
        opacity: {value: 1, duration: 0},
        duration: 2000,
        easing: 'easeOutQuad',
      }
    },
    revealDown: () => {
      return {
        clipPath: ['inset(0 0 100% 0)', 'inset(0 0 0% 0)'],
        opacity: {value: 1, duration: 0},
        duration: 2000,
        easing: 'easeOutQuad',
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
   * Attach element to the observer to be animated
   */
  function animate(animation = {}) {

    // Animation
    const transition = settings[animation.transition] instanceof Function 
      ? settings[animation.transition](animation.target, anime)
      : settings[animation.transition] ?? settings.default;

    // Duration
    if (animation.duration) {
      transition.duration = animation.duration;
    }

    // Offset
    if (animation.anchor) {
      animation.offset = document.querySelector(animation.anchor)?.dataset.transitionOffset;
    }

    onScreen(animation.anchor ?? animation.target, () => {
      setTimeout(() => {
        anime({
          targets: animation.target,
          ...transition,
          begin: () => {
            onBegin(animation.target);
            transition.begin?.call(null, animation.target);
          },
          complete: () => {
            transition.complete?.call(null, animation.target);
            onComplete(animation.target);
          },
        });
      }, animation.delay ?? 0);
    }, animation.offset);
  
    animation.target?.classList.add('transition-init');
  }

  /** 
   * Setup transition from data attributes
   */
  function setup(element) {
    let {
      transition, 
      transitionDuration, 
      transitionDelay, 
      transitionOffset, 
      transitionAnchor
    } = element.dataset;

    animate({
      target: element,
      transition,
      duration: transitionDuration,
      delay: transitionDelay,
      offset: transitionOffset,
      anchor: transitionAnchor
    });
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

  window.Transition = {init, settings, addSetting}
})();