export default function createContextMenu(containerSelector, id) {
  const container = document.querySelector(containerSelector);
  if (!container) throw new Error(`No element found for selector: "${containerSelector}"`);

  const menuEl = document.createElement('div');
  menuEl.id = id ?? 'custom-context-menu-' + Date.now() + '-' + Math.floor(Math.random() * 10000);
  menuEl.classList.add('wpbakery-context-menu');
  document.body.appendChild(menuEl);

  const items = [];

  function addItem(label, callback, expectedType = '', notify = false) {
    if (label === '-') {
      throw new Error('Use addSeparator() or addItems(["-"]) to add a separator.');
    }
    if (typeof callback !== 'function') {
      throw new Error('addItem requires a valid callback function.');
    }

    items.push({
      label,
      callback,
      expectedType,
      notify
    });
  }

  function addSeparator() {
    items.push('-');
  }

  function addItems(newItems) {
    newItems.forEach(item => {
      if (item === '-') {
        addSeparator();
      } else {
        const { label, callback, expectedType = '', notify = false } = item;
        addItem(label, callback, expectedType, notify);
      }
    });
  }

  function hideMenu() {
    menuEl.style.display = 'none';
  }

  function showMenu(x, y, target) {
    menuEl.innerHTML = '';

    const elementType = target.dataset.element_type || '';
    const modelId = target.dataset.modelId;
    const model = modelId ? vc.shortcodes.get(modelId) : null;

    // Get visible items
    const visibleItems = items.filter(item => {
      if (item === '-') return true;

      if (typeof item.expectedType === 'function') {
        return item.expectedType(model, target);
      }

      return item.expectedType === '' || item.expectedType === elementType;
    });

    // Clean up separators (no leading, trailing, or double)
    const cleanedItems = [];
    for (let i = 0; i < visibleItems.length; i++) {
      const current = visibleItems[i];
      const prev = cleanedItems[cleanedItems.length - 1];

      if (current === '-') {
        if (!prev || prev === '-') continue;
        if (i === visibleItems.length - 1) continue;
      }

      cleanedItems.push(current);
    }

    if (cleanedItems.length === 0) return;

    // Render menu
    cleanedItems.forEach(item => {
      const div = document.createElement('div');

      if (item === '-') {
        div.className = 'separator';
      } else {
        div.textContent = item.label;
        div.className = 'menu-item';
        div.onclick = () => {
          item.callback(model, target);

          if (item.notify && model?.view?.el) {
            const el = model.view.el;
            el.setAttribute('data-element-updated', 'true');

            setTimeout(() => {
              el.removeAttribute('data-element-updated');
            }, 1000);
          }

          hideMenu();
        };
      }

      menuEl.appendChild(div);
    });

    menuEl.style.top = `${y}px`;
    menuEl.style.left = `${x}px`;
    menuEl.style.display = 'block';
  }

  container.addEventListener('contextmenu', function (e) {
    const clicked = e.target;
    const target = clicked.closest('[data-element_type]');
    if (!target || !container.contains(target)) return;

    e.preventDefault();
    showMenu(e.pageX, e.pageY, target);
  });

  document.addEventListener('click', hideMenu);

  return {
    addItem,
    addItems,
    addSeparator
  };
}