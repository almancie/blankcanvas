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

    callbacks[entry.target.dataset.onscreen].call();

    observer.unobserve(entry.target);
  });
}, observerOptions);

/**
 * Attach element to the observer
 */
function is(element, callback) {
  if (typeof element === 'string') {
    element = document.querySelector(element);
  }

  let ref = Math.random().toString().substring(10);

  callbacks[ref] = callback;

  element.setAttribute('data-onscreen', ref);

  observer.observe(element);
}

window.onScreen = {is};