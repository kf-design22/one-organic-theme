<?php

/*------------------------------
  1. CSS and JS include
  2. COUSTOM MENU
  3. THUMBNAILS
  4. CUSTOM POST
  5. CUSTOM TAXONOMY
  6. EDITOR STYLE
  7. BODY CLASS
  8. ADMINISTRATOR RIGHTS
  9. FLAMINGO RIGHTS
  10. OTHER
------------------------------*/


/*------------------------------
  1. CSS,JS >> CSSとjsの読み込み
------------------------------*/

function organic_file() {
  if(is_singular('maps')) {
    wp_enqueue_script( 'organic_lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js', array(), '1.0', true );
    wp_enqueue_style( 'organic_lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css', array(), '1.0' );
  }
  wp_enqueue_style( 'organic_slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css', array(), '1.0' );
  wp_enqueue_style( 'organic_slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css', array(), '1.0' );
  wp_enqueue_script( 'organic_slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.0', true );
  wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array(), '1.0' );
  wp_enqueue_style( 'abcde_style', get_template_directory_uri() . '/lib/css/style.css', array(), '1.0' );
  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'abcde_script', get_template_directory_uri() . '/lib/js/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'organic_file' );



/*------------------------------
  2. CUSTOM MENU >> 管理画面にカスタムメニューを追加
------------------------------*/
register_nav_menus( array(
    'globalNav' => 'グローバルナビに表示させるメニュー',
    'footerMenu' => 'フッターナビに表示させるメニュー',
) );



/*------------------------------
  3. THUMBNAILS >> 投稿画面にアイキャッチを追加とカスタムサイズの設定
------------------------------*/
function add_thumbnail_size() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'sg-thumbnail', 1040, 643, true );
}
add_action( 'after_setup_theme', 'add_thumbnail_size' );



/*------------------------------
  4. CUSTOM POST >> カスタム投稿タイプ
------------------------------*/

function create_post_type() {
  register_post_type( 'news',
    array(
      'labels' => array(
        'name' => __( 'ニュース' ),
        'singular_name' => __( 'ニュース' )
      ),
      'public' => true,
      'has_archive' => false,
      'menu_position' => 5,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'excerpt'),
    )
  );
  // マップ用 202402追加
  register_post_type( 'maps',
    array(
      'labels' => array(
        'name' => __( 'マップ' ),
        'singular_name' => __( 'マップ' )
      ),
      'public' => true,
      'has_archive' => false,
      'menu_position' => 5,
      'show_in_rest' => true,
      'supports' => array('title', 'editor', 'excerpt'),
    )
  );
}
add_action( 'init', 'create_post_type' );



/*------------------------------
  5. CUSTOM TAXONOMY >> カスタムタクソノミー
------------------------------*/

// マップ用 202402追加
function creat_taxonomies() {
  register_taxonomy(
      'spot-cat',
      array( 'maps' ),
      array(
          'label'            => 'スポットカテゴリー', //表示名
          'show_ui'           => true, //管理画面に表示するか
          'show_admin_column' => true, //管理画面の一覧に表示するか
          'show_in_nav_menus' => true, //カスタムメニューの作成画面で表示するか
          'show_in_rest' => true,
          'hierarchical' => true,
      )
  );
  register_taxonomy(
      'spot-area',
      array( 'maps' ),
      array(
          'label'            => 'エリア', //表示名
          'show_ui'           => true, //管理画面に表示するか
          'show_admin_column' => true, //管理画面の一覧に表示するか
          'show_in_nav_menus' => true, //カスタムメニューの作成画面で表示するか
          'show_in_rest' => true,
          'hierarchical' => true,
      )
  );
}
add_action( 'init', 'creat_taxonomies'  );



/*------------------------------
  6. EDITOR STYLE >> 投稿画面のエディタースタイル
------------------------------*/

add_editor_style('lib/css/editor-style.css');
function custom_editor_settings( $initArray ){
    $initArray['body_class'] = 'editor-area';
    return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );


/*------------------------------
  7. BODY CLASS >> body_class();にスラッグの追加
------------------------------*/

add_filter( 'body_class', 'add_page_slug_class_name' );
function add_page_slug_class_name( $classes ) {
  if ( is_page() ) {
    $page = get_post( get_the_ID() );
    $classes[] = 'page-'.$page->post_name;
  }
  return $classes;
}


