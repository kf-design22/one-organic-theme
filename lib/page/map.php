<?php get_header(); ?>

<div class="page-header">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
</div>
<div class="page-header-pc">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
</div>

<?php get_template_part('lib/parts/bread') ?>

  <main>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container">
      <div class="cpn-page-w">

        <div class="heading-a">
          <h2>
            オーガニックMAP
          </h2>
          <p>Orgnic Map</p>

        </div>

        <div class="sg-contents">

          <?php // the_content(); ?>

           <p>オーガニックMAPとは、ああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</p>

          <?php
            $args = array(
              'taxonomy' => 'spot-area',
              'parent' => 0,
            );

            $the_query = new WP_Term_Query($args);

            if($the_query->get_terms()):
          ?>

          <?php
            foreach($the_query->get_terms() as $term):
              $term_link = get_term_link($term->slug, 'spot-area'); ?>

            <p><a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a></p>

          <?php endforeach; else: ?>

            <p>現在、スポット登録がされていません。</p>

          <?php endif; ?>

        </div>
        <!-- /sg-contents -->

      </div>
    </div>

    <?php endwhile; endif; ?>

  </main>

<?php get_footer(); ?>