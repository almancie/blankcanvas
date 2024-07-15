(function () {

  // Create a new dom parser to turn the SVG string into an element.
  const parser = new DOMParser();

  /**
   * Converts img to SVG
   */
  async function convert(element, callback) {

    if (typeof element === 'string') {
      element = document.querySelector(element);
    }

    if (! element) return;

    let src = element.getAttribute('src');

    if (! src) {
      src = element.dataset.svg;
    }

    if (! src) return;

    // Fetch the file from the server.
    await fetch(src)
      .then(response => response.text())
      .then(text => {

        // Turn the raw text into a document with the svg element in it.
        const parsed = parser.parseFromString(text, 'text/html');

        // Select the <svg> element from that document.
        const svg = parsed.querySelector('svg');

        // Add original image source as an attribute
        svg.setAttribute('data-svg-src', element.src);

        if (element.classList) {
          svg.classList = element.classList;
        }

        if (element.style.cssText) {
          svg.style.cssText = element.style.cssText;
        }

        if (element.dataset.svg) {
          delete element.dataset.svg;
        }
        
        // for (attribute in element.dataset) {
        //   svg.setAttribute(attribute, element.dataset[attribute]);
        // }

        // Replace the image with the svg.
        element.replaceWith(svg);

        // Call the optional passed callback
        if (typeof callback === 'function') callback.call(svg);
      });
  }

  /**
   * Initilize
   */
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    container.querySelectorAll('[data-svg$="svg"]').forEach(convert);
    container.querySelectorAll('[data-svg][src$="svg"]').forEach(convert);
    container.querySelectorAll('[data-svg] [src$="svg"]').forEach(convert);
  };

  window.ImgToSvg = {init, convert}
})()