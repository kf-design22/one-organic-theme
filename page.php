<?php
get_header();

  if(is_page(array('about', 'all-posts', 'contact', 'feature', 'privacy-policy', 'staff', 'thanks', 'map'))) {

    $page = get_post(get_the_ID());
    $slug = $page->post_name;

    get_template_part('lib/page/'.$slug);

  } else { ?>

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

        <div class="heading-a">
          <h2>
            <?php the_title(); ?>
          </h2>
          <?php if(get_field('title_en')): ?>
            <p><?php the_field('title_en')?></p>
          <?php endif; ?>

        </div>

        <div class="sg-contents">

          <?php the_content(); ?>

        </div>
        <!-- /sg-contents -->

      </div>
    </div>

  </main>

<?php  }

get_footer();
?>