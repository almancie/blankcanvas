(function() {

  /**
   * Settings
   */
  const speed = 0.02;

  /**
   * Current postition
   */
  const position = {
    mouseX: 0,
    mouseY: 0,
    elementX: 0,
    elementY: 0
  }

  let blob = null;

  /**
   * Create the blob
   */
  function createBlob(container, follow) {

    // Create the parent div
    blob = document.createElement("div");

    blob.classList.add('blob')

    // Create the child divs
    for (let i = 1; i <= 3; i++) {
      const childDiv = document.createElement("div");
      blob.appendChild(childDiv);
    }

    if (follow) {
      blob.setAttribute('data-blob-follow', follow);

      document.addEventListener("mousemove", (e) => {
        position.mouseX = e.pageX;
        position.mouseY = e.pageY;
      })
      
      animate();
    }

    // Append the parent div to the body (or any other element)
    container.prepend(blob);

  }

  /**
   * Animate blob movement
   */

  function animate() {
    const distX = position.mouseX - position.elementX;
    const distY = position.mouseY - position.elementY;
    
    position.elementX = position.elementX + (distX * speed);
    position.elementY = position.elementY + (distY * speed);
  
    blob.style.left = position.elementX + "px";
    blob.style.top = position.elementY + "px";
  
    requestAnimationFrame(animate);
  }

  /**
   * Initilize
   */
  function init(container = 'body', follow = false) {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    createBlob(container, follow);
  };

  window.Blob = {init}
})();