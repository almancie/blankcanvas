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

    <header class="site-header py-2 px-2">
      <div class="container-fluid">
        <div class="row align-items-center">

          <!-- Menu -->
          <div class="col-5 d-flex gap-3">
            <nav class="navbar navbar-expand--lg main-navigation">
              <button 
                aria-controls="offcanvasMenu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
                class="bc-menu-btn btn btn-outline-primary" 
                style="z-index: 9999; --btn-padding-x: 1.125rem; --btn-padding-y: 1.125rem;"
              >
                <div class="bc-menu-btn-icon" style="---icon-width: 36px;">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </button>

              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu">
                <!-- <div class="offcanvas-header">
                  Menu
                </div> -->
                <div class="offcanvas-body">

                  <?php
                  wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'main-menu',
                    'menu_class'     => 'menu main-menu bc-menu flex-column h-100 justify-content-center',
                    'container'      => false
                  ]); ?>

                </div>
              </div>
            </nav>

          </div>
               
          <!-- Logo -->
          <div class="col-2 d-flex align-items-center justify-content-center">
            <div class="site-branding py-3 me-2">
              <!-- <a href="<?= home_url() ?>" class="custom-logo-link border border-2 border-body rounded-circle d-flex flex-center text-body fs-5" 
                style="letter-spacing: -1px; height: 60px; width: 60px; padding-bottom: 2px" rel="home" aria-current="page">
                BC
              </a> -->

              <?php
              //the_custom_logo(); ?>

            </div>
          </div>

          <!-- Theme -->
          <div class="col-5 d-flex align-items-center justify-content-end position-relative">

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
            <div class="theme-toggle d-flex align-items-center me-4" aria-label="auto" aria-live="polite">
              <label class="theme-toggle-switch d-flex align-items-center position-relative">
                <input class="theme-toggle-input d-none" type="checkbox" role="theme-toggle-switch" />
                <div class="theme-toggle-btn light me-2">Light</div>
                <div class="theme-toggle-btn dark">Dark</div>
              </label>
              <!-- <i class="icon icon-md svg-body ms-3" data-svg="http://localhost/wp/wp-content/uploads/2023/11/lamp-1-svgrepo-com.svg"></i> -->
              <!-- <span class="theme-toggle-title ms-2">Mode</span> -->
            </div>

            <a href="#inquireOffcanvas" class="btn btn-secondary my-3" 
              style="letter-spacing: -1px; --btn-font-weight: 700; --btn-font-size: 1.25rem;" 
              data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasExample">
              Inquire
            </a>

          </div>
        </div>
      </div>
    </header>