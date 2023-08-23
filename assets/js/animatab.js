(function() {
  /*
  | Animatab
  | Ver. 1.0.0
  | Author: Blank Canvas (www.blankcanvas.me)
  |
  | This library allows us to create smooth click/hover effect on menus and tabs
  |
  */

  /*
  |--------------------------------------------------------------------------
  | Globals
  |--------------------------------------------------------------------------
  |
  | Defines some global variables
  |
  */

  /**
   * Default Settings
   */
  const defaultSettings = {
    class: 'animatab',
    hoverClass: 'animatab-on',
    itemClass: 'animatab-item',
    activeItemClass: 'active',
    highlighterTag: 'div',
    highlighterClass: 'animatab-highlighter',
    highlighterStyle: {},
    highlighterAnimation: {},
    highlighterOnStartAnimation: {},
    highlighterDefaultPosition: {top: 0, left: 0, height: 0, width: 0},
    animateOnClick: true,
    animateOnHover: false,
    animateOnStart: true,
  };

  /**
   * Elements added manually
   */
  const userElements = [];

  /*
  |--------------------------------------------------------------------------
  | Helpers
  |--------------------------------------------------------------------------
  |
  | Defines some helper functions
  |
  */

  /**
   * Parses passed value into object if necessary
   */
  const parse = (value) => {
    let object;

    try {
      object = JSON.parse(value);
    } catch (e) {
      return value;
    }

    return object;
  }

  /**
   * Gets element offset position
   */
  const getElementPosition = element => ({
    top: element.offsetTop,
    left: element.offsetLeft,
    height: element.offsetHeight,
    width: element.offsetWidth,
  });

  /**
   * Creates HTML element
   */
  const createElement = (tag, className, style) => {
    const element = document.createElement(tag);

    element.classList.add(className);

    for (const property in style) {
      element.style[property] = style[property];
    }

    return element;
  }

  /**
   * Checks if value is true
   */
  const isTrue = value => value === true || value === 'true';

  /*
  |--------------------------------------------------------------------------
  | Library functions
  |--------------------------------------------------------------------------
  |
  | Does the actual work
  |
  */

  /**
   * Adds element to be animatabed
   */
  function add(selector, settings = {}) {
    userElements.push({selector, settings});
  };

  /**
   * Gets active element offset position
   */
  function getActiveElementPosition(container, settings) {
    const activeElement = container.querySelector(`.${settings.activeItemClass}`);

    if (! activeElement) return settings.highlighterDefaultPosition;

    return getElementPosition(
      container.contains(activeElement)
        ? activeElement
        : activeElement.closest(settings.itemClass)
    )
  };

  /**
   * Animate to element
   */
  function animateToElement(element, highlighter, settings, isActive = false, additionalAnimation = {}) {
    anime({
      targets: highlighter,
      opacity: 1,
      duration: 800,
      easing: 'easeInOutCirc',
      ...settings.highlighterAnimation ?? {},
      ...additionalAnimation,
      ...(isActive ? getActiveElementPosition(element, settings) : getElementPosition(element))
    });
  }

  /**
   * Creates animatab element
   */
  function animatab(element, settings = {}) {

    // Element
    element.classList.add(settings.class);
    element.style.position = 'relative';

    // Highlighter
    const highlighter = createElement(
      settings.highlighterTag, 
      settings.highlighterClass, 
      {
        opacity: 0,
        position: 'absolute',
        pointerEvents: 'none',
        zIndex: 0,
        ...settings.highlighterStyle ?? {}
      }
    );

    // Event handlers
    [...element.children].forEach(child => {
      child.classList.add(settings.itemClass);

      if (isTrue(settings.animateOnClick)) {

        // Animate to item on click
        child.addEventListener('click', () => animateToElement(child, highlighter, settings));
      }

      // Animate to item on hover
      child.addEventListener('mouseover', () => {
        element.classList.add(settings.hoverClass);

        if (! isTrue(settings.animateOnHover)) return;

        animateToElement(child, highlighter, settings);
      });
    });

    // Animate back to active item on mouse leave
    element.addEventListener('mouseleave', () => {
      element.classList.remove(settings.hoverClass);

      if (! isTrue(settings.animateOnHover)) return;
  
      animateToElement(element, highlighter, settings, true);
    });
    
    // Attach highlighter
    element.appendChild(highlighter);

    if (isTrue(settings.animateOnStart)) {
      
      // Animate to active item on load
      animateToElement(element, highlighter, settings, true, settings.highlighterOnStartAnimation);

      return;
    }

    // Go to active item on load
    animateToElement(element, highlighter, settings, true, {
      duration: 0
    });
  }

  /**
   * Init
   */
  function init(settings = {}) {
    settings = {...defaultSettings, ...settings};

    // Dynamically selected
    const animatabElements = document.querySelectorAll('[data-animatab="true"]');

    animatabElements.forEach(element => {
      const data = element.dataset;

      const elementSettings = {};

      Object.keys(data).filter(name => name.startsWith('animatab') && name !== 'animatab').forEach(name => {
        elementSettings[name.charAt(8).toLowerCase() + name.slice(9)] = parse(data[name]);
      });

      animatab(element, {
        ...settings, 
        ...elementSettings
      });
    });

    // Manually selected
    userElements.forEach(userElement => {
      const element = document.querySelector(userElement.selector);

      if (! element) return;

      animatab(element,  {
        ...settings, 
        ...userElement.settings
      });
    });
  }

  window.Animatab = {add, init};
})();