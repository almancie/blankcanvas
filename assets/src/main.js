/**
 * Bootstrap
 */

// SCSS
import './scss/main.scss';

// JS
import {
  // Alert,
  // button,
  // carousel,
  collapse,
  dropdown,
  // modal,
  offcanvas,
  // popover,
  // scrollspy,
  tab,
  // toast,
  // tooltip
} from 'bootstrap';

/**
 * React
 */

import { createRoot } from 'react-dom/client';
import Search from './react-components/Search.jsx';

const searchElement = document.getElementById('offcanvasSearchBody');

if (searchElement) {

  // Search Component
  const root = createRoot(searchElement);
  
  root.render(<Search />);
}