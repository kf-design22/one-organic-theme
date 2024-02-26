<!doctype html>
<html lang="ja">
  <head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0W05DQRYS9"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-0W05DQRYS9');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- アイコンのファイルはルートディレクトに配置 -->

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php wp_head(); ?>

    <script>
      (function (d) {
        var config = {
            kitId: 'igf1dgu',
            scriptTimeout: 5000,
            async: true
          },
          h = d.documentElement,
          t = setTimeout(function () {
            h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
          }, config.scriptTimeout),
          tk = d.createElement("script"),
          f = false,
          s = d.getElementsByTagName("script")[0],
          a;
        h.className += " wf-loading";
        tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
        tk.async = true;
        tk.onload = tk.onreadystatechange = function () {
          a = this.readyState;
          if (f || a && a != "complete" && a != "loaded") return;
          f = true;
          clearTimeout(t);
          try {
            Typekit.load(config)
          } catch (e) {}
        };
        s.parentNode.insertBefore(tk, s)
      })(document);
    </script>

  </head>
  <body <?php body_class(); ?>>

    <div class="slide-menu">
      <div class="container">
        <div class="menu-box">

          <div class="menu-head">
            <a class="close">
              <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/menu-btn-pc-close.png'); ?>" alt="">
            </a>

            <div class="search-box">
              <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                <input type="text" name="s" id="s" placeholder="キーワード検索">
                <button type="submit"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/menu-search.png'); ?>" width="30" heoght="30" alt=""></button>
              </form>
            </div>
          </div>

          <nav class="global-nav">
            <?php
              $args = array(
                'container' => false,
                'theme_location'  => 'globalNav',
                'items_wrap'      => '<ul>%3$s</ul>',
              );
            wp_nav_menu( $args );
            ?>
          </nav>

        </div>
      </div>
    </div>

    <header class="header-map">
      <div class="container">
        <a class="menu-trigger">
          <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/menu-btn-pc.png'); ?>" alt="">
        </a>
        <p class="search"><a><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/icon-search.png'); ?>" alt="検索"></a></p>
        <h1 class="header-logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/oo-logo.svg'); ?>" alt="ワンオーガニックデイ">
          </a>
        </h1>
      </div>
    </header>
