<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
  if (! is_front_page()) { 
    $thumbnail = get_the_post_thumbnail_url(); ?>

    <header 
      class="entry-header" 
      style="<?= $thumbnail ? sprintf('background-image: url(%s)', $thumbnail) : '' ?>"
    >
      <div class="container h-100 d-flex flex-center">
        <h1 class="entry-title mb-0<?= $thumbnail ? ' text-light' : '' ?>">

          <?php
          the_title() ?>

        </h1>
      </div>
    </header>

  <?php
  } ?>

  <div class="entry-content">
    <div class="container">

      <?php
      the_content(); ?>

    </div>
  </div>
</article>