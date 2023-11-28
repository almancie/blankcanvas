/*
|--------------------------------------------------------------------------
| Header
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

// if (document.body.classList.contains('home')) {
//   anime({
//     targets: ['.custom-logo', '#main-menu .menu-item', '.header-icons > *'],
//     translateX: [-50, 0],
//     delay: anime.stagger(50),
//     opacity: 1,
//     easing: 'easeInOutCirc'
//   });

  window?.Animatab.add('.main-menu', {
    activeItemClass: 'current-menu-item',
    animateOnHover: true,
    highlighterAnimation: {
      easing: 'easeOutCirc',
      duration: 500,
    },
  });
// }

const offcanvasMenu = document.querySelector('#offcanvasMenu');

offcanvasMenu.addEventListener('show.bs.offcanvas', event => {
  anime({
    targets: event.target.querySelectorAll('.menu-item'),
    translateY: [-100, 0],
    // translateX: [150, 0],
    opacity: 1,
    delay: anime.stagger(75),
    duration: 400,
    easing: 'easeOutQuad'
  })
})

offcanvasMenu.addEventListener('hide.bs.offcanvas', event => {
  anime({
    targets: [...event.target.querySelectorAll('.menu-item')].reverse(),
    translateY: [0, 100],
    // translateX: [0, -150],
    opacity: 0,
    delay: anime.stagger(75),
    duration: 400,
    easing: 'easeOutQuad'
  })
})

/*
|--------------------------------------------------------------------------
| Transition Init
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Transition.init();

/*
|--------------------------------------------------------------------------
| Animatab Init
|--------------------------------------------------------------------------
|
| 
|
*/

window.addEventListener('load', () => {
  window?.Animatab.init();
})

/*
|--------------------------------------------------------------------------
| Revealer Init
|--------------------------------------------------------------------------
|
| 
|
*/

window?.Revealer.init({
  color: 'var(--body-color)'
});

/*
|--------------------------------------------------------------------------
| 3D mouse tracking and rotating
|--------------------------------------------------------------------------
|
| 
|
*/

window.addEventListener('load', () => {
  const constrain = 100;

  function transforms(x, y, el, inverse) {
    let box = el.getBoundingClientRect();
    let calcX = -(y - box.y - (box.height / 2)) / constrain;
    let calcY = (x - box.x - (box.width / 2)) / constrain;

    if (inverse) {
      calcX = (y - box.y - (box.height / 2)) / constrain;
      calcY = -(x - box.x - (box.width / 2)) / constrain;
    }
    
    return `perspective(1000px) rotateX(${calcX}deg) rotateY(${calcY}deg)`;
  };

  function transformElement(el, xyEl) {
    el.style.transform  = transforms.apply(null, xyEl);
  }
  
  function transformFrame(e, layer, inverse) {
    let xy = [e.clientX, e.clientY];
    let position = xy.concat([layer, inverse]);
  
    window.requestAnimationFrame(function() {
      transformElement(layer, position);
    });
  }
  
  document.querySelectorAll('[data-mouse-container]').forEach(container => {
    const layers = container.querySelectorAll("[data-mouse-layer]");
    
    container.addEventListener('mousemove', e => layers.forEach(layer => transformFrame(e, layer, layer.dataset.mouseLayer === 'inverse')));
  });
});

/*
|--------------------------------------------------------------------------
| 3D mouse tracking and rotating
|--------------------------------------------------------------------------
|
| 
|
*/

(function () {
  // Create a new dom parser to turn the SVG string into an element.
  const parser = new DOMParser();

  const imgToSvg = img => {
    // Fetch the file from the server.
    fetch(img.dataset.svg ?? img.src)
      .then(response => response.text())
      .then(text => {

        // Turn the raw text into a document with the svg element in it.
        const parsed = parser.parseFromString(text, 'text/html');

        // Select the <svg> element from that document.
        const svg = parsed.querySelector('svg');

        if (img.classList) {
          svg.classList = img.classList;
        }

        if (svg.style.cssText) {
          svg.style.cssText = img.style.cssText;
        }

        delete img.dataset.svgSrc;

        for (attr in img.dataset) {
          svg.dataset[attr] = img.dataset[attr];
        }

        // Replace the image with the svg.
        img.replaceWith(svg);
      });
  }

  window.imgToSvg = imgToSvg;

  document.querySelectorAll('[data-svg]').forEach(imgToSvg);
})();