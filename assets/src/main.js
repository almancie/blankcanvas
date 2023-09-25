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
// import 'bootstrap/js/dist/dropdown';
// import 'bootstrap/js/dist/modal';
import 'bootstrap/js/dist/offcanvas';
// import Popover from 'bootstrap/js/dist/popover';
// import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/tab';
// import 'bootstrap/js/dist/toast';
// import 'bootstrap/js/dist/tooltip';

// document.querySelectorAll('[data-bs-toggle="popover"]').forEach(element => new Popover(element));

/**
 * React Components
 */

import { createRoot } from 'react-dom/client';
import Search from './react-components/Search.jsx';

const searchRoot = document.getElementById('offcanvasSearchBody');
createRoot(searchRoot)?.render(<Search />);

/**
 * Body Width
 */
function setBodyWidthVariable() {
  document.body.style.setProperty('--body-width', document.documentElement.clientWidth + 'px');
}

document.addEventListener('DOMContentLoaded', setBodyWidthVariable, false); 
window.addEventListener('load', setBodyWidthVariable);
window.addEventListener('resize', setBodyWidthVariable, false);

/**
 * Header Height
 */
function setHeaderHeightVariable() {
  document.body.style.setProperty('--header-height', (document.querySelector('.site-header')?.offsetHeight ?? 0) + 'px');
}

document.addEventListener('DOMContentLoaded', setHeaderHeightVariable, false); 
window.addEventListener('load', setHeaderHeightVariable);
window.addEventListener('resize', setHeaderHeightVariable, false);