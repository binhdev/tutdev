<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-thumbnail">
    <?php tutdev_thumbnail( 'thumbnail' ); ?>
  </div>
  <header class="entry-header">
    <?php tutdev_entry_header(); ?>
  </header>
  <div class="entry-content">
    <?php tutdev_entry_content(); ?>
    <?php ( is_single() ? tutdev_entry_tag() : '' ); ?>
  </div>
</article>
