(function() {
  /**
   * Observer options
   */
  let observerOptions = {
    rootMargin: '0px 0px -20% 0px'
  }

  /**
   * Callbacks
   */
  let callbacks = {};

  /**
   * Create Observer
   */
  let observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (! entry.isIntersecting) return;

      callbacks[entry.target.dataset.onscreen].forEach(callback => callback.call());

      observer.unobserve(entry.target);
    });
  }, observerOptions);

  /**
   * Attach element to the observer
   */
  function onScreen(element, callback) {
    element = typeof element === 'string'
      ? document.querySelector(element)
      : element;

    let ref = element.dataset.onscreen;
      
    // If exists, push to the stack
    if (ref) return callbacks[ref].push(callback);

    // Create it
    ref = Math.random().toString().substring(10);

    callbacks[ref] = [callback];

    element.setAttribute('data-onscreen', ref);

    observer.observe(element);
  }

  window.onScreen = onScreen;
})();