window.addEventListener('load', () => {
  const menus = document.querySelectorAll('.animatab, [data-animatab]');

  // Gets coordinates of the passed item
  const getCoordinates = item => ({
    top: item.offsetTop,
    left: item.offsetLeft,
    height: item.offsetHeight,
    width: item.offsetWidth,
  });

  menus.forEach(menu => {
    const settings = {
      event: menu.dataset.animatabEvent ?? 'mouseover',
      activeClass: menu.dataset.animatabActiveclass ?? 'active',
      timing: {
        easing: menu.dataset.animatabEasing ?? 'easeOutCubic',
        duration: menu.dataset.animatabDuration ?? 500,
      }
    };

    if (! menu.style.position) {
      menu.style.position = 'relative';
    }

    // Create highlighter
    const highlighter = document.createElement('div');

    highlighter.classList.add('highlighter');

    const style = {
      opacity: 0,
      position: 'absolute',
      pointerEvents: 'none',
    };

    const animation = {
      targets: highlighter,
      ...(settings.timing),
      opacity: 1,
    }

    // Basic styling
    for (let property in style) {
      highlighter.style[property] = style[property];
    }

    menu.appendChild(highlighter);

    for (const child of menu.children) {
      child.addEventListener(settings.event, () => {
        menu.classList.add('active');

        anime({
          ...animation,
          ...getCoordinates(child)
        });
      });
    }

    highlighter.style.opacity = 1;


    const goToActive = (duration) => {
      const active = menu.querySelector('.current-menu-item');

      const coordinates = active ? getCoordinates(active) : {left: 0, width: 0};

      anime({
        ...animation,
        ...coordinates,
        duration: duration ?? animation.duration,
      });
      
    }

    menu.addEventListener('mouseleave', () => {
      goToActive();

      menu.classList.remove('active');
    });

    goToActive(0);
  });
});