<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
  if (! is_front_page()) { 
    $thumbnail = get_the_post_thumbnail_url(); ?>

    <header 
      class="entry-header <?= $thumbnail ? 'banner overlay overlay-dark overlay-25' : '' ?>" 
      style="<?= $thumbnail ? sprintf('background-image: url(%s);', $thumbnail) : '' ?>"
    >
      <div class="container h-100 d-flex align-items-end">
        <h1 class="entry-title<?= $thumbnail ? ' text-light' : '' ?>">

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