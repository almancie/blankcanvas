/*
|--------------------------------------------------------------------------
| Menu
|--------------------------------------------------------------------------
|
| Links toggle buttons to sub menus for mobile.
|
| Adding .bc-menu class to any menu will enable 
| the toggle functionality to its sub menues.
|
*/

// Elements
const menu = document.querySelector('.bc-menu');
const menuBtn = document.querySelector('.bc-menu-btn');
const container = document.querySelector(menuBtn.dataset.bsTarget);

// Menu btn class
container.addEventListener(`show.bs.${menuBtn.dataset.bsToggle}`, event => {
  menuBtn.classList.add('open');
})

container.addEventListener(`hide.bs.${menuBtn.dataset.bsToggle}`, event => {
  menuBtn.classList.remove('open');
})

// Sub menus
menu.querySelectorAll('[data-bs-toggle]').forEach(btn => {
  let subMenu = btn.closest('li').querySelector(':scope > ul');

  if (! subMenu) return;

  let target = btn.dataset['bsTarget'];

  subMenu.id = target.slice(1);

  subMenu.classList.add('collapse');

  // Animate icon on click
  // btn.addEventListener('click', e => {
    // let outElement = e.target;

    // let inElement = e.target.classList.contains('open')
    //   ? btn.querySelector('.close')
    //   : btn.querySelector('.open');

    // let isOpen = inElement.classList.contains('close');

    // Toggle 'open' class to parent li element.
    // e.target.closest('.menu-item').classList.toggle('open');

    // let value = 100;

    // anime({
    //   targets: outElement,
    //   marginTop: isOpen ? value : -value,
    //   opacity: 0,
    //   duration: 1000,
    //   easing: 'easeInOutBack',
    // });

    // anime({
    //   targets: inElement,
    //   opacity: [0, 1],
    //   marginTop: [isOpen ? -value : value, 0],
    //   duration: 1000,
    //   easing: 'easeInOutExpo',
    // });
  // })
});