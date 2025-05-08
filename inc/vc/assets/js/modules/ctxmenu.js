// Exported names for CSS classes
const menuNames = {
  menu: "ctx-menu-wrapper",
  item: "ctx-menu-item",
  separator: "ctx-menu-separator",
  hasIcon: "ctx-menu-hasIcon",
  darkInvert: "ctx-menu-darkInvert",
};

// Singleton manager
class Manager {
  static _instance = null;

  constructor() {
    if (Manager._instance) return Manager._instance;
    Manager._instance = this;
    this._currentMenuVisible = null;
    this._menus = new Map();
    document.addEventListener("contextmenu", this._openHandler.bind(this));
  }

  _openHandler(e) {
    const path = e.composedPath ? e.composedPath() : (e.path || []);
    const pair = this._findMenu(path.length ? path : e.target);
    this._closeVisible();
    if (!pair) return;

    e.preventDefault(); // Ensure browser menu is always suppressed for matches

    const [menu] = pair;
    menu._elementClicked = e.target;
    menu.open(e.pageX, e.pageY);
    this._currentMenuVisible = menu;
    document.addEventListener("click", this._closeVisible.bind(this));
    window.addEventListener("resize", this._closeVisible.bind(this));
  }

  _closeVisible() {
    if (!this._currentMenuVisible) return;
    this._currentMenuVisible.close();
    this._currentMenuVisible = null;
    document.removeEventListener("click", this._closeVisible.bind(this));
    window.removeEventListener("resize", this._closeVisible.bind(this));
  }

  _findMenu(path) {
    for (const el of path) {
      const m = this._hasMenu(el);
      if (m) return [m, el];
    }
    return null;
  }

  _hasMenu(el) {
    if (this._menus.has(el)) return this._menus.get(el);
    if (el.id && this._menus.has("#" + el.id)) return this._menus.get("#" + el.id);
    if (el.className) {
      for (const cls of el.className.split(" ")) {
        if (this._menus.has("." + cls)) return this._menus.get("." + cls);
      }
    }
    if (this._menus.has(el.nodeName)) return this._menus.get(el.nodeName);
    return null;
  }

  getMenu(el) {
    return this._menus.get(el);
  }

  createMenu(el) {
    const m = new Menu();
    this._menus.set(el, m);
    return m;
  }

  setValue(el, val) {
    this._menus.set(el, val);
  }
}

// Individual menu
class Menu {
  constructor() {
    this.container = document.createElement("div");
    this.container.className = menuNames.menu;
    document.body.appendChild(this.container);
    this.close();

    this._elementClicked = null;
    this._onOpen = null;
    this._onClose = null;
    this._onClick = null;
  }

  addItem(name, fn) {
    const item = document.createElement("div");
    item.className = menuNames.item;

    item.innerHTML = name;
    item.addEventListener("click", () => this._handleClick(fn));
    this.container.appendChild(item);
  }

  addItems(items) {
    for (const item in items) {
      if (typeof items[item]  !== 'function') {
        this.addSeparator();

        continue;
      }

      this.addItem(item, items[item]);
    }
  }

  addSeparator() {
    const sep = document.createElement("div");
    sep.className = menuNames.separator;
    this.container.appendChild(sep);
  }

  on(type, listener) {
    switch (type) {
      case "open": this._onOpen = listener; break;
      case "close": this._onClose = listener; break;
      case "click": this._onClick = listener; break;
    }
  }

  open(x, y) {
    this.container.style.display = "block";
    const W = document.documentElement.clientWidth + document.documentElement.scrollLeft;
    const H = document.documentElement.clientHeight + document.documentElement.scrollTop;
    if (x + this.container.offsetWidth > W) x = W - this.container.offsetWidth - 1;
    if (y + this.container.offsetHeight > H) y = H - this.container.offsetHeight - 1;
    this.container.style.left = x + "px";
    this.container.style.top = y + "px";
    this._onOpen?.();
  }
  
  close() {
    this.container.style.left = "0px";
    this.container.style.top = "0px";
    this.container.style.display = "none";
    this._onClose?.();
  }
  
  _handleClick(fn) {
    this.close();
    setTimeout(() => {
      fn(this._elementClicked);
      this._onClick?.();
    }, 1);
  }
}

// Single instance
const manager = new Manager();

// Module exports
const Ctx = {
  menuNames,
  createMenu: (el = document) => manager.getMenu(el) || manager.createMenu(el),
  block: (el) => manager.setValue(el, false),
  allowDefault: (el) => manager.setValue(el, true),
  closeAll: () => manager._closeVisible(),
};

export default Ctx;