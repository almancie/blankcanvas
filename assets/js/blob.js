/*
| Blob
| Ver. 1.0.0
| Author: Blank Canvas (www.blankcanvas.me)
|
| This library allows us to add a blob that follows the mouse movement.
|
*/

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

  /**
   * Blob element
   */
  let blob = null;

  /**
   * Create the blob
   */
  function createBlob(container) {

    // Create the parent div
    blob = document.createElement("div");

    // Add class name
    blob.classList.add('blob');

    // Create the child divs
    [...Array(3)].forEach(_ => blob.appendChild(document.createElement("div")));

    document.addEventListener("mousemove", () => blob.classList.add('active'));

    document.addEventListener("mousemove", (e) => {
      position.mouseX = e.clientX;
      position.mouseY = e.clientY;
    });

    anime({
      targets: blob,
      opacity: 1,
      duration: 2000,
      easing: 'easeOutQuad'
    });

    animate();

    center();

    // Append the parent div to the body (or any other element)
    container.prepend(blob);
  }

  /**
   * Center blob movement
   */
  function center() {
    const blobHalfWidth = blob.offsetWidth / 2;
    const blobHalfHeight = blob.offsetHeight / 2;
  
    position.mouseX = window.innerWidth / 2 - blobHalfWidth;
    position.mouseY = window.innerHeight / 2 - blobHalfHeight;

    position.elementX = window.innerWidth / 2 - blobHalfWidth;
    position.elementY = window.innerHeight / 3;
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
  function init(container = 'body') {
    container = typeof container === 'string'
      ? document.querySelector(container)
      : container

    createBlob(container);
  };

  window.Blob = {init}
})();