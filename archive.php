<?php get_header(); ?>
<div style="clear:both;"></div>
<div class="wrapper" role="main">
  <?php get_template_part( 'templates/banner', get_post_format() ); ?>
    <div class="container">
    <div class="xs-col-12 sm-col-6 col-md-12 td-widget">
      <?php get_template_part( 'templates/share', get_post_format() ); ?>
    </div>
      <!-- End td-widget -->
      <div class="clear"></div>
      <?php
        $current_category = get_queried_object();
        $args = array('child_of' => $current_category->term_id);
        $list_cats = get_categories($args);
        $count_list_cats = count($list_cats);

        $per_page = 10;
        $page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $index = 0;
        $args = array(
          'cat_url' => get_category_link($current_category),
          'page' => $page,
          'per_page' => $per_page,
          'count_list_cats' => $count_list_cats
        );

        if($count_list_cats / $per_page > 1)
          tutdev_page_nav_category($args);

        foreach ($list_cats as $m_cat) {
          $index++;
          $first_post = tutdev_first_post($m_cat->term_id);
          if($index <= $page * $per_page && $index > ($page - 1) * $per_page): ?>
          <div class="row">
            <div class="col-md-12">
              <div class="cat-thumbnail">
                <a class="" href="<?php echo get_permalink($first_post->ID); ?>" title="<?php echo $m_cat->name; ?>">
                  <?php if(has_category_thumbnail($m_cat->term_id)) {
                    the_category_thumbnail($m_cat->term_id);
                  } ?>
                </a>
              </div>
              <div class="cat-info">
                <a href="<?php echo get_permalink($first_post->ID); ?>" title="<?php echo $m_cat->name; ?>">
                  <h2 class="cat-name"><?php echo $m_cat->name; ?></h2>
                </a>
                <p><?php echo $m_cat->description; ?></p>
              </div>
            </div>
          </div>
        <?php endif; } ?>
        <?php if($count_list_cats / $per_page > 1) tutdev_page_nav_category($args); ?>
      <div class="clear"></div>
  </div>
  <!-- End wrapper -->

<?php get_footer(); ?>
