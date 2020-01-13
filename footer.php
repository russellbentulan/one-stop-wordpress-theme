</main>
<footer class="Footer">
  <div class="wrapper flex">

    <div class="col1of3 Footer__leftColumn">

      <?php
      $custom_logo_id = get_field('logo_icon', 'option');
      $logo_img = wp_get_attachment_image($custom_logo_id, 'small');
      ?>
      <a href="<?= get_home_url(); ?>" class="Footer__logo"><?php echo $logo_img; ?></a>

      <div class="Footer__socialsContainer">
        <h2 class="Footer__title--small">Find us online</h2>
        <?php wp_nav_menu(array(
          'theme_location' => 'social_links',
          'container_class' => 'Footer__socials',
          'before' => '<span class="Footer__socialsLink">',
          'after' => '</span>'
        )); ?>
      </div>

      <p class="Footer__copyright"><?= get_bloginfo('name'); ?> &copy; <?= date('Y'); ?></p>
    </div>

    <?php if (have_rows('contact_info', 'option')) : ?>
      <?php while (have_rows('contact_info', 'option')) : the_row(); ?>

        <?php
        // Format html linebreaks into address field
        $address = nl2br(get_sub_field('business_address'));
        $tel = get_sub_field('phone_number');
        ?>
        <div class="col1of3 Footer__contactInfo">
          <h2 class="Footer__title">Location</h2>
          <address class="Footer__address">
            <?= $address ?>
          </address>

          <span class="Footer__phone">
            <i class="fas fa-phone-alt Footer__phoneIcon" role="img" aria-label="Phone Number"></i>
            <a href="tel:<?= $tel ?>" class="Footer__phoneLink"><?= $tel ?></a>
          </span>
        </div>

        <?php if (have_rows('business_hours')) : ?>
          <div class="col1of3 Footer__contactInfo">
            <h2 class="Footer__title">Business Hours</h2>

            <div class="Footer__hours">
              <?php while (have_rows('business_hours')) : the_row(); ?>

                <span class="Footer__field">
                  <span class="Footer__fieldDay"><?= get_sub_field('work_day') ?>:</span>
                  <span class="Footer__fieldHours"><?= get_sub_field('work_hours') ?></span>
                </span>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>


      <?php endwhile; ?>
    <?php endif; ?>

  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>