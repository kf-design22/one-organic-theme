<?php get_header(); ?>

  <main>

    <div class="home-main-visual">
      <p class="catchcopy">たった一つの<br>
        行動が<br>
        未来の地球の<br>
        種になる。
      </p>
      <div class="dragonfly"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/dragonfly.png'); ?>" alt="トンボ"></div>
    </div>

    <div class="tops-contents">
      <div class="container">

        <div class="heading-a">
          <h2>
            オ<em class="color-bl">ー</em><em class="color-or">ガ</em>ニ<em class="color-bl">ッ</em><em
              class="color-or">ク</em><br>コ<em class="color-bl">ン</em><em class="color-or">テ</em>ン<em
              class="color-bl">ツ</em>
          </h2>
          <p>Organic Contents</p>

          <div class="riceplant-l"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/riceplant-left.png'); ?>" alt=""></div>
          <div class="riceplant-r"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/riceplant-right.png'); ?>" alt=""></div>
        </div>

        <div class="contents-list fadein fade-in-up">

          <div class="contents-item">
            <a href="<?php echo esc_url(home_url('/article/')); ?>">
              <p>オーガニック情報を<br>チェック！</p>
              <figure>
                <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/home-contentimg-01.jpg'); ?>" alt="すべての記事">
              </figure>
              <h3>すべての記事</h3>
            </a>
          </div>

          <div class="contents-item">
            <a href="<?php echo esc_url(home_url('/features/organincllife/')); ?>">
              <p>オーガニック専門家<br>の特集</p>
              <figure>
                <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/home-contentimg-02.jpg'); ?>" alt="OrganicLife.">
              </figure>
              <h3>OrganicLife.</h3>
            </a>
          </div>

          <div class="contents-item">
            <a href="<?php echo esc_url(home_url('/article/?')); ?>">
              <p>気になるワードから<br>探す！</p>
              <figure>
                <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/home-contentimg-03.jpg'); ?>" alt="オーガニック検索">
              </figure>
              <h3>オーガニック検索</h3>
            </a>
          </div>

          <div class="contents-item">
            <a href="<?php echo esc_url(home_url('/about/#home-sns')); ?>">
              <p>SNSを<br>フォローする！</p>
              <figure>
                <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/home-contentimg-04.jpg'); ?>" alt="1029メディア">
              </figure>
              <h3>1029メディア</h3>
            </a>
          </div>

        </div>
        <!-- /contents-list -->

      </div>
    </div>
    <!-- /tops-contents -->

    <div class="top-articles">
      <div class="container">

        <div class="heading-c">
          <h2 class="ttl">新着記事</h2>
          <p>New Article</p>
        </div>

        <div class="article-list">

          <?php
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 5,
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>

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

        </div>
        <!-- /article-list -->

        <p class="btn"><a href="https://one-organic-day.life/wpfile/article/">最新記事をチェックする</a></p>

        <p class="vegi-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/vegi-cucumber.png'); ?>" alt="野菜の装飾"></p>

      </div>

    </div>
    <!-- /top-articles -->

    <div class="top-feature">
      <div class="container">

        <div class="heading-c">
          <h2 class="ttl">オススメ特集</h2>
          <p>Recommend Featuer</p>
        </div>

        <div class="feature-slide-wrap fadein fade-in-left">
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

              <!-- <div class="box">
                <a href="">
                  <figure>
                    <img src="https://picsum.photos/820/320/?random">
                  </figure>
                  <h3>てきすとてきすとてきすとてきすと</h3>
                </a>
              </div>

              <div class="box">
                <a href="">
                  <figure>
                    <img src="https://picsum.photos/820/320/?random">
                  </figure>
                  <h3>てきすとてきすとてきすとてきすと</h3>
                </a>
              </div> -->

            </div>
            <!-- /feature-slide -->

            <p class="vegi-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/turnip-onion.png'); ?>" alt="野菜の装飾"></p>
            <p class="vegi-right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/vegi-eggplant.png'); ?>" alt="野菜の装飾"></p>



          </div>
          <!-- /feature-box -->

          <p class="btn"><a href="<?php echo esc_url(home_url('/feature/')); ?>">全ての特集をチェックする</a></p>
        </div>

        <!-- <div class="heading-c">
          <h2 class="ttl">オススメ特集</h2>
          <p>Recommend Featuer</p>
        </div> -->

        <div class="feature-list fadein fade-in-right">

          <?php
            $args = array(
              'category_name' => 'cat-01',
              // ↑カテゴリースラッグを変更
              'posts_per_page' => 6,
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
        </div>

        <!-- <p class="btn"><a href="<?php echo esc_url(home_url('/article/cat-01/')); ?>">「カテゴリー」をもっと見る</a></p> -->

      </div>
    </div>
    <!-- /top-feature -->

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

        <div class="gpepper"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/greenpepper.png'); ?>" alt="野菜の装飾"></div>
      </div>
    </div>
    <!-- /related-keyword -->

    <div class="top-staff">
      <div class="container">

        <div class="bee-01"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/bee-02.png'); ?>" alt="ハチの装飾"></div>
        <div class="bee-02"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/bee-03.png'); ?>" alt="ハチの装飾"></div>
        <div class="lemon"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/lemon.png'); ?>" alt="レモン"></div>

        <div class="heading-a">
          <h2>
            当サイトのスタッフ
          </h2>
          <p>Staff</p>
        </div>

        <?php get_template_part('/lib/parts/staff-list'); ?>

        <p class="btn"><a href="<?php echo esc_url(home_url('/staff/')); ?>">その他のメンバーも見る</a></p>

      </div>
    </div>
    <!-- /top-staff -->

    <div class="top-news">
      <div class="container">

        <div class="heading-c">
          <h2 class="ttl">お知らせ</h2>
          <p>News</p>
        </div>

        <table class="news-list fadein fade-in-right">
          <?php
            $args = array(
              'post_type' => 'news',
              'posts_per_page' => 6,
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) : $the_query->the_post(); ?>

          <tr>
            <th><?php the_time('Y年') ?><br><?php the_time('m月d日') ?><br><?php the_time('G:i') ?></th>
            <td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
          </tr>


          <?php endwhile;?>
          <?php else:?>
            <p class="no-post">記事はありません。</p>
          <?php
            endif;
            wp_reset_postdata();
          ?>
        </table>

      </div>
    </div>

  </main>

<?php get_footer(); ?>



<?php $users = get_users( array('orderby'=>ID,'order'=>ASC) ); ?>
<div class="authors" style="display: none;">
<?php foreach($users as $user) {
$uid = $user->ID; ?>
<div class="author-profile">
	<span class="author-thumbanil"><?php echo get_avatar( $uid ,300 ); ?></span>
	<span class="author-name"><?php echo $user->display_name ; ?></span>
	<span class="author-description"><?php echo $user->user_description ; ?></span>
	<span class="author-link"><a href="<?php echo get_bloginfo("url") . '/?author=' . $uid ?>"><?php echo $user->display_name ; ?>の記事一覧</a></span>
</div>
<?php } ?>
</div>