<?php /* Template Name: About Page */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post() ?>

    <section class="Banner Banner__bg" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
      <div class="Banner__titleContainer">
        <h1 class="heading--primary Banner__title">
          <?php the_title(); ?>
        </h1>
      </div>
    </section>

    <section class="PageContent">
      <div class="wrapper">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>