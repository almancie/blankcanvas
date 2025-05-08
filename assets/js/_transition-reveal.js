/**
 * Extention to transition.js
 * 
 * Allows to add tiles effect to an element
 */

['reveal', 'revealStart'].forEach(name => {
  window?.Transition.addSetting(name, (element, anime) => {
    const cover = document.createElement('div');
    cover.classList.add('cover');
    element.prepend(cover);  
    element.style.opacity = 1;
  
    return {
      targets: cover,
      width: 0,
      duration: 1500,
      easing: 'easeOutCubic',
      complete: () => {
        cover.remove();
      },
    };
  });
});