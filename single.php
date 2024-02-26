<?php get_header(); ?>

  <div class="page-header">
    <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
  </div>
  <div class="page-header-pc">
    <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
  </div>

  <?php get_template_part('lib/parts/bread') ?>

  <main>

    <?php
      if(in_category(array('features', 'organincllife'))) {
        get_template_part('lib/single/feature-article');
      } else {
        get_template_part('lib/single/base-article');
      }
    ?>

  </main>

<?php get_footer(); ?>