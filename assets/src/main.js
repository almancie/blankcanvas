/**
 * Bootstrap
 */

// SCSS
import './scss/main.scss';

// JS
// import 'bootstrap/js/dist/alert';
// import 'bootstrap/js/dist/button';
// import 'bootstrap/js/dist/carousel';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/dropdown';
// import 'bootstrap/js/dist/modal';
import 'bootstrap/js/dist/offcanvas';
import Popover from 'bootstrap/js/dist/popover';
// import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/tab';
// import 'bootstrap/js/dist/toast';
// import 'bootstrap/js/dist/tooltip';

document.querySelectorAll('[data-bs-toggle="popover"]').forEach(element => new Popover(element));

/**
 * React Components
 */

import { createRoot } from 'react-dom/client';

// Search
import Search from './react-components/Search.jsx';

const searchRoot = document.getElementById('offcanvasSearchBody');

if (searchRoot) {
  createRoot(searchRoot).render(<Search />);
}

/**
 * Body Width
 */
function _setBodyWidthVariable() {
  document.body.style.setProperty('--body-width', document.documentElement.clientWidth + 'px');
}

window.addEventListener('resize', _setBodyWidthVariable, false);
document.addEventListener('DOMContentLoaded', _setBodyWidthVariable, false); 
window.addEventListener('load', _setBodyWidthVariable);