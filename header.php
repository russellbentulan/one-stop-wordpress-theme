<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="stylesheet" href="https://use.typekit.net/zen0jkk.css">
  <script src="https://kit.fontawesome.com/ff995803cc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
  <a href="#maincontent" class="skiplink">Go to Main Content</a>
  <header>
    <div class="main-nav">
      <div class="wrapper flex">
        <button class="menu-button">
          <span></span>
          <span></span>
          <span></span>
          <span class="visuallyhidden">Menu</span>
        </button>
        <?php wp_nav_menu(array(
          'theme_location' => 'primary',
          'container_class' => 'menu'
        )); ?>
      </div>
    </div>
  </header>

  <main id="maincontent">