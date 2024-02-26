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

        <div class="search-wrap">
          <div class="search-box">
            <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
              <input type="text" name="s" id="s" placeholder="<?php if(!is_search()){ echo 'SEARCH';} ?>" value="<?php if(is_search()){ echo get_search_query();} ?>"/>
              <button type="submit">検索</button>
            </form>
          </div>
        </div>

        <div class="heading-d">
          <h3 class="ttl">検索結果「<?php if(is_search()){ echo get_search_query();} ?>」</h3>
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
                <p class="category">
                  <?php
                    $category = get_the_category();
                    $cat = $category[0];
                    //カテゴリー名
                    $cat_name = $cat->name;
                    echo $cat_name;
                  ?>
                </p>
              </a>
            </article>

          <?php endwhile; else: ?>
            <p class="post-empty">記事はありません</p>
            <?php endif; ?>

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

  </main>

<?php get_footer(); ?>