/*------------------------------
  8. ADMINISTRATOR RIGHTS >> 編集者権限制御 コメントアウトで無効（※アウトしない場合に有効）
------------------------------*/
function remove_menus () {
  if (!current_user_can('administrator')) { //管理者ではない場合
//    remove_menu_page( 'index.php' );                  // ダッシュボード
//	  remove_menu_page( 'edit.php' );                   // 投稿
//	  remove_menu_page( 'upload.php' );                 // メディア
    remove_menu_page( 'edit.php?post_type=news' );    // ニュース
    remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ
    remove_menu_page( 'edit-comments.php' );          // コメント
//	  remove_menu_page( 'themes.php' );                 // 外観
//	  remove_menu_page( 'plugins.php' );                // プラグイン
//	  remove_menu_page( 'users.php' );                  // ユーザー
    remove_menu_page( 'tools.php' );                  // ツール
    remove_menu_page( 'options-general.php' );        // 設定

    remove_menu_page('wpcf7'); //Contact Form 7
  }
}
add_action('admin_menu', 'remove_menus');


/*------------------------------
  9. FLAMINGO RIGHTS >> フラミンゴ編集者権限付与
------------------------------*/
// function flamingo_custom_cap( $caps, $cap, $user_id, $args ) {
//   $meta_caps = array(
//     'flamingo_edit_contacts' => 'edit_posts',
//     'flamingo_edit_contact' => 'edit_posts',
//     'flamingo_delete_contact' => 'edit_posts',
//     'flamingo_edit_inbound_messages' => 'edit_posts',
//     'flamingo_edit_inbound_message' => 'edit_posts',
//     'flamingo_delete_inbound_message' => 'edit_posts',
//     'flamingo_delete_inbound_messages' => 'edit_posts',
//     'flamingo_spam_inbound_message' => 'edit_posts',
//     'flamingo_unspam_inbound_message' => 'edit_posts',
//     'flamingo_edit_outbound_messages' => 'edit_posts',
//     'flamingo_edit_outbound_message' => 'edit_posts',
//     'flamingo_delete_outbound_message' => 'edit_posts' );

//   $caps = array_diff( $caps, array_keys( $meta_caps ) );

//   if ( isset( $meta_caps[$cap] ) )
//       $caps[] = $meta_caps[$cap];

//   return $caps;
// }
// remove_filter( 'map_meta_cap', 'flamingo_map_meta_cap' );
// add_filter( 'map_meta_cap', 'flamingo_custom_cap', 5, 4 );


/*------------------------------
  10. OTHER >> その他
------------------------------*/

/* 絵文字機能削除 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/* headのwpバージョン削除 */
remove_action('wp_head','wp_generator');

// メニューの　タイトル属性を出力
function attribute_add_nav_menu($item_output, $item){
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<span class='sub-title'>{$item->attr_title}</span><", $item_output);
}
add_filter('walker_nav_menu_start_el', 'attribute_add_nav_menu', 10, 4);



// プロフィールの項目の削除
function my_new_profile( $profilenewitem ) {
  // $profilenewitem['twitter'] = 'Twitter';
  // $profilenewitem['facebook'] = 'Facebook';
  // $profilenewitem['hatena'] = 'はてな';
  // $profilenewitem['mixi'] = 'mixi';
  // $profilenewitem['Flickr'] = 'Flickr';
  // $profilenewitem['YouTube'] = 'YouTube';
  // $profilenewitem['Tumblr'] = 'Tumblr';
  unset($profilenewitem['aim']);
  unset($profilenewitem['yim']);
  unset($profilenewitem['jabber']);
  unset($profilenewitem['facebook']);
  unset($profilenewitem['instagram']);
  unset($profilenewitem['linkedin']);
  unset($profilenewitem['myspace']);
  unset($profilenewitem['pinterest']);
  unset($profilenewitem['soundcloud']);
  unset($profilenewitem['tumblr']);
  unset($profilenewitem['twitter']);
  unset($profilenewitem['youtube']);
  unset($profilenewitem['wikipedia']);
  return $profilenewitem;
}
add_filter('user_contactmethods','my_new_profile',10,1);

// 検索結果から固定ページを削除
function mySearchFilter($query) {
	if ( !is_admin() && $query->is_main_query() && $query -> is_search() ) {
		$query->set( 'post_type', 'post' );
	}
}
add_action( 'pre_get_posts','mySearchFilter' );

