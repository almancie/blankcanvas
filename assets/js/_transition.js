/**
 * Animations
 */
let animations = {
  right: [
    {transform: 'translateX(-100px)'},
    {transform: 'translateX(0)'}
  ],
  left: [
    {transform: 'translateX(100px)'},
    {transform: 'translateX(0)'}
  ],
  up: [
    {transform: 'translateY(100px)'},
    {transform: 'translateY(0)'}
  ],
  down: [
    {transform: 'translateY(-100px)'},
    {transform: 'translateY(0)'}
  ],
  dynamicRight: [
    {transform: 'translateX(-100%)'},
    {transform: 'translateX(0)'}
  ],
  dynamicLeft: [
    {transform: 'translateX(100%)'},
    {transform: 'translateX(0)'}
  ],
  dynamicUp: [
    {transform: 'translateY(100%)'},
    {transform: 'translateY(0)'}
  ],
  dynamicDown: [
    {transform: 'translateY(-100%)'},
    {transform: 'translateY(0)'}
  ],
  zoomIn: [
    {transform: 'scale(.6)'},
    {transform: 'scale(1)'}
  ],
  zoomOut: [
    {transform: 'scale(1.2)'},
    {transform: 'scale(1)'}
  ]
}

/**
 * Easings
 */
let easings =  {
  easeInOutBack: 'cubic-bezier(.68, -.55, .265, 1.55)',
  ease: 'cubic-bezier(.250, .100, .250, 1)',
  easeIn: 'cubic-bezier(.420, 0, 1, 1)',
  easeOut: 'cubic-bezier(.000, 0, .580, 1)',
  easeInOut: 'cubic-bezier(.420, 0, .580, 1)',
  easeInBack: 'cubic-bezier(.6, -.28, .735, .045)',
  easeOutBack: 'cubic-bezier(.175, .885, .32, 1.275)',
  easeInOutBack: 'cubic-bezier(.68, -.55, .265, 1.55)',
  easeInSine: 'cubic-bezier(.47, 0, .745, .715)',
  easeOutSine: 'cubic-bezier(.39, .575, .565, 1)',
  easeInOutSine: 'cubic-bezier(.445, .05, .55, .95)',
  easeInQuad: 'cubic-bezier(.55, .085, .68, .53)',
  easeOutQuad: 'cubic-bezier(.25, .46, .45, .94)',
  easeInOutQuad: 'cubic-bezier(.455, .03, .515, .955)',
  easeInCubic: 'cubic-bezier(.55, .085, .68, .53)',
  easeOutCubic: 'cubic-bezier(.25, .46, .45, .94)',
  easeInOutCubic: 'cubic-bezier(.455, .03, .515, .955)',
  easeInQuart: 'cubic-bezier(.55, .085, .68, .53)',
  easeOutQuart: 'cubic-bezier(.25, .46, .45, .94)',
  easeInOutQuart: 'cubic-bezier(.455, .03, .515, .955)'
}

/**
 * Default options
 */
let defaultOptions = {
  duration: 1200,
  delay: 0,
  easing: 'easeOutCubic',
}

/**
 * Transition
 */
let init = (container, options = {}) => {
  options = {...defaultOptions, ...options};

  container = typeof container === 'string'
    ? document.querySelector(container)
    : container

  container.querySelectorAll('[data-transition]').forEach(element => {
    let data = element.dataset;
    let keyframes = animations[data.transition] || [{}, {}];

    // Always fade in
    keyframes[0].opacity = 0;
    keyframes[1].opacity = 1;

    let timing = {
      duration: Number(data.transitionDuration || options.duration),
      delay: Number(data.transitionDelay || options.delay),
      easing: easings[data.transitionEasing || options.easing],
      fill: 'forwards'
    };

    onScreen.is(element, () => {
      element.animate(keyframes, timing);
    });
  });
}

window.transition = {init}