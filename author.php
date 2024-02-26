<?php get_header(); ?>

<?php
  $userId = get_query_var('author');
  $userdata = get_userdata($userId);
  $userID = get_the_author_meta('ID');
?>


<div class="page-header">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
</div>
<div class="page-header-pc">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
</div>

  <div class="bread">
    <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="container">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url('/')); ?>">
          <span itemprop="name">TOP</span>
        </a>
        <meta itemprop="position" content="1">
      </li>

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url('/staff/')); ?>">
          <span itemprop="name">スタッフ紹介</span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo get_the_permalink(); ?>">
          <span itemprop="name"><?php echo esc_html($userdata->display_name); ?></span>
        </a>
        <meta itemprop="position" content="3">
      </li>
    </ol>
  </div>

  <main>

    <div class="container">
      <div class="profile-wrap cpn-page-w">

        <div class="profile-box">

          <figure>
            <?php if(get_field('oo_user_img', 'user_' . $userID)): ?>
              <img src="<?php the_field('oo_user_img', 'user_' . $userID); ?>" alt="<?php echo esc_html($userdata->nickname); ?>">
              <!-- <img src="<?php the_field('oo_user_img'); ?>" alt="<?php echo esc_html($userdata->nickname); ?>"> -->
            <?php else: ?>
              <img src="https://picsum.photos/400/400/?random">
            <?php endif; ?>
          </figure>

          <div class="info">
            <ul class="position">
              <li><span><?php the_field('oo_user_posi1', 'user_' . $userID); ?></span></li>
              <?php if(get_field('oo_user_posi2', 'user_' . $userID)): ?>
              <li><span><?php the_field('oo_user_posi2', 'user_' . $userID); ?></span></li>
              <?php endif; ?>
            </ul>

            <div class="name">
              <h3><?php echo esc_html($userdata->display_name); ?></h3>

              <p><?php the_field('oo_user_en'); ?></p>
            </div>

            <div class="text">
              <p><?php echo esc_html($userdata->description); ?></p>
            </div>

            <ul class="sns">
              <?php if(get_field('oo_user_line', 'user_' . $userID)): ?>
                <li><a href="<?php the_field('oo_user_line', 'user_' . $userID); ?>" target="_blank"><i class="fa-brands fa-line"></i></a></li>
              <?php endif; ?>
              <?php if(get_field('oo_user_fb', 'user_' . $userID)): ?>
                <li><a href="<?php the_field('oo_user_fb', 'user_' . $userID); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
              <?php endif; ?>
              <?php if(get_field('oo_user_tw', 'user_' . $userID)): ?>
                <li><a href="<?php the_field('oo_user_tw', 'user_' . $userID); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
              <?php endif; ?>
              <?php if(get_field('oo_user_inst', 'user_' . $userID)): ?>
                <li><a href="<?php the_field('oo_user_inst', 'user_' . $userID); ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
              <?php endif; ?>
            </ul>
          </div>
          <!-- /info -->

        </div>
        <!-- /profile-info -->

        <div class="profile-h3">
          <h3>記事一覧</h3>
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

          <?php endwhile; else: ?>
            <p class="no-post">現在記事はありません。</p>
          <?php endif; ?>

          <article></article>

        </div>

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

        <p class="btn"><a href="<?php echo esc_url(home_url('/staff/')); ?>">他のメンバーも見る</a></p>

      </div>
      <!-- /profile-wrap -->
    </div>

  </main>

<?php get_footer(); ?>