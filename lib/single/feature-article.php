    <div class="single-wrap">
      <div class="container">
        <article>

          <div class="sg-head">
            <p class="category">
              <?php
                $category = get_the_category();
                $cat = $category[0];
                //カテゴリー名
                $cat_name = $cat->name;
                echo $cat_name;
              ?>
            </p>
            <time><?php the_time('Y年m月d日 G:i') ?></time>
            <h1><?php the_title(); ?></h1>
          </div>

          <div class="sg-thumb">
            <?php if(has_post_thumbnail()): ?>
              <?php the_post_thumbnail('sg-thumbnail'); ?>
            <?php else: ?>
            <img src="https://picsum.photos/1040/643/?random">
            <?php endif; ?>
          </div>

          <div class="sg-contents">

            <?php the_content(); ?>

          </div>
          <!-- /sg-contents -->

          <div class="feature-cat-info">

            <h2>この記事は特集<br>「OrganicLife.」に含まれています。</h2>

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

              <?php
                $categ = get_the_category($post->ID);
                $catID = array();
                foreach($categ as $cat){
                  array_push($catID, $cat -> cat_ID);
                }
                $args = array(
                  'post__not_in' => array($post->ID),
                  'category__in' => $catID,
                  'posts_per_page' => 4,
                  'orderby' => 'rand'
                );
                $the_query = new WP_Query($args);
                if($the_query -> have_posts()) :?>
                <?php while($the_query -> have_posts()) : $the_query -> the_post();
              ?>

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

              <?php endwhile; endif; wp_reset_postdata(); ?>

              <article></article>

            </div>
            <!-- /archive-list -->

            <p class="btn"><a href="<?php echo esc_url(home_url('/feature/')); ?>">特集ページを見てみる</a></p>

          </div>
          <!-- /feature-cat-info -->

        </article>
      </div>
    </div>
    <!-- /single-wrap -->

    <div class="related-keyword">
      <div class="container">

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
    </div>
    <!-- /related-keyword -->

    <?php get_template_part('lib/parts/sns-list'); ?>

    <?php $userID = get_the_author_meta('ID'); ?>
    <div class="single-members">
      <div class="container">

        <div class="member-box-sp">

          <div class="member-box">
            <h3><span>執筆ライター</span></h3>

            <div class="member-box-wrap">
              <div class="member-box-head">
                <figure>
                  <?php if(get_field('writter-face')): ?>
                    <img src="<?php the_field('writter-face'); ?>" alt="<?php the_field('writter-name'); ?>">
                  <?php else: ?>
                    <img src="https://picsum.photos/400/400/?random">
                  <?php endif; ?>
                </figure>
                <div class="sns">
                  <p><?php the_field('writter-position'); ?></p>
                  <ul>
                    <?php if(get_field('writter-line')): ?>
                      <li><a href="<?php the_field('writter-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('writter-fb')): ?>
                      <li><a href="<?php the_field('writter-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('writter-tw')): ?>
                      <li><a href="<?php the_field('writter-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('writter-insta')): ?>
                      <li><a href="<?php the_field('writter-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
              <h4><?php the_field('writter-name'); ?></h4>
              <div class="text">
                <p><?php the_field('writter-explain') ?></p>
              </div>

              <?php if(get_field('writter-url')): ?>
              <p class="btn"><a href="<?php THE_FIELD('writter-url') ?>">この人のことをもっと詳しく見る</a></p>
              <?php endif; ?>

            </div>
            <!-- /member-box-wrap -->

            <?php if(get_field('add-writter-on')): ?>

              <div class="member-box-wrap">
                <div class="member-box-head">
                  <figure>
                    <?php if(get_field('add-writter-face')): ?>
                      <img src="<?php the_field('add-writter-face'); ?>" alt="<?php the_field('add-writter-name'); ?>">
                    <?php else: ?>
                      <img src="https://picsum.photos/400/400/?random">
                    <?php endif; ?>
                  </figure>
                  <div class="sns">
                    <?php if(get_field('add-writter-position')): ?>
                    <p><?php the_field('add-writter-position'); ?></p>
                    <?php endif; ?>
                    <ul>
                      <?php if(get_field('add-writter-line')): ?>
                        <li><a href="<?php the_field('add-writter-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-writter-fb')): ?>
                        <li><a href="<?php the_field('add-writter-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-writter-tw')): ?>
                        <li><a href="<?php the_field('add-writter-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-writter-insta')): ?>
                        <li><a href="<?php the_field('add-writter-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
                <h4><?php the_field('add-writter-name'); ?></h4>
                <div class="text">
                  <p><?php the_field('add-writter-explain'); ?></p>
                </div>

                <?php if(get_field('add-writter-url')): ?>
                <p class="btn"><a href="<?php the_field('add-writter-url'); ?>">この人のことをもっと詳しく見る</a></p>
                <?php endif; ?>
              </div>
              <!-- /member-box-wrap -->

            <?php endif; ?>

          </div>
          <!-- /member-box -->

          <?php if(get_field('add-g1-heading')): ?>
          <div class="member-box">
            <h3><span><?php the_field('add-g1-heading'); ?></span></h3>

            <div class="member-box-wrap">
              <div class="member-box-head">
                <figure>
                  <?php if(get_field('add-g1-p1-face')): ?>
                    <img src="<?php the_field('add-g1-p1-face'); ?>" alt="<?php the_field('add-g1-p1-name'); ?>">
                  <?php else: ?>
                    <img src="https://picsum.photos/400/400/?random">
                  <?php endif; ?>
                </figure>
                <div class="sns">
                  <?php if(get_field('add-g1-p1-position')): ?>
                  <p><?php the_field('add-g1-p1-position'); ?></p>
                  <?php endif; ?>
                  <ul>
                    <?php if(get_field('add-g1-p1-line')): ?>
                      <li><a href="<?php the_field('add-g1-p1-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('add-g1-p1-fb')): ?>
                      <li><a href="<?php the_field('add-g1-p1-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('add-g1-p1-tw')): ?>
                      <li><a href="<?php the_field('add-g1-p1-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('add-g1-p1-insta')): ?>
                      <li><a href="<?php the_field('add-g1-p1-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
              <h4><?php the_field('add-g1-p1-name'); ?></h4>
              <div class="text">
                <p><?php the_field('add-g1-p1-explain'); ?></p>
              </div>

              <?php if(get_field('add-g1-p1-url')): ?>
              <p class="btn"><a href="<?php the_field('add-g1-p1-url'); ?>">この人のことをもっと詳しく見る</a></p>
              <?php endif; ?>
            </div>
            <!-- /member-box-wrap -->

            <?php if(get_field('add-g1-p2-on')): ?>

              <div class="member-box-wrap">
                <div class="member-box-head">
                  <figure>
                    <?php if(get_field('add-g1-p2-face')): ?>
                      <img src="<?php the_field('add-g1-p2-face'); ?>" alt="<?php the_field('add-g1-p2-name'); ?>">
                    <?php else: ?>
                      <img src="https://picsum.photos/400/400/?random">
                    <?php endif; ?>
                  </figure>
                  <div class="sns">
                    <?php if(get_field('add-g1-p2-position')): ?>
                    <p><?php the_field('add-g1-p2-position'); ?></p>
                    <?php endif; ?>
                    <ul>
                      <?php if(get_field('add-g1-p2-line')): ?>
                        <li><a href="<?php the_field('add-g1-p2-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-g1-p2-fb')): ?>
                        <li><a href="<?php the_field('add-g1-p2-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-g1-p2-tw')): ?>
                        <li><a href="<?php the_field('add-g1-p2-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-g1-p2-insta')): ?>
                        <li><a href="<?php the_field('add-g1-p2-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
                <h4><?php the_field('add-g1-p2-name'); ?></h4>
                <div class="text">
                  <p><?php the_field('add-g1-p2-explain'); ?></p>
                </div>

                <?php if(get_field('add-g1-p2-url')): ?>
                <p class="btn"><a href="<?php the_field('add-g1-p2-url'); ?>">この人のことをもっと詳しく見る</a></p>
                <?php endif; ?>
              </div>
              <!-- /member-box-wrap -->

            <?php endif; ?>

          </div>
          <!-- /member-box -->
          <?php endif; ?>

        </div>
        <!-- /member-box-sp -->

        <div class="member-box-pc">

          <div class="member-box">
            <h3><span>執筆ライター</span></h3>

            <div class="member-box-wrap">

              <figure>
                <?php if(get_field('writter-face')): ?>
                  <img src="<?php the_field('writter-face'); ?>" alt="<?php the_field('writter-name'); ?>">
                <?php else: ?>
                  <img src="https://picsum.photos/400/400/?random">
                <?php endif; ?>
              </figure>

              <div class="menber-info">

                <div class="member-name">
                  <p><?php the_field('writter-position'); ?></p>
                  <h4><?php the_field('writter-name'); ?></h4>
                  <ul>
                    <?php if(get_field('writter-line')): ?>
                      <li><a href="<?php the_field('writter-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('writter-fb')): ?>
                      <li><a href="<?php the_field('writter-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('writter-tw')): ?>
                      <li><a href="<?php the_field('writter-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('writter-insta')): ?>
                      <li><a href="<?php the_field('writter-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <?php endif; ?>
                  </ul>
                </div>

                <div class="member-explain">
                  <div class="text">
                    <p><?php the_field('writter-explain') ?></p>
                  </div>

                  <p class="btn"><a href="<?php THE_FIELD('writter-url') ?>">この人のことをもっと詳しく見る</a></p>

                </div>
                <!-- /member-explain -->

              </div>
              <!-- /menber-info -->

            </div>
            <!-- /member-box-wrap -->

            <?php if(get_field('add-writter-on')): ?>

              <div class="member-box-wrap">

                <figure>
                  <?php if(get_field('add-writter-face')): ?>
                    <img src="<?php the_field('add-writter-face'); ?>" alt="<?php the_field('add-writter-name'); ?>">
                  <?php else: ?>
                    <img src="https://picsum.photos/400/400/?random">
                  <?php endif; ?>
                </figure>

                <div class="menber-info">

                  <div class="member-name">
                    <?php if(get_field('add-writter-position')): ?>
                      <p><?php the_field('add-writter-position'); ?></p>
                    <?php endif; ?>
                    <h4><?php the_field('add-writter-name'); ?></h4>
                    <ul>
                      <?php if(get_field('add-writter-line')): ?>
                        <li><a href="<?php the_field('add-writter-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-writter-fb')): ?>
                        <li><a href="<?php the_field('add-writter-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-writter-tw')): ?>
                        <li><a href="<?php the_field('add-writter-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-writter-insta')): ?>
                        <li><a href="<?php the_field('add-writter-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>

                  <div class="member-explain">
                    <div class="text">
                      <p><?php the_field('add-writter-explain'); ?></p>
                    </div>

                    <?php if(get_field('add-writter-url')): ?>
                    <p class="btn"><a href="<?php the_field('add-writter-url'); ?>">この人のことを<br>もっと詳しく見る</a></p>
                    <?php endif; ?>

                  </div>
                  <!-- /member-explain -->

                </div>
                <!-- /menber-info -->

              </div>
              <!-- /member-box-wrap -->

            <?php endif; ?>

          </div>
          <!-- /member-box -->

          <?php if(get_field('add-g1-heading')): ?>
          <div class="member-box">
            <h3><span><?php the_field('add-g1-heading'); ?></span></h3>

            <div class="member-box-wrap">

              <figure>
                <?php if(get_field('add-g1-p1-face')): ?>
                  <img src="<?php the_field('add-g1-p1-face'); ?>" alt="<?php the_field('add-g1-p1-name'); ?>">
                <?php else: ?>
                  <img src="https://picsum.photos/400/400/?random">
                <?php endif; ?>
              </figure>

              <div class="menber-info">

                <div class="member-name">
                  <?php if(get_field('add-g1-p1-position')): ?>
                    <p><?php the_field('add-g1-p1-position'); ?></p>
                  <?php endif; ?>
                  <h4><?php the_field('add-g1-p1-name'); ?></h4>
                  <ul>
                    <?php if(get_field('add-g1-p1-line')): ?>
                      <li><a href="<?php the_field('add-g1-p1-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('add-g1-p1-fb')): ?>
                      <li><a href="<?php the_field('add-g1-p1-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('add-g1-p1-tw')): ?>
                      <li><a href="<?php the_field('add-g1-p1-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if(get_field('add-g1-p1-insta')): ?>
                      <li><a href="<?php the_field('add-g1-p1-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                    <?php endif; ?>
                  </ul>
                </div>

                <div class="member-explain">
                  <div class="text">
                    <p><?php the_field('add-g1-p1-explain'); ?></p>
                  </div>

                  <?php if(get_field('add-g1-p1-url')): ?>
                  <p class="btn"><a href="<?php the_field('add-g1-p1-url'); ?>">この人のことを<br>もっと詳しく見る</a></p>
                  <?php endif; ?>

                </div>
                <!-- /member-explain -->

              </div>
              <!-- /menber-info -->

            </div>
            <!-- /member-box-wrap -->

            <?php if(get_field('add-g1-p2-on')): ?>

              <div class="member-box-wrap">

                <figure>
                  <?php if(get_field('add-g1-p2-face')): ?>
                    <img src="<?php the_field('add-g1-p2-face'); ?>" alt="<?php the_field('add-g1-p2-name'); ?>">
                  <?php else: ?>
                    <img src="https://picsum.photos/400/400/?random">
                  <?php endif; ?>
                </figure>

                <div class="menber-info">

                  <div class="member-name">
                    <?php if(get_field('add-g1-p2-position')): ?>
                      <p><?php the_field('add-g1-p2-position'); ?></p>
                    <?php endif; ?>
                    <h4><?php the_field('add-g1-p2-name'); ?></h4>
                    <ul>
                      <?php if(get_field('add-g1-p2-line')): ?>
                        <li><a href="<?php the_field('add-g1-p2-line'); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-g1-p2-fb')): ?>
                        <li><a href="<?php the_field('add-g1-p2-fb'); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-g1-p2-tw')): ?>
                        <li><a href="<?php the_field('add-g1-p2-tw'); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                      <?php endif; ?>
                      <?php if(get_field('add-g1-p2-insta')): ?>
                        <li><a href="<?php the_field('add-g1-p2-insta'); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>

                  <div class="member-explain">
                    <div class="text">
                      <p><?php the_field('add-g1-p2-explain'); ?></p>
                    </div>

                    <?php if(get_field('add-g1-p2-url')): ?>
                    <p class="btn"><a href="<?php the_field('add-g1-p2-url'); ?>">この人のことを<br>もっと詳しく見る</a></p>
                    <?php endif; ?>

                  </div>
                  <!-- /member-explain -->

                </div>
                <!-- /menber-info -->

              </div>
              <!-- /member-box-wrap -->

            <?php endif; ?>

          </div>
          <!-- /member-box -->
          <?php endif; ?>

        </div>

      </div>
    </div>
    <!-- /single-members -->

    <div class="sg-recommend">
      <div class="container">

        <div class="heading-c">
          <h2 class="ttl">オススメ記事</h2>
          <p>Recommend Articles</p>
        </div>

        <div class="related-list">

          <?php
            //記事の投稿タグを取得する
            $tags = wp_get_post_tags($post->ID);
            if($tags):
            //$tagIDに現在のIDを代入
            $tagID = array();
            foreach($tags as $tag){
              array_push($tagID, $tag -> term_id);
            }
            $args = array(
              'tag__in' => $tagID,
              'post__not_in' => array($post->ID),
              'posts_per_page' => 4,
              'ignore_sticky_posts'=>1,
              'orderby'=>'rand',
            );
            $my_query = new WP_Query($args);
            if($my_query-> have_posts()): while($my_query->have_posts()): $my_query->the_post();
          ?>

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
            <p class="post-empty">関連する記事はありません</p>
            <?php endif; endif; wp_reset_postdata(); ?>

          <article></article>

        </div>
        <!-- /related-list -->

        <p class="btn"><a href="<?php echo esc_url(home_url('/feature/')); ?>">全ての特集をチェックする</a></p>

      </div>
    </div>
    <!-- /sg-recommend -->
