<div class="map-sidebar-box">
  <h2>オーガニックMAP</h2>

    <p class="count-result">件数：<?php echo $wp_query->found_posts; ?>件</p>

    <?php
      $taxAreaInfo = get_queried_object();

      if($taxAreaInfo->parent == 0) { // 親であれば
        $term_id = get_queried_object_id();
      } else { // 子であれば
        $term_id = $taxAreaInfo->parent;
      }
      $term_info = get_term($term_id, 'spot-area');
    ?>

    <div class="pref-select">
      <div class="select-wrap">
        <select onchange="location.href=value;">

          <!-- <option value="">都道府県を選択</option> -->

          <?php
            $prefectures = get_terms( 'spot-area', ['parent' => 0]);
            foreach ($prefectures as $prefecture):

              if($term == $prefecture->slug) {
                $selectedItem = 'selected';
              } elseif($term_info->slug == $prefecture->slug) {
                $selectedItem = 'selected';
              } else {
                $selectedItem = '';
              }

          ?>

            <option value="<?php echo esc_url(home_url('/')); ?>spot-area/<?php echo $prefecture->slug ?>" <?php echo $selectedItem ?> >
              <?php echo $prefecture->name; ?>
            </option>

          <?php endforeach; ?>

        </select>
      </div>
      <p class="pref-select-memo">選択するとすぐにページが切り替わります。</p>
    </div>
    <!-- /pref-select -->

    <form method="get" id="search-map" action="<?php bloginfo('url'); ?>">
      <input type="hidden" name="search_type" value="map">
      <input type="hidden" name="post_type" value="organic-map">

      <div class="map-sidebar-group">
        <p class="map-sidebar-title">市区町村を選ぶ</p>
        <div class="input-item">
          <div class="select-wrap">
            <select name="spot-area">



              <option value="<?php echo $term_info->slug; ?>">【<?php echo  $term_info->name; ?> 全域】</option>

              <?php
                $taxonomy_name = 'spot-area';
                $args = array(
                  'parent' => $term_id,
                );

                $spotAreas = get_terms($taxonomy_name, $args);
                foreach ($spotAreas as $spotArea):

                // タームスタッグと、現在のページのタームスラックが同じ場合は、optionにselectedを付与
                if($taxAreaInfo->slug == $spotArea->slug) {
                  $selected = 'selected';
                } else {
                  $selected = '';
                }
              ?>

                <option value="<?php echo $spotArea->slug ?>" <?php echo $selected; ?> ><?php echo $spotArea->name ?></option>

              <?php endforeach; ?>

            </select>
          </div>
        </div>
      </div>
      <!-- /map-sidebar-group -->

      <div class="map-sidebar-group">
        <p class="map-sidebar-title">カテゴリーを選ぶ</p>
        <div class="input-item checkbox-item">

          <?php
            $spotCats = get_terms('spot-cat');
            foreach ($spotCats as $spotCat):
          ?>

          <label>
            <input type="checkbox" name="spot-cat[]" value="<?php echo $spotCat->slug ?>"><span><?php echo $spotCat->name ?></span>
          </label>

          <?php endforeach; ?>

        </div>
      </div>

      <div class="submit-btn">
        <input type="submit" value="絞り込む">
      </div>

      <p class="backPref"><a href="<?php echo esc_url(home_url('/map/')); ?>">都道府県の選択に戻る</a></p>

    </form>

</div>