// 管理画面の投稿一覧をログイン中のユーザーの投稿のみに制限する(管理者以外)
function pre_get_author_posts( $query ) {
    if ( is_admin() && !current_user_can('administrator') && $query->is_main_query()
            && ( !isset($_GET['author']) || $_GET['author'] == get_current_user_id() )) {
        $query->set( 'author', get_current_user_id() );
        unset($_GET['author']);
    }
}
add_action( 'pre_get_posts', 'pre_get_author_posts' );
function count_author_posts( $counts, $type = 'post', $perm = '' ) {
  if ( !is_admin() || current_user_can('administrator') ) {
    return $counts;
  }
  global $wpdb;
  if ( ! post_type_exists( $type ) )
    return new stdClass;
  $cache_key = _count_posts_cache_key( $type, $perm ) . '_author'; // 2
  $counts = wp_cache_get( $cache_key, 'counts' );
  if ( false !== $counts ) {
    return $counts;
  }
  $query = "SELECT post_status, COUNT( * ) AS num_posts FROM {$wpdb->posts} WHERE post_type = %s";
  $query .= $wpdb->prepare( " AND ( post_author = %d )", get_current_user_id() );
  $query .= ' GROUP BY post_status';

  $results = (array) $wpdb->get_results( $wpdb->prepare( $query, $type ), ARRAY_A );
  $counts = array_fill_keys( get_post_stati(), 0 );
  foreach ( $results as $row ) {
    $counts[ $row['post_status'] ] = $row['num_posts'];
  }
  $counts = (object) $counts;
  wp_cache_set( $cache_key, $counts, 'counts' );
  return $counts;
}
add_filter( 'wp_count_posts', 'count_author_posts', 10, 3 );

// 寄稿者の画像投稿
if ( current_user_can('contributor') && !current_user_can('upload_files') ){
    add_action('admin_init', 'allow_contributor_uploads');
}

function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}

// 自分の投稿した写真のみ
function display_only_self_uploaded_medias( $query ) {
    if ( $user = wp_get_current_user() ) {
        $query['author'] = $user->ID;
    }
    return $query;
}
add_action( 'ajax_query_attachments_args', 'display_only_self_uploaded_medias' );


function my_hook( $post_id, $post, $update ) {
  $user = wp_get_current_user(); //ログインしているユーザーID情報の取得
  $w_position = get_field('oo_user_posi1', 'user_' . $user->id ); // 肩書き
  $w_name = $user->display_name;
  $w_em = get_field('oo_user_en', 'user_' . $user->id ); // ローマ字
  $w_face = get_field('oo_user_img', 'user_' . $user->id ); // プロフィール画像URL
  $w_explain = $user->description;
  $w_url = esc_url(home_url('/?author='.$user->id));
  $w_line = get_field('oo_user_line', 'user_' . $user->id ); // プロフィール画像URL
  $w_fb = get_field('oo_user_fb', 'user_' . $user->id ); // プロフィール画像URL
  $w_twitter = get_field('oo_user_tw', 'user_' . $user->id ); // プロフィール画像URL
  $w_insta = get_field('oo_user_inst', 'user_' . $user->id ); // プロフィール画像URL

  if($update == false) {// 新規投稿のみ
    update_post_meta( $post_id, 'writter-position', $w_position );
    update_post_meta( $post_id, 'writter-name', $w_name );
    update_post_meta( $post_id, 'writter-em', $w_em );
    update_post_meta( $post_id, 'writter-face', $w_face );
    update_post_meta( $post_id, 'writter-explain', $w_explain );
    update_post_meta( $post_id, 'writter-url', $w_url );
    update_post_meta( $post_id, 'writter-line', $w_line );
    update_post_meta( $post_id, 'writter-fb', $w_fb );
    update_post_meta( $post_id, 'writter-tw', $w_twitter );
    update_post_meta( $post_id, 'writter-insta', $w_insta );
  }
}
add_action( 'save_post', 'my_hook', 10, 3 );



// 検索フォームごとに search.php を変える 202402
add_action('template_include', 'my_search_template');
function my_search_template($template)
{
    $type = filter_input(INPUT_GET, 'search_type');
    $new_template = '';
    if ($type) {
        switch ($type) {
            case 'map':
                $new_template = STYLESHEETPATH . '/search-map.php';
                break;
            // case 'blog':
            //     $new_template = STYLESHEETPATH . '/search-blog.php';
            //     break;
            default:
                $new_template = '';
        }
    }
    if ($new_template) {
        if (file_exists($new_template)) {
            return $new_template;
        }
    }
    return $template;
}

?>
