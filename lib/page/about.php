<?php get_header(); ?>

  <main>

    <div class="main-visual">
      <!-- <p class="catchcopy">たった一つの<br>
        行動が<br>
        未来の地球の<br>
        種になる。
      </p> -->

    </div>

    <nav class="home-nav container">
      <ul>
        <li><a href="#home-concept">コンセプト</a></li>
        <li><a href="#home-overview">イベント概要</a></li>
      </ul>
      <ul>
        <li><a href="#home-gallery">コンセプト写真</a></li>
        <li><a href="#home-join">オンライン参加</a></li>
        <li><a href="#home-sns">公式SNS</a></li>
        <!-- <li><a href="#home-sponsor">スポンサー</a></li> -->
      </ul>
    </nav>

    <div class="home-concept" id="home-concept">
      <div class="container">
        <p class="conceptimg-s"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/imgS.png'); ?>" alt="コンセプト画像"></p>
        <p class="conceptimg-m"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/imgM.png'); ?>" alt="コンセプト画像"></p>
        <p class="conceptimg-l"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/imgL.png'); ?>" alt="コンセプト画像"></p>

        <div class="concept-box">
          <h2 class="fadein fade-in-left">たった一つの行動が<br>
            未来の地球の<em class="color-or">種</em>になる。
            <span>ワ<em class="color-bl">ン</em><em class="color-or">オ</em>ー<em class="color-bl">ガ</em><em class="color-or">ニ</em>ッ<em class="color-bl">ク</em><em class="color-or">デ</em>イ</span>
          </h2>
          <div class="concept-text fadein fade-in-right">
            <p>この度、10月29日を「ワンオーガニックデイ」と制定し<br>制定記念式典とオーガニックマルシェを開催する事になりました。</p>
            <p>私たちの小さな行動、ワンオーガニックアクション。<br>そのひとつひとつが、未来の地球の種となります。</p>
            <p>難しいことではなく、今日できることを１つ<br>はじめてみる、かさねてみる、ひろげてみる。</p>
            <p>私たちが力を合わせて、今立ち上がれば<br>地球は、その美しさを取り戻していきます。</p>
            <p>10月29日がキッカケとなり<br>この世界にオーガニックの輪を広げていきましょう。</p>
          </div>
        </div>
        <!-- /concept-box -->

        <div class="overview-box fadein fade-in-up" id="home-overview">
          <div class="movie">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/_4HmBz9sx7s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="info">
            <h2>ワンオーガニックデイ2022</h2>

            <div class="date">
              <dl>
                <dt>開催日</dt>
                <dd>2022/10/29（土）9:00〜12:00</dd>
              </dl>
              <dl>
                <dt>場所</dt>
                <dd>岐阜県瑞穂市森555<br>瑞穂こどもセンター内</dd>
              </dl>
              <!-- <dl>
                <dt>開催日</dt>
                <dd>2022/10/29（月）10:00〜12:00</dd>
              </dl>
              <dl>
                <dt>開催日</dt>
                <dd>2022/10/29（月）10:00〜12:00</dd>
              </dl> -->
            </div>
            <!-- /date -->

            <p class="btn-sp"><a href="lib/pdf/one_organicday2022.pdf" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/btn-ov-sp.png'); ?>" alt="詳細はこちら"></a></p>

          </div>
          <!-- /info -->

          <p class="btn-pc"><a href="lib/pdf/one_organicday2022.pdf" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/btn-ov-pc.png'); ?>" alt="詳細はこちら"></a></p>

          <p class="ov-leaf"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/overview-leaf.png'); ?>" alt="リーフの装飾"></p>

        </div>
        <!-- /overview-box -->

      </div>
    </div>
    <!-- /home-concept -->

    <!-- <div class="event-overview">
      <div class="container">

      </div>
    </div> -->
    <!-- /event-overview -->

    <div class="home-gallery" id="home-gallery">
      <div class="container-fit">
        <div class="heading-a">
          <h2>コンセプト写真</h2>
          <p>Concept Photo</p>
        </div>

        <div class="photo">
          <ul class="photowrap-1">
            <li class="fadein fade-in-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/1_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-up"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/2_img.jpg'); ?>" alt="イベントの様子"></li>
          </ul>
          <ul class="photowrap-2">
            <li class="fadein fade-in-right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/3_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/4_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-up"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/5_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/6_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/7_img.jpg'); ?>" alt="イベントの様子"></li>
          </ul>
          <ul class="photowrap-3">
            <li class="fadein fade-in-up"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/8_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/9_img.jpg'); ?>" alt="イベントの様子"></li>
            <li class="fadein fade-in-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/10_img.jpg'); ?>" alt="イベントの様子"></li>
          </ul>
        </div>

      </div>
    </div>
    <!-- /home-gallery -->

    <div class="one-more" id="home-join">
      <div class="container">
        <h2 class="heading-b"><span>もう一つの</span><br>ワンオーガニックデイ</h2>
        <p>ワンオーガニックデイは、<br>
          イベント以外でもSNSを使って、プロジェクトに参加ができます！<br>
          あなたの⼩さな⾏動が、この世界を変えていく種になっていきます。</p>
      </div>
      <p class="vegi-left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/vegi-cucumber.png'); ?>" alt="野菜の装飾"></p>
      <p class="vegi-right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/vegi-eggplant.png'); ?>" alt="野菜の装飾"></p>
    </div>
    <!-- /one-more -->

    <div class="home-action">
      <div class="container">
        <div class="heading-a">
          <h2>
            ワ<em class="color-bl">ン</em><em class="color-or">オ</em>ー<em class="color-bl">ガ</em><em
              class="color-or">ニ</em>ッ<em class="color-bl">ク</em><em class="color-or">ア</em>ク<em
              class="color-bl">シ</em><em class="color-or">ョ</em>ン
          </h2>
          <p>One Organic Action</p>
        </div>

        <div class="action-sum fadein fade-in-up">
          <p class="intro">あなたのオーガニックアクションをSNSで共有してみよう。<br>
            その⼀つひとつが、オーガニックな世界を創り上げる種になる。<br>
            今⽇も１つ、⼩さなオーガニックから始めよう！</p>

          <div class="sum-display">
            <span class="startday">2022/10/1〜</span>
            <span id="number"></span>
            <span>アクション!!</span>
          </div>

          <p class="outro">※これまでに集まったワンオーガニックアクションの総数を表⽰しています。</p>
          <div class="leaf-deco _left"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/action-leaf-left.png'); ?>" alt="リーフの装飾"></div>
          <div class="leaf-deco _right"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/action-leaf-right.png'); ?>" alt="リーフの装飾"></div>
          <div class="vegi-deco"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/action-vegi.png'); ?>" alt="リーフの装飾"></div>
        </div>
        <!-- /action-sum -->

        <div class="action-join">
          <div class="bee-deco _bee-02"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/bee-02.png'); ?>" alt="ハチの装飾"></div>
          <div class="bee-deco _bee-03"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/bee-03.png'); ?>" alt="ハチの装飾"></div>

          <h3 class="heading-b">参加方法</h3>

          <div class="join-wrap">
            <div class="box fadein fade-in-left">
              <span class="number-img"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/action-flow-1.png'); ?>" alt="参加方法1"></span>
              <p>オーガニックに関するアイディアを考えたり、⾒つけたり実際に作ったり、試したりしてみる。</p>
            </div>
            <div class="box fadein fade-in-up">
              <span class="number-img"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/action-flow-2.png'); ?>" alt="参加方法2"></span>
              <p>インスタグラムで<span>#ワンオーガニックデイ</span>を付けて投稿してみる。</p>
            </div>
            <div class="box fadein fade-in-right">
              <span class="number-img"><img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/action-flow-3.png'); ?>" alt="参加方法3"></span>
              <p>みんなの投稿もチェックして、気に⼊ったものは⾃分でやってみたり、お友達に共有してみよう！</p>
            </div>
          </div>
          <!-- /join-wrap -->
        </div>
        <!-- /action-join -->

      </div>
    </div>
    <!-- /home-action -->

    <?php get_template_part('lib/parts/sns-list'); ?>

  </main>

  <aside class="footer-sponser" id="home-sponsor">
    <!-- <div class="container">
      <h2>スポンサー</h2>

      <ul class="sponser-list">
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
        <li>Logo</li>
      </ul>
    </div> -->
  </aside>

  <?php
    $url = 'https://graph.facebook.com/v15.0/18316973965045053/top_media?fields=id%2Cmedia_type%2Ccomments_count%2Clike_count%2Cmedia_url%2Cpermalink&user_id=17841403113142677&limit=1000&access_token=EAAHBAFPzuMMBANofKc2ZAx8qGTvlF9x41qAo2JxYJEkzIm94Y1TZCzzWWUv8NF2zxVTIbZAmIj611ZAt19GTZCM856eGBKOiNgrIkDeazHGW6dVQZChT2ndoqy7AzNKZB59ZCgtQn1kVkoDdKPjxz9q9am1JjACqzaKPrf7y8ZAF3JnD7ZChdHWgCfQ4T2WWaR9j4ZD';

    $json_data = file_get_contents($url,true);

  ?>

  <script>
    var data = <?php echo $json_data; ?>;
    var data_cnt = Object.keys(data['data']).length

    let element = document.getElementById("number");

    // console.log(Object.keys(data).length); //4
    console.log(data_cnt);
    element.textContent = data_cnt;

  </script>



<?php get_footer(); ?>