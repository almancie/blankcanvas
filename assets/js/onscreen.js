/*
| onScreen
| Ver. 1.0.0
| Author: Blank Canvas (www.blankcanvas.me)
|
| This library allows us to observe elements for viewport intersection.
|
*/

(function() {
  /**
   * Observer settings
   */
  const observerSettings = {
    rootMargin: '0%',
    threshold: [0, 0.25, 0.5, 0.75, 1]
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
  const addCallback = (element, callback, offset) => {
    if (element.onScreen) return element.onScreen.push({callback, offset});

    element.onScreen = [{callback, offset}];

    return false;
  }

  /**
   * Create on screen observer
   */
  const observer = new IntersectionObserver((entries, observer) => {
    
    entries.forEach(entry => {
      // Stops script from running on initial load.
      // if (entry.intersectionRatio === 0) return;

      const element = entry.target;

      element.onScreen = element.onScreen?.filter(callback => {
        if (entry.intersectionRatio >= callback.offset) {
          callback.callback();

          return false;
        }

        return true;
      });

      if (element.onScreen.length === 0) {
        observer.unobserve(element);

        element.classList.add('onscreen-done');
      }

    });
  }, observerSettings);

  /**
   * Check if element is already scrolled beyoned
   */
  // const isBeyond = element => {

  //   // How much is scrolled + 80% of window height
  //   // const triggerPoint = window.scrollY + window.innerHeight * (100 - offset) / 100;
  //   const triggerPoint = window.scrollY - (element.offsetHeight / 2);

  //   // Element offset from top
  //   const elementOffset = element.getBoundingClientRect().top;

  //   return triggerPoint >= elementOffset;
  // }

  /**
   * Attach element to the observer
   */
  const onScreen = (selector, callback, offset = .5) => {
    const element = getElement(selector);

    if (! element) {
      console.error(`Element ${selector} does not exist.`);

      return;
    }

    // if (isBeyond(element)) return callback();

    if (addCallback(element, callback, offset)) return;

    observer.observe(element);

    element.classList.add('onscreen-init');
  }

  window.onScreen = onScreen;
})();