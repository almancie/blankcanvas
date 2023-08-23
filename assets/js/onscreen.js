(function() {

  /**
   * Observer settings
   */
  const offset = 25;

  const observerSettings = {
    rootMargin: `-${offset}%`, 
    // threshold: .5
  };

  /**
   * Get the element
   */
  const getElement = (selector) => typeof selector === 'string'
    ? document.querySelector(selector)
    : selector;

  /**
   * Push to stack of callbacks
   */
  const addCallback = (element, callback) => {
    if (element.onScreen) return element.onScreen.push(callback);

    element.onScreen = [callback];

    return false;
  }

  /**
   * Create on screen observer
   */
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {

      // Stops script from running on initial load.
      if (entry.intersectionRatio === 0) return;

      const element = entry.target;

      element.onScreen?.forEach(callback => callback());

      observer.unobserve(element);

      element.classList.add('onscreen-done');
    });
  }, observerSettings);

  /**
   * Check if element is already scrolled beyoned
   */
  const isBeyond = element => {

    // How much is scrolled + 80% of window height
    const triggerPoint = window.scrollY + window.innerHeight * (100 - offset) / 100;

    // Element offset from top
    const elementOffset = element.getBoundingClientRect().top;

    return triggerPoint >= elementOffset;
  }

  /**
   * Attach element to the observer
   */
  const onScreen = (selector, callback) => {
    const element = getElement(selector);

    if (isBeyond(element)) return callback();

    if (addCallback(element, callback)) return;

    observer.observe(element);

    element.classList.add('onscreen-init');
  }

  window.onScreen = onScreen;
})();