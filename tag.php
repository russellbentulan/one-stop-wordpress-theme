<?php get_header(); ?>

<div class="wrapper">

  <div class="content">
    <h1>Tag Archives: <?php single_tag_title(); ?></h1>
    <?php get_template_part( 'loop', 'tag' ); ?>
  </div> <!-- /.content -->

  <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>