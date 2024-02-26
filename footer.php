  <!-- <aside class="footer-banner">
    <div class="container">

      <ul>
        <li><a href=""><img src="https://picsum.photos/660/200/?random"></a></li>
        <li><a href=""><img src="https://picsum.photos/660/200/?random"></a></li>
        <li><a href=""><img src="https://picsum.photos/660/200/?random"></a></li>
      </ul>

    </div>
  </aside> -->

  <footer>

    <div class="deco-sheep-pc"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/sheep-pc.png'); ?>" alt="羊の装飾"></div>
    <div class="deco-sheep-sp"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/sheep-sp.png'); ?>" alt="羊の装飾"></div>

    <div class="deco-carrot"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/carrot-foot.png'); ?>" alt="人参の装飾"></div>

    <div class="inner">
      <div class="container">
        <p class="footer-logo">
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/oo-logo.svg'); ?>" alt="ワンオーガニックデイ">
          </a>
        </p>
        <div class="footer-content">
          <div class="operation-box">
            <!-- <p class="organizer">主催：ああああああああああああ</p> -->
            <p class="planner">企画・運営：ワンオーガニックデイ</p>
          </div>
          <nav class="footer-nav">
            <?php
              $args = array(
                'container' => false,
                'theme_location'  => 'footerMenu',
                'items_wrap'      => '<ul>%3$s</ul>',
              );
            wp_nav_menu( $args );
            ?>
            <!-- <ul>
              <li><a href="">ワンオーガニックデイ</a></li>
              <li><a href="">全ての記事</a></li>
              <li><a href="">オススメ読みもの</a></li>
              <li><a href="">特集企画</a></li>
            </ul>
            <ul>
              <li><a href="">オーガニックMAP</a></li>
              <li><a href="">メニューメニュー</a></li>
              <li><a href="">メニューメニュー</a></li>
              <li><a href="">メニューメニュー</a></li>
            </ul> -->
          </nav>
        </div>
        <!-- /footer-content -->
        <p class="copyright">&copy; <?php the_date('Y') ?>. ワンオーガニックデイ</p>
      </div>
    <!-- /container -->
    </div>
  </footer>

<?php wp_footer(); ?>
  </body>
</html>