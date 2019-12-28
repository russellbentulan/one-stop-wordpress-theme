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

  <header class="Header">
    <div class="wrapper flex">

      <?php
      $custom_logo_id = get_field('logo', 'option');
      $logo_img = wp_get_attachment_image($custom_logo_id, 'small');
      ?>
      <a href="<?= get_home_url(); ?>" class="logo"><?php echo $logo_img; ?></a>


      <div class="HeaderNav">
        <?php 
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'HeaderNav__container',
            'before' => '<span class="HeaderNav__link">',
            'after' => '</span>'
          )); 
        ?>
      </div>

    </div>
  </header>

  <main id="maincontent">