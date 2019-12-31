<?php /* Template Name: Home Page */ ?>

<?php get_header(); ?>

<? if (have_posts()) : while (have_posts()) : the_post() ?>

    <section class="Hero" style="background: no-repeat center/cover url(<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
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

    <section class="About">
      <div class="wrapper flex">
        
      </div>
    </section>
    <!-- .About -->
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>