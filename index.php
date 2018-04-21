<?php get_header(); ?>
<div class="clear"></div>
<div class="wrapper" role="main">
  <?php get_template_part( 'templates/banner', get_post_format() ); ?>
  <div class="container">
    <div class="col-xs-12 sm-col-12 col-md-12 td-widget">
      <?php get_template_part( 'templates/hot-topic', get_post_format() ); ?>
      <?php get_template_part( 'templates/share', get_post_format() ); ?>
    </div>
    <div class="clear"></div>
    <div class="row">
    <?php
      $args = array(
        'orderby' => 'name',
        'parent' => 0
      );
      $list_cats = get_categories($args);
      foreach ($list_cats as $m_cat) { ?>
      <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="nd-box">
          <a class="nd-bound" href="<?php echo get_category_link($m_cat->term_id); ?>" title="<?php echo $m_cat->name; ?>">
            <?php if(has_category_thumbnail($m_cat->term_id)) {
              the_category_thumbnail($m_cat->term_id);
            } ?>
            <div class="nd-content">
              <span><?php echo $m_cat->name; ?></span>
            </div>
          </a>
        </div>
      </div>
    <?php } ?>
    <div class="clear"></div>
    <!-- End library -->
    </div>
  </div>
  <!-- End wrapper -->

<?php get_footer(); ?>
