<?php get_header(); ?>

<div class="page-header">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
</div>
<div class="page-header-pc">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
</div>

<?php get_template_part('lib/parts/bread') ?>

  <main>

    <div class="container">
      <div class="cpn-page-w">

        <div class="heading-d">
          <h3 class="ttl">お問い合わせフォームが送信されました。</h3>
        </div>

        <div class="sg-contents">

          <?php the_content(); ?>

        </div>
        <!-- /sg-contents -->

      </div>
    </div>

  </main>

<?php get_footer(); ?>