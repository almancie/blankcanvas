window.addEventListener('load', () => {
  const tileWidth = 150;
  const tileHeight = 150;

  document.querySelectorAll('[data-tiles]').forEach(element => {  
    const countX = Math.floor(element.offsetWidth / tileWidth);
    const countY = Math.floor(element.offsetHeight / tileHeight);
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

    onScreen(element.dataset.tilesAnchor ?? element, () => {
      setTimeout(() => {
        anime({
          targets: tiles.sort(() => Math.random() - 0.5),
          opacity: 0,
          duration: 500,
          easing: 'easeOutSine', 
          delay: anime.stagger(200, {grid: [tilesToHideEachIteration, tilesToHideEachIteration]}),
          complete: () => {
            wrapper.remove();
          }
        });
      }, element.dataset.tilesDelay ?? 0);
    });
  });
});