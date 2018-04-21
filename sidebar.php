<aside id="menu-desktop" class="sidebar">
  <ul class="nav nav-list primary left-menu">
    <li>
      <img src="https://www.tutorialspoint.com/java/images/java-video-tutorials.jpg">
    </li>
    <li>
      <?php
        $current_post = get_post();
        $cats = get_the_category($current_post->ID);
        $cat = $cats[0];
        $args = array('category' => $cat->term_id, 'orderby' => 'post_date',
        'order' => 'ASC', 'posts_per_page' => -1);
        $list_posts = get_posts($args);
      ?>
    </li>

    <li class="heading"><?php echo $cat->name; ?></li>
    <?php foreach ($list_posts as $p) { ?>
      <li <?php if($current_post->ID == $p->ID) echo 'class="m_actived"' ?>><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></li>
    <?php } ?>
  </ul>
</aside>

<?php if(is_single()) : ?>
<aside id="menu-mobile" class="sidebar">
  <div id="close-menu">
    <img src="images/ic_back.png">
  </div>
  <ul class="nav nav-list primary left-menu">
    <li>
      <img src="https://www.tutorialspoint.com/java/images/java-video-tutorials.jpg">
    </li>
    <li>
      <?php
        $current_post = get_post();
        $cats = get_the_category($current_post->ID);
        $cat = $cats[0];
        $args = array('category' => $cat->term_id, 'orderby' => 'post_date',
        'order' => 'ASC', 'posts_per_page' => -1);
        $list_posts = get_posts($args);
      ?>
    </li>

    <li class="heading"><?php echo $cat->name; ?></li>
    <?php foreach ($list_posts as $p) { ?>
      <li <?php if($current_post->ID == $p->ID) echo 'class="m_actived"' ?>><a href="<?php echo get_permalink($p); ?>"><?php echo $p->post_title; ?></a></li>
    <?php } ?>
  </ul>
</aside>
<button type="button" id="btn-menu" class="btn btn-show-menu">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
<div style="clear:both;"></div>
<?php endif; ?>
