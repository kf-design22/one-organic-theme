<?php
if ( is_singular() ){//投稿・固定ページの場合
  $head_custom = get_post_meta($post->ID, 'single-custom-css', true);
  if ( $head_custom ) {
    echo '<style>' . $head_custom . '</style>';
  }
}
?>