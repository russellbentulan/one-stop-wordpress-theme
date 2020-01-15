<?php
$title = get_field('cta_title');
$text = get_field('cta_text');
$img = get_field('cta_image');
$link = get_field('cta_link');
?>

<section class="cta flex">
  <div class="row">
    <h2 class="cta__title"><?= $title; ?></h2>
  </div>

  <figure class="col1of2">
    <?= wp_get_attachment_image($img['id'], 'full'); ?>
  </figure>

  <div class="textContainer col1of2">
    <?= $text; ?>

    <span class="cta__link">
      <a href="<?= $link['url'] ?>" class="btn--arrow"><?= $link['title'] ?></a>
    </span>
  </div>
</section>