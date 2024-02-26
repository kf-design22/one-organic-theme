<?php get_header(); ?>

<div class="page-header">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
</div>
<div class="page-header-pc">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
</div>

<?php get_template_part('lib/parts/bread') ?>

  <main>

    <div class="page-body">
      <div class="container">

        <div class="heading-a">
          <h2>
            スタッフ紹介
          </h2>
          <p>Organic Contents</p>

        </div>

        <?php get_template_part('/lib/parts/staff-list'); ?>


      </div>
    </div>
    <!-- /page-body -->

  </main>

<?php get_footer(); ?>