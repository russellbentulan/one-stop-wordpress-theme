</main>
<footer class="Footer">
  <div class="wrapper flex">

    <?php if (have_rows('contact_info', 'option')) : ?>
      <?php while (have_rows('contact_info', 'option')) : the_row(); ?>

        <?php
        // Format html linebreaks into address field
        $address = nl2br(get_sub_field('business_address'));
        $tel = get_sub_field('phone_number');
        ?>
        <div class="col1of2 Footer__contact ">

          <address class="Footer__address">
            <?= $address ?>
          </address>

          <span class="Footer__phone">
            <i class="fas fa-phone-alt Footer__phoneIcon" role="img" aria-label="Phone Number"></i>
            <a href="tel:<?= $tel ?>" class="Footer__phoneLink"><?= $tel ?></a>
          </span>
        </div>

        <?php if (have_rows('business_hours')) : ?>
          <div class="col1of2">
            <strong class="Footer__title">Business Hours</strong>

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