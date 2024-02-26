<?php get_header(); ?>

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

      <!-- <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url('/news/')); ?>">
          <span itemprop="name">お知らせ</span>
        </a>
        <meta itemprop="position" content="2">
      </li> -->

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo get_the_permalink(); ?>">
          <span itemprop="name"><?php single_post_title(); ?></span>
        </a>
        <meta itemprop="position" content="3">
      </li>
    </ol>
  </div>

  <main>

    <div class="single-wrap">
      <div class="container">
        <article >

          <div class="sg-head">
            <p class="category">
              ニュース
            </p>
            <time><?php the_time('Y年m月d日 G:i') ?></time>
            <h1><?php the_title(); ?></h1>
          </div>

          <div class="sg-contents news-contents">

            <?php the_content(); ?>

          </div>
          <!-- /sg-contents -->

        </article>
      </div>
    </div>
    <!-- /single-wrap -->


  </main>

<?php get_footer(); ?>