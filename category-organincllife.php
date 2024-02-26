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
      <div class="feature-cat-wrap cpn-page-w">

        <div class="feature-info">
          <figure>
            <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/organiclife-img.jpg'); ?>" alt="OrganicLife.">
          </figure>
          <div class="info">
            <h3>OrganicLife.</h3>
            <div class="text">
              <p>オーガニックは食材だけではなく、私たちの生活すべてに関係しています。衣食住から始まり、この地球や宇宙に至るまで、たくさんのオーガニックを知ることで、私たちの社会も変わっていきます。今回の特集では、オーガニックの実践者からそのエッセンスを学んでいきます。新しい世界を知るための旅をお楽しみください。</p>
            </div>
          </div>
        </div>

        <div class="archive-list _backwhite">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article class="fadein fade-in-up">
              <a href="<?php the_permalink(); ?>">
                <figure>
                  <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('sg-thumbnail'); ?>
                  <?php else: ?>
                  <img src="https://picsum.photos/1040/643/?random">
                  <?php endif; ?>
                </figure>
                <div class="info">
                  <h3><?php the_title(); ?></h3>
                  <time><?php the_time('Y年m月d日 G:i') ?></time>
                </div>
                <p class="category">カテゴリー</p>
              </a>
            </article>

          <?php endwhile; endif; ?>

          <article></article>

        </div>
        <!-- /archive-list -->

      </div>
    </div>

  </main>

<?php get_footer(); ?>