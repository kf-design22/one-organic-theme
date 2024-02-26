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

        <?php
          $imanourl = esc_url( home_url() . $_SERVER['REQUEST_URI'] );

          if(strpos($imanourl,'?') !== false):
          //URLに「?」が含まれている場合の処理
        ?>

          <div class="search-wrap">
            <div class="search-box">
              <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                <input type="text" name="s" id="s" placeholder="SEARCH"/>
                <button type="submit">検索</button>
              </form>
            </div>
          </div>

        <?php endif; ?>

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


        <div class="heading-a">
          <h2>
            オ<em class="color-bl">ー</em><em class="color-or">ガ</em>ニ<em class="color-bl">ッ</em><em
              class="color-or">ク</em> <br>コ<em class="color-bl">ン</em><em class="color-or">テ</em>ン<em
              class="color-bl">ツ</em>
          </h2>
          <p>Organic Contents</p>

          <div class="riceplant-l"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/riceplant-left.png'); ?>" alt=""></div>
          <div class="riceplant-r"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/riceplant-right.png'); ?>" alt=""></div>

        </div>

        <div class="archive-list">

          <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
              'post_type' => 'post',
              'paged' => $paged,
              'posts_per_page' => 12,
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>

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

          <?php endwhile;?>
          <?php else:?>
            <p class="no-post">記事はありません。</p>
          <?php
            endif;
            wp_reset_postdata();
          ?>

          <article></article>

        </div>
        <!-- /archive-list -->

        <div class="pagenate-wrap">
          <?php
            $big = 9999999999;
            $arg = array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'current' => max( 1, get_query_var('paged') ),
              'total' => $the_query->max_num_pages,
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

        <div class="heading-c">
          <h2 class="ttl">オススメ特集</h2>
          <p>Recommend Featuer</p>
        </div>

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

            <p class="vegi-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/turnip-onion.png'); ?>" alt="野菜の装飾"></p>
            <p class="vegi-right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/vegi-eggplant.png'); ?>" alt="野菜の装飾"></p>
          </div>
          <!-- /feature-box -->

          <p class="btn"><a href="<?php echo esc_url(home_url('/feature/')); ?>">全ての特集をチェックする</a></p>
        </div>


      </div>
    </div>

  </main>

<?php get_footer(); ?>