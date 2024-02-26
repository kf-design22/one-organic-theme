<?php get_header('map'); ?>

<?php
  $spot_area = isset($_GET['spot-area']) ? $_GET['spot-area'] : '';
  $spot_cats = isset($_GET['spot-cat']) ? $_GET['spot-cat'] : array();

  if(!empty($spot_area)) {
    $areaSlug =  get_term_by('slug', $spot_area, 'spot-area');

    if($areaSlug->parent == 0) { //親であれば
      $parentTerm_id = $areaSlug->term_id;
    } else {
      $parentTerm_id = $areaSlug->parent;
    }

    $parentTerms = get_term($parentTerm_id);
  }
?>


<?php // echo $spot_area . "<br>"; ?>
<?php // print_r($spot_cats); ?>

<main class="map-container">

  <div class="map-wrap">
    <div class="map-sidebar">

      <?php if(empty($spot_area)): ?>

        <?php get_sidebar('map'); ?>

      <?php else: ?>

      <div class="map-sidebar-box">
        <h2>オーガニックMAP</h2>

          <p class="count-result">件数：<?php echo $wp_query->found_posts; ?>件</p>

          <div class="pref-select">
            <div class="select-wrap">
              <select onchange="location.href=value;">

                <!-- <option value="">都道府県を選択</option> -->

                <?php
                  $prefectures = get_terms( 'spot-area', ['parent' => 0]);
                  foreach ($prefectures as $prefecture):

                    if($parentTerms->slug == $prefecture->slug) {
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

                    <option value="<?php echo  $parentTerms->slug; ?>">【<?php echo  $parentTerms->name; ?> 全域】</option>

                    <?php
                      $taxonomy_name = 'spot-area';
                      $args = array(
                        'parent' => $parentTerm_id,
                      );

                      $spotAreas = get_terms($taxonomy_name, $args);
                      foreach ($spotAreas as $spotArea):

                      if($spot_area == $spotArea->slug) {
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
                  $checked = in_array($spotCat->slug, $spot_cats) ? 'checked' : '';
                ?>

                <label>
                  <input type="checkbox" name="spot-cat[]" value="<?php echo $spotCat->slug ?>" <?php echo $checked ?> ><span><?php echo $spotCat->name ?></span>
                </label>

                <?php endforeach; ?>

              </div>
            </div>

            <div class="submit-btn">
              <input type="submit" value="絞り込む">
            </div>

            <p class="backPref"><a href="<?php echo esc_url(home_url('/organicmap/')); ?>">都道府県の選択に戻る</a></p>

          </form>

      </div>

      <?php endif; ?>

    </div>
    <div class="map-body">
      <div class="map-box">
        <div id="map" class="map"></div>
      </div>
      <!-- /map-wrap -->

      <div class="spot-list-wrap">

        <div class="spot-list">

          <?php if(empty($spot_area)): //カテゴリチェックがない時 通常loop ?>

            <?php
              $i = 1;
              if (have_posts()) : while (have_posts()) : the_post();

              $spotTitle = get_the_title();
              $spotType = get_the_terms($post->ID, 'spot-cat');
              $spotLat = get_field('lat_point');
              $spotLon = get_field('lon_point');
              $spotWeb = get_the_permalink();

              $mapInfo = [
                'name' => $spotTitle,
                'type' => $spotType[0]->slug,
                'lat' => (float)$spotLat,
                'lng' => (float)$spotLon,
                'url' => $spotWeb,
              ];

              $mapInfoAll[] = $mapInfo;

              // print_r($mapInfoAll);

            ?>

              <article class="spot-list-item <?php echo $spotType[0]->slug ?>-item">
                <a href="<?php the_permalink() ?>">
                  <figure>
                    <img src="https://picsum.photos/640/396/?random">
                  </figure>
                  <div class="spot-content">
                    <!-- <p class="cat-name"><?php echo $spotType[0]->name ?></p> -->
                    <?php
                      $terms = get_the_terms($post->ID,'spot-area');
                      foreach( $terms as $term ) {
                        $prefectures_info = get_term($term->parent);
                        $prefectures = $prefectures_info->name; //都道府県名格納
                        $municipalities = $term->name; // 市区町村格納
                      }
                    ?>
                    <p class="cat-name"><?php echo $prefectures; echo $municipalities ?></p>


                    <h2><?php the_title() ?></h2>
                    <ul class="kerwords">
                      <li>キーワード</li>
                      <li>キーワード</li>
                      <li>キーワード</li>
                    </ul>
                    <p class="description"><?php echo get_field('spot_description'); ?></p>
                    <?php if($spotType[0]->slug == 'restaurant'): ?>
                      <ul class="supplement">
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
                          <li class="<?php echo $is_selected; ?>"><?php echo $checkedItem; ?></li>
                        <?php endforeach; ?>
                        <li class="_empty"></li>
                      </ul>
                    <?php endif; ?>
                    <?php if(get_field('spot_access')): ?>
                      <dl>
                        <dt><i class="fa-solid fa-map-location-dot"></i></dt>
                        <dd><?php the_field('spot_access') ?></dd>
                      </dl>
                    <?php endif; ?>
                    <?php if(get_field('spot_open')): ?>
                      <dl>
                        <dt><i class="fa-regular fa-clock"></i></dt>
                        <dd><?php the_field('spot_open') ?></dd>
                      </dl>
                    <?php endif; ?>
                    <?php if(get_field('spot_seat')): ?>
                      <dl>
                        <dt><i class="fa-solid fa-chair"></i></dt>
                        <dd><?php the_field('spot_seat') ?></dd>
                      </dl>
                    <?php endif; ?>
                    <?php if(get_field('spot_info')): ?>
                      <dl>
                        <dt><i class="fa-solid fa-info"></i></dt>
                        <dd><?php the_field('spot_info') ?></dd>
                      </dl>
                    <?php endif; ?>
                  </div>
                </a>
              </article>

            <?php $i++; endwhile; else: ?>
              <p>スポットはありません</p>
            <?php endif; ?>

            <?php
              if(isset($mapInfoAll)) {
                $mapInfoJson = json_encode($mapInfoAll);
              }
              // print_r($mapInfoAll); 配列の書き出し
            ?>


          <?php else: //カテゴリチェックがある時 wp_query ?>

            <?php
              // クエリを作成
              $args = array(
                'post_type' => 'maps',
                'posts_per_page' => -1, // 全ての投稿を表示する場合は -1
                'tax_query' => array(
                  'relation' => 'AND', // カテゴリとタグの両方を満たす投稿を取得する
                  array(
                    'taxonomy' => 'spot-area',
                    'field' => 'slug',
                    'terms' => $spot_area,
                  ),
                  array(
                    'taxonomy' => 'spot-cat',
                    'field' => 'slug',
                    'terms' => $spot_cats,
                  ),
                ),
              );

              $i = 1;

              $the_query = new WP_Query($args);
              if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
            ?>

            <?php
              // echo $i;

              $spotTitle = get_the_title();
              $spotType = get_the_terms($post->ID, 'spot-cat');
              $spotLat = get_field('lat_point');
              $spotLon = get_field('lon_point');
              $spotWeb = get_the_permalink();

              $mapInfo = [
                'name' => $spotTitle,
                'type' => $spotType[0]->slug,
                'lat' => (float)$spotLat,
                'lng' => (float)$spotLon,
                'url' => $spotWeb,
              ];

              $mapInfoAll[] = $mapInfo;

              // print_r($mapInfoAll);

            ?>

              <article class="spot-list-item <?php echo $spotType[0]->slug ?>-item">
                <a href="<?php the_permalink() ?>">
                  <figure>
                    <img src="https://picsum.photos/640/396/?random">
                  </figure>
                  <div class="spot-content">
                    <!-- <p class="cat-name"><?php echo $spotType[0]->name ?></p> -->
                    <?php
                      $terms = get_the_terms($post->ID,'spot-area');
                      foreach( $terms as $term ) {
                        $prefectures_info = get_term($term->parent);
                        $prefectures = $prefectures_info->name; //都道府県名格納
                        $municipalities = $term->name; // 市区町村格納
                      }
                    ?>
                    <p class="cat-name"><?php echo $prefectures; echo $municipalities ?></p>


                    <h2><?php the_title() ?></h2>
                    <ul class="kerwords">
                      <li>キーワード</li>
                      <li>キーワード</li>
                      <li>キーワード</li>
                    </ul>
                    <p class="description"><?php echo get_field('spot_description'); ?></p>
                    <?php if($spotType[0]->slug == 'restaurant'): ?>
                      <ul class="supplement">
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
                          <li class="<?php echo $is_selected; ?>"><?php echo $checkedItem; ?></li>
                        <?php endforeach; ?>
                        <li class="_empty"></li>
                      </ul>
                    <?php endif; ?>
                    <?php if(get_field('spot_access')): ?>
                      <dl>
                        <dt><i class="fa-solid fa-map-location-dot"></i></dt>
                        <dd><?php the_field('spot_access') ?></dd>
                      </dl>
                    <?php endif; ?>
                    <?php if(get_field('spot_open')): ?>
                      <dl>
                        <dt><i class="fa-regular fa-clock"></i></dt>
                        <dd><?php the_field('spot_open') ?></dd>
                      </dl>
                    <?php endif; ?>
                    <?php if(get_field('spot_seat')): ?>
                      <dl>
                        <dt><i class="fa-solid fa-chair"></i></dt>
                        <dd><?php the_field('spot_seat') ?></dd>
                      </dl>
                    <?php endif; ?>
                    <?php if(get_field('spot_info')): ?>
                      <dl>
                        <dt><i class="fa-solid fa-info"></i></dt>
                        <dd><?php the_field('spot_info') ?></dd>
                      </dl>
                    <?php endif; ?>
                  </div>
                </a>
              </article>

            <?php $i++; endwhile; else: ?>
              <p>スポットはありません</p>
            <?php endif; ?>

            <?php
              if(isset($mapInfoAll)) {
                $mapInfoJson = json_encode($mapInfoAll);
              }
              // print_r($mapInfoAll);
            ?>

            <?php endif; ?>

        </div>
        <!-- /spot-list -->

      </div>
      <!-- /spot-list-wrap -->


    </div>
  </div>
  <!-- /map-wrap -->

  <p class="map-search-btn">条件を絞り込む</p>

</main>

<!-- "YOUR_API_KEY" の部分に、作成したAPIキーを貼り付ける -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATUnNc8zZDjw998Qr1pbdO3P1Yb-yW0WQ&callback=initMap" async defer></script>

<!-- 👇このjsファイル内にAPIを使用した記述を書く（後述） -->
<script src="<?php echo get_template_directory_uri(); ?>/lib/js/maps.js"></script>

<?php
  // マップの中心地情報の取得
  if(empty($spot_area)) {
    $taxAreaInfo = $wp_query->get_queried_object();
    $term_idsp = 'spot-area_'.$taxAreaInfo->term_id;
  } else {
    $term_idsp = 'spot-area_'.$areaSlug->term_id;
  }
?>

<script>
  window.initMap = () => {

  let map;

  const area = document.getElementById("map"); // マップを表示させるHTMLの箱
  // マップの中心位置
  const center = {
    lat: <?php echo the_field('area_lat', $term_idsp); ?>,
    lng: <?php echo the_field('area_Lng', $term_idsp); ?>

    // lat: 35.4095278,
    // lng: 136.7538907
  };

  //マップ作成
  map = new google.maps.Map(area, {
    center,
    zoom: 12,
  });

  //マーカーオプション設定👇追記
    const markerOption = {
      position: center, // マーカーを立てる位置を指定
      map: map, // マーカーを立てる地図を指定
      icon: {
        url: 'https://check.takkyu-style.com/202210-oneorganic/wpfile/wp-content/themes/one-organic-theme/lib/images/map-pinsample.png'// お好みの画像までのパスを指定
      }
    }

    ///マーカー表示データ
    <?php if(!empty($mapInfoJson)): ?>
    const markerData = <?php print_r($mapInfoJson); ?>
    <?php endif; ?>

    //マーカーを格納する配列
    const marker = [];

    //吹き出し（情報ウィンドウ）を格納する配列
    const infoWindow = [];

    // マーカーをクリックしたときのイベント登録
    const markerEvent = (i) => {
      marker[i].addListener('click', () => {
        for (const j in marker) {
          //マーカーをクリックしたときに他の情報ウィンドウを閉じる
          infoWindow[j].close(map, marker[j]);
        }

        //クリックされたマーカーの吹き出し（情報ウィンドウ）を表示
        infoWindow[i].open(map, marker[i]);
      });
    }

    // マーカー毎の処理
    for (let i = 0; i < markerData.length; i++) {

      //マーカー作成
      // 緯度経度のデータ作成
      const markerLatLng = new google.maps.LatLng({
        lat: markerData[i]['lat'],
        lng: markerData[i]['lng']
      });

      //マーカーオプション設定
      const markerOption = {
        position: markerLatLng, // マーカーを立てる位置を指定
        map: map, // マーカーを立てる地図を指定
        icon: {
          url: 'https://check.takkyu-style.com/202210-oneorganic/wpfile/wp-content/themes/one-organic-theme/lib/images/map-pinsample.png'//デフォルトのマーカー画像
        }
      }

      //カテゴリーが「カフェ」だったときのマーカー画像を設定
      if (markerData[i]['type'] === 'restaurant') {
        markerOption.icon = 'https://check.takkyu-style.com/202210-oneorganic/wpfile/wp-content/themes/one-organic-theme/lib/images/mappin-cafe.png'
      }
      //カテゴリーが「農家」だったときのマーカー画像を設定
      if (markerData[i]['type'] === 'farmer') {
        markerOption.icon = 'https://check.takkyu-style.com/202210-oneorganic/wpfile/wp-content/themes/one-organic-theme/lib/images/mappin-farmer.png'
      }
      //カテゴリーが「企業」だったときのマーカー画像を設定
      if (markerData[i]['type'] === 'company') {
        markerOption.icon = 'https://check.takkyu-style.com/202210-oneorganic/wpfile/wp-content/themes/one-organic-theme/lib/images/mappin-company.png'
      }


      //各データごとにマーカーを作成
      marker[i] = new google.maps.Marker(markerOption);

      // 各データごとに吹き出し（情報ウィンドウ）を作成
      infoWindow[i] = new google.maps.InfoWindow({
        content: `<div class="bubble-box ${markerData[i]['type']}">
                <div class="bubble-icon">
                  <img src="https://picsum.photos/56/56/?random">
                </div>
                <div class="bubble-type">
                  ${markerData[i]['type']}
                </div>
                <div class="bubble-name">
                  ${markerData[i]['name']}
                </div>
                <div class="bubble-button">
                  <a href="${markerData[i]['url']}" target="_blank">詳細を見る<i class="fa-solid fa-angle-right"></i></a>
                </div>
            </div>` // 吹き出しに表示する内容
      });

      // 各マーカーにクリックイベントを追加
      markerEvent(i);
    }
}
</script>

<?php get_footer(); ?>

