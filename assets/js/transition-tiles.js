/**
 * Extention to transition.js
 * 
 * Allows to add tiles effect to an element
 */

window?.Transition.addSetting('tiles', (element, anime) => {
  const tileSize = element.dataset.tileSize ?? 150;
  const countX = Math.floor(element.offsetWidth / tileSize);
  const countY = Math.floor(element.offsetHeight / tileSize);
  const count = countX * countY;
  const wrapper = document.createElement('div');
  wrapper.classList.add('tiles');
  const tiles = [];

  [...Array(count + countX)].map((_, i) => {
    const tile = document.createElement('div');
    wrapper.appendChild(tile);
    tiles.push(tile);
  });

  const tilesToHideEachIteration = tiles.length / 8;

  element.prepend(wrapper);  
  element.style.opacity = 1;

  return {
    targets: tiles.sort(() => Math.random() - 0.5),
    opacity: 0,
    duration: 1600,
    easing: 'easeInOutBack', 
    delay: anime.stagger(75, {grid: [tilesToHideEachIteration, tilesToHideEachIteration]}),
    complete: () => {
      wrapper.remove();
    }
  };
});