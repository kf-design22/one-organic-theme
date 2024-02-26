<?php get_header(); ?>

  <div class="page-header">
    <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
  </div>
  <div class="page-header-pc">
    <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
  </div>

  <?php
    $terms = get_the_terms($post->ID,'spot-area');
  ?>

  <div class="bread">
    <ol itemscope itemtype="http://schema.org/BreadcrumbList" class="container">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url('/')); ?>">
          <span itemprop="name">TOP</span>
        </a>
        <meta itemprop="position" content="1">
      </li>

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo esc_url(home_url('/organicmap/')); ?>">
          <span itemprop="name">オーガニックMAP</span>
        </a>
        <meta itemprop="position" content="2">
      </li>

      <?php foreach( $terms as $term ): ?>

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo get_term_link($term->slug, 'spot-area'); ?>">
          <span itemprop="name"><?php echo $term->name; ?></span>
        </a>
        <meta itemprop="position" content="3">
      </li>

      <?php endforeach; ?>

      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="<?php echo get_the_permalink(); ?>">
          <span itemprop="name"><?php single_post_title(); ?></span>
        </a>
        <meta itemprop="position" content="4">
      </li>
    </ol>
  </div>

  <main>

    <div class="single-wrap">
      <div class="container">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <article >

            <div class="sg-head map-sghead">
              <p class="category">
                <?php
                  foreach( $terms as $term ) {
                  echo '<a href="'.get_term_link($term->slug, 'spot-area').'">'.$term->name.'</a>';
                  }
                ?>
              </p>

              <!-- <time><?php the_time('Y年m月d日 G:i') ?></time> -->
              <p class="spot-type">
                <?php $spotType = get_the_terms($post->ID, 'spot-cat'); ?>
                <?php echo $spotType[0]->name ?>
              </p>
              <h1><?php the_title(); ?></h1>
            </div>

            <div class="sg-contents map-sgcontents">

              <div class="spot-image-list onlysp">
                <div class="spot-img-item">
                  <?php
                    $pic_01 = get_field('spot_img01');
                    if(!empty($pic_01)):
                  ?>
                    <a href="<?php echo esc_url($pic_01['url']) ?>" data-lightbox="spotID_<?php the_ID(); ?>" data-title="<?php echo esc_url($pic_01['alt']) ?>">
                      <img src="<?php echo esc_url($pic_01['url']) ?>" alt="<?php echo esc_url($pic_01['alt']) ?>">
                    </a>
                  <?php else: ?>
                    <a href="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg" data-lightbox="spotID_<?php the_ID(); ?>" data-title="NO IMAGE">
                      <img src="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg">
                    </a>
                  <?php endif; ?>
                </div>
                <div class="spot-img-item">
                  <?php
                    $pic_02 = get_field('spot_img02');
                    if(!empty($pic_02)):
                  ?>
                    <a href="<?php echo esc_url($pic_02['url']) ?>" data-lightbox="spotID_<?php the_ID(); ?>" data-title="<?php echo esc_url($pic_02['alt']) ?>">
                      <img src="<?php echo esc_url($pic_02['url']) ?>" alt="<?php echo esc_url($pic_02['alt']) ?>">
                    </a>
                  <?php else: ?>
                    <a href="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg" data-lightbox="spotID_<?php the_ID(); ?>" data-title="NO IMAGE">
                      <img src="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg">
                    </a>
                  <?php endif; ?>
                </div>
                <div class="spot-img-item">
                  <?php
                    $pic_03 = get_field('spot_img03');
                    if(!empty($pic_03)):
                  ?>
                    <a href="<?php echo esc_url($pic_03['url']) ?>" data-lightbox="spotID_<?php the_ID(); ?>" data-title="<?php echo esc_url($pic_03['alt']) ?>">
                      <img src="<?php echo esc_url($pic_03['url']) ?>" alt="<?php echo esc_url($pic_03['alt']) ?>">
                    </a>
                  <?php else: ?>
                    <a href="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg" data-lightbox="spotID_<?php the_ID(); ?>" data-title="NO IMAGE">
                      <img src="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg">
                    </a>
                  <?php endif; ?>
                </div>
              </div>

              <h2>オーガニックポイント</h2>

              <?php the_content(); ?>

              <h2>基本情報</h2>
              <table class="map-detail-table">
                <tr>
                  <th>住所</th>
                  <td>
                    <?php the_field('spot_zip'); ?><br>
                    <?php the_field('spot_address'); ?>
                    <div class="g-map">
                      <?php the_field('spot_googlemap') ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>電話番号</th>
                  <td><a href="tel:<?php the_field('spot_tel'); ?>"><?php the_field('spot_tel'); ?></a></td>
                </tr>
                <tr>
                  <th>公式HP</th>
                  <td><a href="<?php the_field('spot_web'); ?>" target="blank"><?php the_field('spot_web'); ?></a></td>
                </tr>
                <?php if(get_field('spot_line')): ?>
                <tr>
                  <th>公式LINE</th>
                  <td><?php the_field('spot_line'); ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                  <th>補足情報</th>
                  <td>
                    <div class="supplement">
                      <?php
                        $checkedItems = get_field_object('spot_supplement');
                        $checkedItems_choices = $checkedItems['choices'];
                        $checkedItems_labels = $checkedItems['value'];
                        foreach ($checkedItems['choices'] as $checkedItem):
                          $is_selected = 'not_selected';
                          if (in_array($checkedItem, $checkedItems_labels)) {
                            $is_selected = '';
                          }
                      ?>
                        <span class="<?php echo $is_selected; ?>"><?php echo $checkedItem; ?></span>
                      <?php endforeach; ?>
                      <span class="_empty"></span>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>営業時間／定休日</th>
                  <td><?php the_field('spot_open'); ?></td>
                </tr>
                <?php if(get_field('spot_other')): ?>
                <tr>
                  <th>その他</th>
                  <td><?php the_field('spot_other'); ?></td>
                </tr>
                <?php endif; ?>
              </table>

            </div>
            <!-- /sg-contents -->

          </article>

        <?php endwhile; endif; ?>

      </div>
    </div>
    <!-- /single-wrap -->


  </main>

<?php get_footer(); ?>