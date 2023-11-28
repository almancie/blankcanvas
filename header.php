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
    <header class="site-header">
      <div class="container-fluid">
        <div class="row px-4 py-2">

          <!-- Menu -->
          <div class="col-3 d-flex align-items-center position-relative main-navigation-col">
            <nav class="navbar navbar-expand-lg main-navigation d-flex align-items-center justify-content-center">
              <button 
                type="button" 
                class="bc-menu-btn btn btn-outline-primary border-0 header-btn p-0 d-flex flex-center d-lg-none" 
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

          <!-- Logo -->
          <div class="col-6 d-flex align-items-center justify-content-center">
            <div class="site-branding fs-4" style="letter-spacing: -2px">

              <?php
              // the_custom_logo(); ?>
              <!-- blank <span class="px-2 pb-1 border border-2 border-dark ms-1">canvas</span> -->
              blank canvas

            </div>
          </div>

          <!-- Icons 1 -->
          <div class="col-3 d-flex align-items-center justify-content-end position-relative ms-auto">
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
            <div class="theme-toggle d-flex" aria-label="auto" aria-live="polite">
              <img class="icon icon-lg stroke-body me-2" data-svg src="http://localhost/wp/wp-content/uploads/2023/11/lamp-1-svgrepo-com.svg">
              <label class="theme-toggle-switch d-flex align-items-center">
                <input class="theme-toggle-input d-none" type="checkbox" role="theme-toggle-switch" />
                <div class="btn btn-outline-body light me-1">on</div>
                <div class="btn btn-outline-body dark">off</div>
              </label>
            </div>
          </div>

          <!-- Icons 2 -->
          <!-- <div class="col-auto border-start d-flex align-items-center justify-content-end px-5">
          </div> -->
        </div>
      </div>
    </header>