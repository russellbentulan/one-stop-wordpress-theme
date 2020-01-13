<?php /* Template Name: Home Page */ ?>

<?php get_header(); ?>

<? if (have_posts()) : while (have_posts()) : the_post() ?>

    <section class="Hero" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
      <div class="Hero__bg">
        <div class="wrapper flex">
          <div class="wrapper Hero__textContainer">
            <h1 class="heading--primary Hero__title"><?= get_field('hero_title') ?></h1>

            <div class="Hero__text">
              <?php the_field('hero_text') ?>
            </div>

            <?php $hero_link = get_field('hero_button'); ?>
            <a href="<?= $hero_link['url']; ?>" class="btn Hero__btn">
              <?= $hero_link['title']; ?>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- .Hero -->

    <?php if (get_field('about_title') && get_field('about_text') && get_field('about_button')) : ?>
      <section class="About">
        <div class="wrapper flex">
          <?php
          $about_image = get_field('about_image');
          if ($about_image) :
          ?>
            <div class="About__imgContainer col1of2">
              <?= wp_get_attachment_image($about_image['id'], 'full'); ?>
            </div>
          <?php endif; ?>

          <div class="col1of2">
            <div class="About__textContainer">
              <h2 class="heading--secondary heading--underlined"><?= get_field('about_title'); ?></h2>

              <?= get_field('about_text'); ?>

              <?php $about_link = get_field('about_button') ?>
              <a href="<?= $about_link['url'] ?>" class="btn--arrow About__link"><?= $about_link['title'] ?></a>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <!-- .About -->

    <section class="Services">

    </section>
    <!-- .Services -->
  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>