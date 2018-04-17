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
