<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php 
  wp_head(); ?>

</head>
<body <?php body_class(); ?>>

  <?php 
  wp_body_open(); ?>

  <div class="site">
    <header class="site-header border-bottom">
      <div class="container-fluid">
        <div class="row" style="height: 90px">

          <!-- Logo -->
          <div class="col-3 d-flex align-items-center px-4">
            <div class="site-branding">

              <?php
              the_custom_logo(); ?>

            </div>
          </div>

          <!-- Menu -->
          <div class="col-6 d-flex align-items-center justify-content-center border-start px-5">
            <nav class="navbar main-navigation d-flex align-items-center justify-content-center">
              <button 
                type="button" 
                class="bc-menu-btn btn p-2 border-0" 
                aria-controls="offcanvasMenu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
              >
                <div class="bc-menu-btn-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </button>
              <div class="offcanvas" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
                <!-- <div class="offcanvas-header">
                  Menu
                </div> -->
                <div class="offcanvas-body d-flex flex-center">

                  <?php
                  wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'main-menu',
                    'menu_class'     => 'menu main-menu bc-menu',
                    'container'      => false
                  ]); ?>

                </div>
              </div>
            </nav>
          </div>

          <!-- Icons 1 -->
          <div class="col-3 border-start d-flex flex-center px-5">
            <button class="btn p-0 border-0" role="button" aria-controls="offcanvasSearch" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch">
              <img src="<?= get_template_directory_uri() ?>/assets/imgs/search-normal.svg" width="24px" height="24px" class="filter-body-color" />
            </button>
            <input class="form-control border-0 shadow-none" />
            <div class="offcanvas offcanvas-start text-start" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
              <div class="offcanvas-body d-lg-flex align-items-lg-center px-0 pb-0" id="offcanvasSearchBody">
                <!-- Search component goes here -->
              </div>
            </div>
            <button class="theme-toggle btn border-0 p-0" title="Toggles light & dark" aria-label="auto" aria-live="polite">
              <svg class="sun-and-moon" aria-hidden="true" width="28" height="28" viewBox="0 0 24 24">
                <mask class="moon" id="moon-mask2">
                  <rect x="0" y="0" width="100%" height="100%" fill="var(--light)"></rect>
                  <circle cx="24" cy="10" r="6"></circle>
                </mask>
                <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask2)" fill="var(--body-color)" />
                <g class="sun-beams" stroke="var(--body-color)" stroke-width="2">
                  <line x1="12" y1="1" x2="12" y2="3" />
                  <line x1="12" y1="21" x2="12" y2="23" />
                  <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                  <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                  <line x1="1" y1="12" x2="3" y2="12" />
                  <line x1="21" y1="12" x2="23" y2="12" />
                  <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                  <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                </g>
              </svg>
            </button>
  
            <div class="form-check form-switch form-check-reverse mb-0 ms-3">
              <input class="theme-toggle form-check-input mt-0" type="checkbox" id="theme-toggle-switch">
            </div>
          </div>
          
          <!-- Icons 2 -->
          <!-- <div class="col-auto border-start d-flex align-items-center justify-content-end px-5">
          </div> -->
        </div>
      </div>
    </header>