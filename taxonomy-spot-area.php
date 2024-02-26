<?php get_header('map'); ?>

<main class="map-container">

  <div class="map-wrap">
    <div class="map-sidebar">

      <?php get_sidebar('map'); ?>

    </div>
    <div class="map-body">
      <div class="map-box">
        <div id="map" class="map"></div>
      </div>
      <!-- /map-wrap -->

      <div class="spot-list-wrap">

        <div class="spot-list">

          <?php
            $i = 1;
            if (have_posts()) : while (have_posts()) : the_post();
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

            ?>

            <article class="spot-list-item <?php echo $spotType[0]->slug ?>-item">
              <a href="<?php the_permalink() ?>">
                <figure>
                  <?php
                    $pic_01 = get_field('spot_img01');
                    if(!empty($pic_01)):
                  ?>
                    <img src="<?php echo esc_url($pic_01['url']) ?>" alt="<?php echo esc_url($pic_01['alt']) ?>">
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/lib/images/map-noimg.jpg">
                  <?php endif; ?>
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

          <?php $i++; endwhile; endif; ?>

          <?php
            $mapInfoJson = json_encode($mapInfoAll);
            // print_r($mapInfoAll);
          ?>

        </div>
        <!-- /spot-list -->
      </div>
      <!-- /spot-list-wrap -->

    </div>
  </div>

  <p class="map-search-btn">条件を絞り込む</p>

</main>

<!-- "YOUR_API_KEY" の部分に、作成したAPIキーを貼り付ける -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATUnNc8zZDjw998Qr1pbdO3P1Yb-yW0WQ&callback=initMap" async defer></script>

<!-- 👇このjsファイル内にAPIを使用した記述を書く（後述） -->
<script src="<?php echo get_template_directory_uri(); ?>/lib/js/maps.js"></script>

<?php

  $taxAreaInfo = $wp_query->get_queried_object();
  $term_idsp = 'spot-area_'.$taxAreaInfo->term_id;

  $markerDataArray = [
    // [
    //   "name" => "CAFE re:verb",
    //   "type" => "cafe",
    //   "lat" => 35.4104435,
    //   "lng" => 136.750479,
    //   "address" => "〒500-8833 岐阜県岐阜市神田町６丁目３ エムテック神田町ビル1F エムテック神田町ビル",
    //   "url" => "https://goo.gl/maps/JPUH7LP278ZvgVSG6"
    // ],
    // [
    //   "name" => "コメダ珈琲店 岐阜駅東店",
    //   "type" => "cafe",
    //   "lat" => 35.40932746640773,
    //   "lng" => 136.76346203576915,
    //   "address" => "〒500-8407 岐阜県岐阜市高砂町３丁目５０−１１",
    //   "url" => "https://goo.gl/maps/uipJzh6uqVQmfFVk8"
    // ],
  ];

  $markerDatas = json_encode($markerDataArray);

?>

<script>
  window.initMap = () => {

  let map;

  const area = document.getElementById("map"); // マップを表示させるHTMLの箱
  // マップの中心位置(例:原宿駅)
  const center = {
    lat: <?php echo the_field('area_lat', $term_idsp); ?>,
    lng: <?php echo the_field('area_Lng', $term_idsp); ?>
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
    const markerData = <?php print_r($mapInfoJson); ?>

    // const markerData = [{
    //     "name": "CAFE re:verb",
    //     "type": "cafe",
    //     "lat": 35.4104435,
    //     "lng": 136.750479,
    //     "address": "〒500-8833 岐阜県岐阜市神田町６丁目３ エムテック神田町ビル1F エムテック神田町ビル",
    //     "url": "https://goo.gl/maps/JPUH7LP278ZvgVSG6"
    //   },
    //   {
    //     "name": "コメダ珈琲店 岐阜駅東店",
    //     "type": "cafe",
    //     "lat": 35.40932746640773,
    //     "lng": 136.76346203576915,
    //     "address": "〒500-8407 岐阜県岐阜市高砂町３丁目５０−１１",
    //     "url": "https://goo.gl/maps/uipJzh6uqVQmfFVk8"
    //   },
    //   {
    //     "name": "お米の熊田（熊田米穀）",
    //     "type": "farmer",
    //     "lat": 35.4069675,
    //     "lng": 136.7365725,
    //     "address": "〒500-8474 岐阜県岐阜市加納本町６丁目１２−２",
    //     // "url": "https://goo.gl/maps/ckA28ah3BB2eUJre8"
    //   },
    // ];

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