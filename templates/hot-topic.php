<a href="" title="Search">
  <img src="<?php echo get_template_directory_uri() ?>/images/dev-logo.png" alt="Search" style="padding-top:5px;">
</a>
<div class="row hot-topic">
<?php
  $args = array(
    'orderby' => 'id',
    'order' => 'DESC',
    'number'=> 4
  );
  $list_cats = get_categories($args);
?>
<?php foreach ($list_cats as $m_cat) { if($m_cat->parent == 0) continue; $first_post = tutdev_first_post($m_cat->term_id); ?>
<div class="col-lg-3 col-md-3 col-xs-6 col-sm-12">
  <div class="video-list">
    <a href="<?php echo get_permalink($first_post->ID); ?>">
      <div class="mycouse">
        <?php if(has_category_thumbnail($m_cat->term_id)) {
          the_category_thumbnail($m_cat->term_id);
        } ?>
      </div>
    </a>
    <div class="vid-title">
      <a href="<?php echo get_permalink($first_post->ID); ?>" title="<?php echo $m_cat->name; ?>">
        <?php echo $m_cat->name; ?>
        <span class="new-title">(New)</span>
      </a>
    </div>
    <div class="vid-tutor-title">
      <a href="">
        <img src="<?php echo get_template_directory_uri() ?>/images/ic_author.png">
        Thanh Binh
      </a>
    </div>
  </div>
<div class="clear"></div>
</div>
<?php } ?>
</div>
<!-- End td-widget -->
