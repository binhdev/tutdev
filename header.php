<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <link rel="profile" href="http://gmgp.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> > <!--Thêm class tượng trưng cho mỗi trang lên <body> để tùy biến-->
    <header id="header">
      <div class="container">
        <div class="col-md-3">
          <?php tutdev_logo(); ?>
        </div>
        <div class="col-md-9">
          <div class="row p-3">
            <?php tutdev_menu( 'top-menu' ); ?>
          </div>
          <div class="row p-3">
            <?php tutdev_menu( 'primary-menu' ); ?>
          </div>
        </div>
      </div>
    </header>
