<div class="staff-list">

  <!-- みこと -->
  <div class="staff-box fadein fade-in-right">
    <a href="<?php echo get_bloginfo("url") . '/?author=5' ?>">
      <figure>
        <img src="<?php the_field('oo_user_img', 'user_5'); ?>" alt="<?php $user_info = get_userdata(5); echo $user_info->display_name; ?>">
      </figure>
      <div class="name">
        <p class="position"><?php the_field('oo_user_posi1', 'user_5'); ?></p>
        <h3>
          <?php
            echo $user_info->display_name;
          ?>
        </h3>
      </div>
    </a>
  </div>

  <!-- 井上 -->
  <div class="staff-box fadein fade-in-up">
    <a href="<?php echo get_bloginfo("url") . '/?author=6' ?>">
      <figure>
        <img src="<?php the_field('oo_user_img', 'user_6'); ?>" alt="<?php $user_info = get_userdata(6); echo $user_info->display_name; ?>">
      </figure>
      <div class="name">
        <p class="position"><?php the_field('oo_user_posi1', 'user_6'); ?></p>
        <h3>
          <?php
            $user_info = get_userdata(6);
            echo $user_info->display_name;
          ?>
        </h3>
      </div>
    </a>
  </div>

  <!-- まっこ 8 -->
  <div class="staff-box fadein fade-in-up">
    <a href="<?php echo get_bloginfo("url") . '/?author=8' ?>">
      <figure>
        <img src="<?php the_field('oo_user_img', 'user_8'); ?>" alt="<?php $user_info = get_userdata(8); echo $user_info->display_name; ?>">
      </figure>
      <div class="name">
        <p class="position"><?php the_field('oo_user_posi1', 'user_8'); ?></p>
        <h3>
          <?php
            $user_info = get_userdata(8);
            echo $user_info->display_name;
          ?>
        </h3>
      </div>
    </a>
  </div>

  <!-- 聖章 -->
  <div class="staff-box fadein fade-in-left">
    <a href="<?php echo get_bloginfo("url") . '/?author=7' ?>">
      <figure>
        <img src="<?php the_field('oo_user_img', 'user_7'); ?>" alt="<?php $user_info = get_userdata(7); echo $user_info->display_name; ?>">
        <!-- <img src="https://picsum.photos/640/640/?random"> -->
      </figure>
      <div class="name">
        <p class="position"><?php the_field('oo_user_posi1', 'user_7'); ?></p>
        <h3>
          <?php
            echo $user_info->display_name;
          ?>
        </h3>
      </div>
    </a>
  </div>

</div>
<!-- /staff-list -->