/*
|--------------------------------------------------------------------------
| Adjust Scroll postition
|--------------------------------------------------------------------------
|
| 
|
*/

scrollBy({
  top: 0,
  left: -1000,
  behavior: 'instant'
});

/*
|--------------------------------------------------------------------------
| Transition Init
|--------------------------------------------------------------------------
|
| 
|
*/

window.Transition?.init();

/*
|--------------------------------------------------------------------------
| Animatab
|--------------------------------------------------------------------------
|
| 
|
*/

// Main menu
window.Animatab?.add('.main-menu', {
  activeItemClass: 'current-menu-item',
  animateOnHover: true,
  highlighterAnimation: {
    easing: 'easeOutElastic(1, .5)',
    duration: 1500,
  },
});

themeToggleActiveBtn = document.querySelector(`.theme-toggle-switch .${theme.value}`);

// Theme toggle
window?.Animatab.add('.theme-toggle-switch', {
  highlighterDefaultPosition: {
    left: themeToggleActiveBtn.offsetLeft, 
    width: themeToggleActiveBtn.offsetWidth, 
  },
  highlighterAnimation: {
    easing: 'easeOutElastic(1, .5)',
    duration: 1500,
  },
});

window.Animatab?.init();

/*
|--------------------------------------------------------------------------
| Revealer
|--------------------------------------------------------------------------
|
| 
|
*/

window.Revealer?.init({
  color: 'var(--body-color)'
});

/*
|--------------------------------------------------------------------------
| React to mouse
|--------------------------------------------------------------------------
|
| 
|
*/

window?.ReactToMouse.init();

/*
|--------------------------------------------------------------------------
| Image to SVG
|--------------------------------------------------------------------------
|
| 
|
*/

window.ImgToSvg?.init();

/*
|--------------------------------------------------------------------------
| BG Blob
|--------------------------------------------------------------------------
|
| 
|
*/

// window.Blob?.init('.site');

/*
|--------------------------------------------------------------------------
| Menu items
|--------------------------------------------------------------------------
|
| Animates menu items.
|
*/

// document.querySelectorAll('.main-menu > li a').forEach(item => {
//   const letters = new Letterize({
//     targets: item, 
//     className: 'menu-item-letter'
//   });
  
//   letters.listAll.forEach(letter => {
//     if (letter.innerText.toLowerCase() === 'o') letter.classList.add('letter-o');
    
//     letter.style.width = letter.offsetWidth + 'px';
//   });
  
//   // item.addEventListener('mouseenter', () => {
//   //   anime.timeline({
//     //     targets: item.children,
//     //     translateX: (element) => {
//       //       return [0, (element.offsetWidth + element.offsetHeight) * 2 * -.25];
//       //     },
//       //     rotate: [0, '-.25turn'],
//       //     delay: anime.stagger(100, {grid: [2]}),
//       //     // duration: 200,
//       //   }).add({
//         //     translateX: (element) => {
//           //       return [(element.offsetWidth + element.offsetHeight) * 2 * -.25, 0];
//           //     },
//           //     rotate: ['-.25turn', 0],
//           //     delay: anime.stagger(100, {grid: [2]}),
//           //     duration: 3000,
//           //     easing: 'easeOutElastic(1, .3)',
//           //   })
//           // })
          
//           // letter.className.add('letter_o');
//         });
        
//         // ['.site-header .menu-item > *', '.site-header .site-branding > *', '.site-header .theme-toggle > *'].forEach(element => {
//           //   anime({
//             //     targets: document.querySelectorAll(element),
//             //     translateY: [75, 0],
//             //     opacity: [0, 1],
//             //     delay: anime.stagger(50),
//             //     duration: 500,
//             //     easing: 'easeOutQuad'
//             //   })
//             // });
            
            
//             // const offcanvasMenu = document.querySelector('#offcanvasMenu');
            
//             // offcanvasMenu.addEventListener('show.bs.offcanvas', event => {
//               //   anime({
//                 //     targets: event.target.querySelectorAll('.menu-item'),
//                 //     translateY: [-100, 0],
//                 //     // translateX: [150, 0],
//                 //     opacity: 1,
//                 //     delay: anime.stagger(75),
//                 //     duration: 400,
//                 //     easing: 'easeOutQuad'
//                 //   })
//                 // })
                
//                 // offcanvasMenu.addEventListener('hide.bs.offcanvas', event => {
// //   anime({
// //     targets: [...event.target.querySelectorAll('.menu-item')].reverse(),
// //     translateY: [0, 100],
// //     // translateX: [0, -150],
// //     opacity: 0,
// //     delay: anime.stagger(75),
// //     duration: 400,
// //     easing: 'easeOutQuad'
// //   })

/*
|--------------------------------------------------------------------------
| Popup
|--------------------------------------------------------------------------
|
| Create a popup the follows the cursor position
|
*/

(() => {
  document.querySelectorAll('[data-popup]').forEach(popup => {
    const container = document.querySelector(popup.dataset.popupContainer);

    container.onmousemove = e => {
      const x = e.clientX - e.currentTarget.offsetLeft; 
      const y = e.clientY - e.currentTarget.offsetTop; 

      popup.animate({
        left: `${x}px`,
        top: `${y}px`
      }, {duration: 3000, fill: "both", easing: 'ease-out'})
    }
  });
})();

/*
|--------------------------------------------------------------------------
| Logo
|--------------------------------------------------------------------------
|
| Create a popup the follows the cursor position
|
*/

(() => {
  const logo = document.querySelector('.custom-logo');

  ImgToSvg.convert(logo, function() {
    anime({
      targets: this,
      opacity: 1,
      duration: 1000,
      easing: 'easeOutQuart'
    })
  });
})();

/*
|--------------------------------------------------------------------------
| Btn double icon effect
|--------------------------------------------------------------------------
|
| Create a popup the follows the cursor position
|
*/

document.querySelectorAll('.btn-double-icon').forEach(btn => {
  const icon = btn.querySelector('[data-svg]');
  const iconDouble = icon.cloneNode();
  ImgToSvg.convert(iconDouble);
  btn.appendChild(iconDouble);
})