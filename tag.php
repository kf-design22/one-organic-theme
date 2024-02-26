<?php get_header(); ?>

<div class="page-header">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
</div>
<div class="page-header-pc">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
</div>

<?php get_template_part('lib/parts/bread') ?>

  <main>

    <div class="archive-wrap">
      <div class="container">

        <div class="archive-related-keyword">

          <div class="title-box">
            <h3 class="keyword-ttl">関連キーワード</h3>
            <p>Keyword</p>
          </div>
          <div class="keyword-main">
            <ul>
              <?php
                $posttags = get_tags();
                if ($posttags) {
                  foreach($posttags as $tag) {
                    echo '<li><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a></li>';
                  }
                }
              ?>
            </ul>
          </div>

        </div>
        <!-- /related-keyword -->

        <div class="heading-d">
          <h3 class="ttl">タグ「<?php single_cat_title(); ?>」</h3>
        </div>

        <div class="archive-list">

          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article>
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

        <div class="pagenate-wrap">
          <?php
            $big = 9999999999;
            $arg = array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'current' => max( 1, get_query_var('paged') ),
              // 'total'   => $the_query->max_num_pages,
              'type' => 'list',
              'next_text' => __('<img src="https://one-organic-day.life/wpfile/wp-content/themes/one-organic-theme/lib/images/pagenate-right.png" alt="">'),
              'prev_text' => __('<img src="https://one-organic-day.life/wpfile/wp-content/themes/one-organic-theme/lib/images/pagenate-left.png" alt="">'),
              'mid_size' => 1,
            );
            echo paginate_links($arg);
          ?>
        </div>
        <!-- /pagenate-wrap -->

      </div>
    </div>
    <!-- /archive-wrap -->

    <div class="archive-feature">
      <div class="container">

        <div class="feature-slide-wrap">
          <div class="feature-box">
            <div class="feature-slide">

              <div class="box">
                <a href="<?php echo esc_url(home_url('/features/organincllife/')); ?>">
                  <figure>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/organiclife-img.jpg'); ?>" alt="OrganicLife.">
                  </figure>
                  <h3>OrganicLife.</h3>
                </a>
              </div>

            </div>
            <!-- /feature-slide -->
          </div>
          <!-- /feature-box -->

          <p class="btn"><a href="<?php echo esc_url(home_url('/feature/')); ?>">全ての特集をチェックする</a></p>
        </div>


      </div>
    </div>

  </main>

<?php get_footer(); ?>