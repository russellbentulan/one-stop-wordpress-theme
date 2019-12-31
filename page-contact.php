<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post() ?>

    <section class="ShopInfo">
      <div class="wrapper flex">
        <?php if (have_rows('contact_info', 'option')) : ?>
          <?php while (have_rows('contact_info', 'option')) : the_row(); ?>

            <?php
            // Format html linebreaks into address field
            $address = nl2br(get_sub_field('business_address'));
            $tel = get_sub_field('phone_number');
            $map = get_sub_field('embedded_map', false);
            ?>

            <div class="col2of3 ShopInfo__location flex">
              <?= $map ?>
            </div>
            <!-- .ShopInfo__location -->

            <div class="col1of3 ShopInfo__hours">
              <h2>Location Info</h2>
              <address class="ShopInfo__address">
                <?= $address ?>
              </address>

              <h2>Business Hours</h2>

              <?php while (have_rows('business_hours')) : the_row(); ?>

                <span class="ShopInfo__field">
                  <span class="ShopInfo__fieldDay"><?= get_sub_field('work_day') ?>:</span>
                  <span class="ShopInfo__fieldHours"><?= get_sub_field('work_hours') ?></span>
                </span>
              <?php endwhile; ?>

              <span class="ShopInfo__phone">
                <i class="fas fa-phone-alt ShopInfo__phoneIcon" role="img" aria-label="Phone Number"></i>
                <a href="tel:<?= $tel ?>" class="ShopInfo__phoneLink"><?= $tel ?></a>
              </span>
            </div>
            <!-- .ShopInfo__hours -->
      </div>
    </section>

  <?php endwhile; ?>
<?php endif; ?>
<!-- .ShopInfo -->



<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>