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

    <?php if (have_rows('contact_info', 'option')) : ?>
      <?php while (have_rows('contact_info', 'option')) : the_row(); ?>
        <section class="ShopInfo">
          <div class="wrapper flex">

            <?php
            // Format html linebreaks into address field
            $address = nl2br(get_sub_field('business_address'));
            $tel = get_sub_field('phone_number');
            ?>
            <div class="col1of2 ShopInfo__contact ">

              <address class="ShopInfo__address">
                <?= $address ?>
              </address>

              <span class="ShopInfo__phone">
                <i class="fas fa-phone-alt ShopInfo__phoneIcon" role="img" aria-label="Phone Number"></i>
                <a href="tel:<?= $tel ?>" class="ShopInfo__phoneLink"><?= $tel ?></a>
              </span>
            </div>

            <?php if (have_rows('business_hours')) : ?>
              <div class="col1of2">
                <strong class="ShopInfo__title">Business Hours</strong>

                <div class="ShopInfo__hours">
                  <?php while (have_rows('business_hours')) : the_row(); ?>

                    <span class="ShopInfo__field">
                      <span class="ShopInfo__fieldDay"><?= get_sub_field('work_day') ?>:</span>
                      <span class="ShopInfo__fieldHours"><?= get_sub_field('work_hours') ?></span>
                    </span>
                  <?php endwhile; ?>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </section>
      <?php endwhile; ?>
    <?php endif; ?>
    <!-- .ShopInfo -->

  <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>