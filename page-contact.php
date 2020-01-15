<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post() ?>

    <section class="Banner Banner__bg" style="background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
      <div class="Banner__titleContainer">
        <h1 class="heading--primary Banner__title">
          <?php the_title(); ?>
        </h1>
      </div>
    </section>

    <div class="wrapper flex PageContent">
      <section class="col1of2 ContactForm">
        <?php the_content(); ?>
      </section>

      <?php if (have_rows('contact_info', 'option')) : ?>
        <?php while (have_rows('contact_info', 'option')) : the_row(); ?>
          <section class="ShopInfo col1of2">
            <h2>Our Location</h2>
            <?php
            // Format html linebreaks into address field
            $address = nl2br(get_sub_field('business_address'));
            $tel = get_sub_field('phone_number');
            $map = get_sub_field('embedded_map', false);
            ?>

            <div class="ShopInfo">
              <address class="ShopInfo__address col1of2">
                <?= $address ?>
              </address>

              <div class="ShopInfo__details">
                <?php while (have_rows('business_hours')) : the_row(); ?>
                  <span class="ShopInfo__field">
                    <span class="ShopInfo__fieldDay"><?= get_sub_field('work_day') ?>:</span>
                    <span class="ShopInfo__fieldHours"><?= get_sub_field('work_hours') ?></span>
                  </span>

                <?php endwhile; ?>

                <span class="ShopInfo__phone">
                  <a href="tel:<?= $tel ?>" class="ShopInfo__phoneLink">
                    <i class="fas fa-phone-alt ShopInfo__phoneIcon" role="img" aria-label="Phone Number"></i>
                    <?= $tel ?>
                  </a>
                </span>
              </div>
            </div>
            <!-- .ShopInfo -->
            <div class="ShopInfo__location flex">
              <?= $map ?>
            </div>
            <!-- .ShopInfo__location -->
          </section>
        <?php endwhile; ?>
      <?php endif; ?>
      <!-- .ShopInfo -->

    </div>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>