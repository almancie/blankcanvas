(function () {

  /**
   * Variables
   */
  let defaultOptions = {
    color: 'black',
    layers: 1,
    duration: 1500,
    delay: 0,       // initial delay
    stagger: 75,    // delay between layers
    easing: 'easeInOutQuint',
  };

  /**
   * Initialize the revealer and run it
   */
  function init(options = {}, container = 'body') {
    defaultOptions = Object.assign(defaultOptions, options);

    if (typeof container === 'string') {
      container = document.querySelector(container);
    }

    startObserving(container);
  }

  /**
   * Attach elements to the observer 
   */
  function startObserving(container) {
    container.querySelectorAll('[data-reveal="true"]').forEach(element => {
      element.style.opacity = 0;

      onScreen(element, () => {
        reveal(element);
      })
    });
  }

  /**
   * Reveal element currently in viewport
   */
  function reveal(element) {
    let data = element.dataset;

    // Blocks wrapper
    let blocksWrapper = document.createElement('div');
    blocksWrapper.classList.add('reveal-blocks');

    // Blocks
    for (let i = 0; i < (data.revealLayers || defaultOptions.layers); i++) {
      let block = document.createElement('div');
      block.style.backgroundColor = data.revealColor || defaultOptions.color;
      blocksWrapper.appendChild(block);
    }

    // Content Wrapper
    let contentWrapper = document.createElement('div');
    contentWrapper.classList.add('reveal-content');
    contentWrapper.style.opacity = 0;
    contentWrapper.append(...element.childNodes);

    // Root Element
    element.classList.add('reveal');
    element.appendChild(contentWrapper);
    element.appendChild(blocksWrapper);
    element.style.opacity = 1;

    // Timing
    let duration = (Number(data.revealDuration) || defaultOptions.duration) / 2;
    let easing = data.revealEasing || defaultOptions.easing;
    let delay = Number(data.revealDelay) || defaultOptions.delay;
    let stagger = Number(data.revealStagger) || defaultOptions.stagger;

    let animation = anime.timeline({
      targets: blocksWrapper.children, 
      easing
    }).add({
      duration, 
      delay: anime.stagger(stagger, {start: delay}), 
      width: [0, '100%'],
      complete: () => {
        blocksWrapper.style.alignItems = 'flex-end';
      }
    }).add({
      duration,
      delay: anime.stagger(stagger), 
      width: ['100%', 0],
    }).add({
      delay,
      targets: contentWrapper,
      opacity: 1,
      translateX: ['-10%', 0],
    }, duration);

    animation.finished.then(() => {
      anime.remove(blocksWrapper.children);
    });
  }

  window.Revealer = {init};
})();