<?php get_header(); ?>
<div style="clear:both;"></div>
<div class="wrapper" role="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <?php get_template_part( 'sidebar', get_post_format() ); ?>
      </div>
      <div class="col-md-9 main-content">
        <?php tutdev_pagination(); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
        <?php tutdev_pagination(); ?>
      </div>
    </div>
  </div>
</div>
  <!-- End wrapper -->

<?php get_footer(); ?>
