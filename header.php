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
    <header class="site-header d-flex align-items-center justify-content-between py-2 py-lg-3">
      <div class="container-xxl">
        <div class="row align-items-center justify-content-between">

          <!-- Logo -->
          <div class="col-auto col-lg-2 d-flex justify-content-center justify-content-lg-start">
            <div class="site-branding">

              <?php
              the_custom_logo(); ?>

            </div>
          </div>

          <!-- Menu -->
          <div class="col-auto">
            <nav class="navbar main-navigation d-flex align-items-center">
              <button 
                type="button" 
                class="bc-menu-btn btn border-0 d-flex flex-center d-lg-none p-2" 
                aria-controls="offcanvasMenu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
              >
                <svg width="32px" height="32px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <line x1="4" x2="44" y1="19" y2="19" stroke-width="2" />
                    <line x1="4" x2="44" y1="32" y2="32" stroke-width="2" />
                  </g>
                  
                  <g>
                    <line x1="4" x2="44" y1="24" y2="24" stroke-width="2" />
                    <line x1="4" x2="44" y1="24" y2="24" stroke-width="2" />
                  </g>
                </svg>
                <!-- <i class="material-symbols-outlined">menu</i> -->
                <!-- <?=__('Menu', 'blankcanvas') ?> -->
              </button>
              <div class="offcanvas-lg offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
                <div class="offcanvas-header">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="darkSwitch">
                    <label class="form-check-label" for="darkSwitch">
                      <i class="bi bi-moon-stars-fill"></i>
                    </label>
                  </div>
                  <!-- <a class="btn p-0" role="button" aria-controls="offcanvasSearch" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch">
                    <i class="bi bi-search"></i>
                  </a> -->
                </div>
                <div class="offcanvas-body d-lg-flex align-items-lg-center px-0">

                  <?php
                  wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'main-menu',
                    'menu_class'     => 'menu main-menu bc-menu animatab',
                    'container'      => false
                  ]); ?>

                </div>
              </div>
            </nav>
          </div>

          <!-- Icons -->
          <div class="col-auto col-lg-2 icons-col d-none d-lg-flex align-items-center justify-content-end">
            <a class="site-header-btn btn d-inline-flex flex-center px-2" role="button" aria-controls="offcanvasSearch" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch">
              <!-- <i class="bi bi-search"></i> -->
              <svg width="20px" height="20px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                </defs>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-259.000000, -280.000000)" fill="var(--btn-color)">
                    <g id="icons" transform="translate(56.000000, 160.000000)">
                      <path d="M207.45515,134.343 L208.93985,135.757 L204.48575,140 L203,138.586 L207.45515,134.343 Z M215.6,134 C212.1266,134 209.3,131.308 209.3,128 C209.3,124.691 212.1266,122 215.6,122 C219.07445,122 221.9,124.691 221.9,128 C221.9,131.308 219.07445,134 215.6,134 L215.6,134 Z M215.6,120 C210.9611,120 207.2,123.582 207.2,128 C207.2,132.418 210.9611,136 215.6,136 C220.23995,136 224,132.418 224,128 C224,123.582 220.23995,120 215.6,120 L215.6,120 Z" id="search_right-[#1505]">
                      </path>
                    </g>
                  </g>
                </g>
              </svg>
            </a>
            <div class="offcanvas offcanvas-end text-start" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
              <div class="offcanvas-body d-lg-flex align-items-lg-center px-0 pb-0" id="offcanvasSearchBody"></div>
            </div>
          </div>
        </div>
      </div>
    </header>