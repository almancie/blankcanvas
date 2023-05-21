<?php
get_header(); ?>

  <main class="site-main">

    <?php
    while (have_posts()) {
      the_post();

      get_template_part('template-parts/content', 'page');
    } ?>

  </main>

<?php
get_footer();