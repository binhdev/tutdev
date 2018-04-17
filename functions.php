<?php

define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

require_once( CORE . '/init.php' );

if ( ! isset( $content_width ) ) {
    $content_width = 620;
}

if ( ! function_exists( 'tutdev_theme_setup' ) ) {

  function tutdev_theme_setup() {

    $language_folder = THEME_URL . '/languages';
    load_theme_textdomain( 'tutdev', $language_folder );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-formats',
      array(
        'video',
        'image',
        'audio',
        'gallery'
      )
    );
    $default_background = array(
            'default-color' => '#e8e8e8',
    );
    add_theme_support( 'custom-background', $default_background );
    register_nav_menu ( 'top-menu', __('Top Menu', 'tutdev') );
    register_nav_menu ( 'primary-menu', __('Primary Menu', 'tutdev') );

    $sidebar = array(
      'name' => __('Main Sidebar', 'tutdev'),
      'id' => 'main-sidebar',
      'description' => 'Main sidebar for tutdev theme',
      'class' => 'main-sidebar',
      'before_title' => '<h3 class="widgettitle">',
      'after_sidebar' => '</h3>'
    );
    register_sidebar( $sidebar );
  }
  add_action ( 'init', 'tutdev_theme_setup' );

}

if ( ! function_exists( 'tutdev_logo' ) ) {
  function tutdev_logo() {
    printf('<h1><a href="%1$s" title="%2$s"><img alt="tutdev" src="%3$s/images/logo.png">
        </a></h1>',
      get_bloginfo( 'url' ),
      get_bloginfo( 'description' ),
      get_template_directory_uri()
    );
  }
}

if ( ! function_exists( 'tutdev_menu' ) ) {
  function tutdev_menu( $slug ) {
    $primary_menu = array(
      'theme_location' => $slug,
      'container' => 'nav',
      'container_class' => $slug
    );
    wp_nav_menu( $primary_menu );
  }
}

if ( ! function_exists( 'tutdev_pagination' ) ) {
  function tutdev_pagination() {  ?>
  <nav class="pagination" role="navigation">

    <?php if ( get_previous_post_link() ) : ?>
      <div class="pre-btn"><?php previous_post_link('%link', __('Previous Post', 'tutdev'), TRUE ); ?></div>
    <?php endif; ?>

    <?php if ( get_next_post_link() ) : ?>
      <div class="next-btn"><?php next_post_link('%link', __('Next Post', 'tutdev'), TRUE ); ?></div>
    <?php endif; ?>

  </nav><?php
  }
}

if ( ! function_exists( 'tutdev_thumbnail' ) ) {
  function tutdev_thumbnail( $size ) {

    // Chỉ hiển thumbnail với post không có mật khẩu
    if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
      <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
    endif;
  }
}

if ( ! function_exists( 'tutdev_entry_header' ) ) {
  function tutdev_entry_header() {
    if ( is_single() ) : ?>

      <h1 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
    <?php else : ?>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2><?php

    endif;
  }
}

if( ! function_exists( 'tutdev_entry_meta' ) ) {
  function tutdev_entry_meta() {
    if ( ! is_page() ) :
      echo '<div class="entry-meta">';

        // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
        printf( __('<span class="author">Posted by %1$s</span>', 'tutdev'),
          get_the_author() );

        printf( __('<span class="date-published"> at %1$s</span>', 'tutdev'),
          get_the_date() );

        printf( __('<span class="category"> in %1$s</span>', 'tutdev'),
          get_the_category_list( ', ' ) );

        // Hiển thị số đếm lượt bình luận
        if ( comments_open() ) :
          echo ' <span class="meta-reply">';
            comments_popup_link(
              __('Leave a comment', 'tutdev'),
              __('One comment', 'tutdev'),
              __('% comments', 'tutdev'),
              __('Read all comments', 'tutdev')
             );
          echo '</span>';
        endif;
      echo '</div>';
    endif;
  }
}

function tutdev_readmore() {
  return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'tutdev') . '</a>';
}
add_filter( 'excerpt_more', 'tutdev_readmore' );

if ( ! function_exists( 'tutdev_entry_content' ) ) {
  function tutdev_entry_content() {

    if ( ! is_single() ) :
      the_excerpt();
    else :
      the_content();

      /*
       * Code hiển thị phân trang trong post type
       */
      $link_pages = array(
        'before' => __('<p>Page:', 'tutdev'),
        'after' => '</p>',
        'nextpagelink'     => __( 'Next page', 'tutdev' ),
        'previouspagelink' => __( 'Previous page', 'tutdev' )
      );
      wp_link_pages( $link_pages );
    endif;

  }
}

if ( ! function_exists( 'tutdev_entry_tag' ) ) {
  function tutdev_entry_tag() {
    if ( has_tag() ) :
      echo '<div class="entry-tag">';
      printf( __('Tagged in %1$s', 'tutdev'), get_the_tag_list( '', ', ' ) );
      echo '</div>';
    endif;
  }
}
/**
* Them style
*/
function tutdev_styles(){
  wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
  wp_register_style('main-style', get_template_directory_uri(). '/style.css', 'all');
  wp_enqueue_style('main-style');
}

add_action('wp_enqueue_scripts', 'tutdev_styles');

add_theme_support('category-thumbnails');

if(! function_exists('tutdev_first_post')){
  function tutdev_first_post($cat_id){
    $args = array('category' => $cat_id, 'orderby' => 'post_date',
    'order' => 'ASC', 'posts_per_page' => 1);
    return get_posts($args)[0];
  }
}
