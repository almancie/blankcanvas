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

    <header class="site-header px-3">
      <div class="container">
        <div class="row align-items-center">

          <!-- Logo -->
          <div class="col-3">
            <div class="site-branding">
              <!-- <a href="<?= home_url() ?>" class="custom-logo-link border border-2 border-body rounded-circle d-flex flex-center text-body fs-5" 
                style="letter-spacing: -1px; height: 60px; width: 60px; padding-bottom: 2px" rel="home" aria-current="page">
                BC
              </a> -->
              <a style="letter-spacing: 7px; font-size: 1rem; font-weight: 600">BLANK <i class="text-primary">CANVAS</i></a>

              <?php
              //the_custom_logo(); ?>

            </div>
          </div>

          <!-- Menu -->
          <div class="col-6">
            <nav class="navbar navbar-expand-lg main-navigation">
              <a 
                aria-controls="offcanvasMenu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
                class="bc-menu-btn btn btn-link d-lg-none" 
                style="z-index: 9999; --btn-padding-x: 1rem; aspect-ratio: 1;"
              >
                <div class="bc-menu-btn-icon" style="--icon-height: 24px; --icon-width: 32px;">
                  <span></span>
                  <span class="d-none"></span>
                  <span></span>
                </div>
                <!-- <span class="text-uppercase" style="font-size: 1.125rem; font-weight: 500;">menu</span> -->
              </a>

              <div class="offcanvas offcanvas-start offcanvas-menu" tabindex="-1" id="offcanvasMenu">
                <!-- <div class="offcanvas-header h-header justify-content-end">
                  <a class="btn btn-primary">Inquire</a>
                </div> -->
                <div class="offcanvas-body justify-content-center">

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

          <!-- Extra options -->
          <div class="col-3 d-flex align-items-center justify-content-end position-relative gx-0">

            <!-- <div class="border-start position-absolute start-0 top-50 translate-middle-y" style="height: 45px;"></div> -->
            <!-- <div class="border overflow-hidden rounded-pill d-flex px-3 me-3">
              <button class="btn p-0 border-0" role="button" aria-controls="offcanvasSearch" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch">
                <img src="<?= get_template_directory_uri() ?>/assets/imgs/search-normal.svg" width="24px" height="24px" class="filter-body-color" />
              </button>
              <input class="header-search-input form-control border-0 shadow-none px-3" />
            </div> -->
            <div class="offcanvas offcanvas-start text-start" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
              <div class="offcanvas-body d-lg-flex align-items-lg-center px-0 pb-0" id="offcanvasSearchBody">
                <!-- Search component goes here -->
              </div>
            </div>
            <!-- <div class="form-check form-theme-toggle-switch form-check-reverse mb-0">
              <input class="theme-toggle form-check-input mt-0" type="checkbox" id="theme-toggle-theme-toggle-switch">
            </div> -->

            <!-- <div class="theme-toggle ms-4 me-n2" aria-label="auto" aria-live="polite"> -->
            <div class="theme-toggle" aria-label="auto" aria-live="polite">
              <label class="theme-toggle-switch d-inline-flex align-items-center position-relative" for="themeToggleInput">
                <input id="themeToggleInput" class="theme-toggle-input d-none" type="checkbox" role="theme-toggle-switch" />
                <!-- <i class="icon icon-md svg-body me-3" 
                   data-svg="http://localhost/wp/wp-content/uploads/2023/11/lamp-1-svgrepo-com.svg"
                   style="--svg-stroke-width: 1.5px"></i> -->
                <img src="<?= get_stylesheet_directory_uri() . '/assets/imgs/moon.png' ?>" width="35px" class="me-3" style="rotate: 45deg;">
                <!-- <span class="theme-toggle-title ms-1 me-2">LIGHTS</span> -->
                <div class="theme-toggle-btns d-flex gap-2 text-uppercase">
                  <span class="theme-toggle-highlighter"></span>
                  <div class="theme-toggle-btn light">L</div>
                  <div class="theme-toggle-btn dark">D</div>
                </div>
              </label>
            </div>

            <!-- <a href="#offcanvasInquire" 
               class="btn btn-link ms-4 text-uppercase" 
               style="--btn-font-size: 1rem; --btn-font-weight: 500; --btn-padding-x: 1rem; --btn-padding-y: 1rem; --btn-color: var(--primary); 
                      text-decoration: underline; text-underline-offset: 10px; text-decoration-thickness: 2px;" 
               data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasInquire">
              Inquire
            </a> -->

            <!-- <a href="#offcanvasInquire" 
               class="btn btn-primary text-uppercase" 
               style="--btn-font-size: 1rem; --btn-font-weight: 500; --btn-padding-x: 1rem; --btn-padding-y: .875rem; --btn-border-radius: 1rem; letter-spacing: 1px;" 
               data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasInquire">
              Inquire
            </a> -->

          </div>
        </div>
      </div>
    </header>