<?php get_header(); ?>
<div style="clear:both;"></div>
<div class="wrapper" role="main">
  <?php get_template_part( 'templates/banner', get_post_format() ); ?>
    <div class="container">
    <?php get_template_part( 'templates/hot-topic', get_post_format() ); ?>
      <!-- End td-widget -->
      <div class="clear"></div>
      <div class="row library">
      <?php
        $current_category = get_queried_object();
        $args = array('child_of' => $current_category->term_id);
        $list_cats = get_categories($args);
        foreach ($list_cats as $m_cat) { $first_post = tutdev_first_post($m_cat->term_id); ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="nd-box">
            <a class="nd-bound" href="<?php echo get_permalink($first_post->ID); ?>" title="<?php echo $m_cat->name; ?>">
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
