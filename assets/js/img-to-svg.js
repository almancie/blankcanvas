(function () {

  // Create a new dom parser to turn the SVG string into an element.
  const parser = new DOMParser();

  /**
   * Converts img to SVG
   */
  function convert(element) {

    if (typeof element === 'string') {
      element = document.querySelector(element);
    }

    // Fetch the file from the server.
    fetch(element.dataset.svg ? element.dataset.svg : element.src)
      .then(response => response.text())
      .then(text => {

        // Turn the raw text into a document with the svg element in it.
        const parsed = parser.parseFromString(text, 'text/html');

        // Select the <svg> element from that document.
        const svg = parsed.querySelector('svg');
        
        if (element.classList) {
          svg.classList = element.classList;
        }

        if (element.style.cssText) {
          svg.style.cssText = element.style.cssText;
        }

        delete element.dataset.svgSrc;
        
        for (attr in element.dataset) {
          svg.dataset[attr] = element.dataset[attr];
        }
        
        // Replace the image with the svg.
        element.replaceWith(svg);
      });
  }

  /**
   * Initilize
   */
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    container.querySelectorAll('[data-svg], .svg').forEach(convert);
  };

  window.ImgToSvg = {init}
})()