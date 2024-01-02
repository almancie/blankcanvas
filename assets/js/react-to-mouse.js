(function () {

  /**
   * Settings
   */
  const constrain = 100;

  /**
   * Calculate transform
   */
  function transform(x, y, element, inverse) {
    const box = element.getBoundingClientRect();
    let calcX = (y - box.y - (box.height / 2)) / constrain;
    let calcY = -(x - box.x - (box.width / 2)) / constrain;

    if (inverse) {
      calcX = -(y - box.y - (box.height / 2)) / constrain;
      calcY = (x - box.x - (box.width / 2)) / constrain;
    }

    return `perspective(1000px) rotateX(${calcX}deg) rotateY(${calcY}deg)`;
  };

  /**
     * Initilize
     */
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    container.querySelectorAll('[data-mouse-container]').forEach(container => {
      const elements = container.querySelectorAll("[data-mouse-element]");
    
      container.addEventListener('mousemove', (e) => elements.forEach(element => {
        const inverse = element.dataset.mouseElement === 'inverse';
    
        window.requestAnimationFrame(() => {
          element.style.transform  = transform.call(null, e.clientX, e.clientY, element, inverse);
        });
      }));
    });
  };

  window.ReactToMouse = {init}
})()
