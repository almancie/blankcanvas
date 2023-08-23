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
    <header class="site-header d-flex align-items-center justify-content-between p-lg-3">
      <div class="container-xxl">
        <div class="row align-items-center justify-content-between flex-row-reverse">

          <!-- Logo -->
          <div class="col-auto">
            <div class="site-branding px-2">

              <?php
              the_custom_logo(); ?>

            </div>
          </div>

          <!-- Menu -->
          <div class="col-auto">
            <nav class="navbar main-navigation d-flex align-items-center">
              <button 
                type="button" 
                class="bc-menu-btn btn p-2 border-0 d-lg-none" 
                aria-controls="offcanvasMenu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
              >
                <div class="bc-menu-btn-icon">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </button>
              <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
                <div class="offcanvas-header justify-content-end h-auto py-2 mt-1">
                  <button class="theme-toggle btn p-2 border-0" title="Toggles light & dark" aria-label="auto" aria-live="polite">
                    <svg class="sun-and-moon" aria-hidden="true" width="28" height="28" viewBox="0 0 24 24">
                      <mask class="moon" id="moon-mask">
                        <rect x="0" y="0" width="100%" height="100%" fill="var(--light)" />
                        <circle cx="24" cy="10" r="6" />
                      </mask>
                      <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="var(--offcanvas-color)" />
                      <g class="sun-beams" stroke="var(--dark)" stroke-width="2">
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
                  <div class="icon-separator"></div>
                  <button class="btn p-2 border-0 mb-1" role="button" aria-controls="offcanvasSearch" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch">
                    <img src="<?= get_template_directory_uri() ?>/assets/imgs/search-normal.svg" width="24px" height="24px" class="filter-body-color" />
                  </button>
                </div>
                <div class="offcanvas-body d-lg-flex align-items-lg-center">

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

          <div class="offcanvas offcanvas-start text-start" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
            <div class="offcanvas-body d-lg-flex align-items-lg-center px-0 pb-0" id="offcanvasSearchBody"></div>
          </div>
          <!-- Icons -->
          <!-- <div class="col-auto col-lg-2 icons-col d-lg-flex align-items-center justify-content-end">
            <button class="btn" role="button" aria-controls="offcanvasSearch" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch">
              <i class="bi bi-search"></i>
            </button>
          </div> -->
        </div>
      </div>
    </header>