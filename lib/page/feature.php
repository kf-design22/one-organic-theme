<?php get_header(); ?>

<div class="page-header">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-sp.png'); ?>" alt="">
</div>
<div class="page-header-pc">
  <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/page-header-pc.png'); ?>" alt="">
</div>

<?php get_template_part('lib/parts/bread') ?>

  <main>

    <div class="page-body">
      <div class="container">

        <div class="heading-a">
          <h2>
            特集企画一覧
          </h2>
          <p>Feature</p>

        </div>

        <div class="feature-wrap">

          <div class="feature-item fadein fade-in-up">
            <figure>
              <img src="<?php echo esc_url(get_template_directory_uri().'/lib/images/organiclife-img.jpg'); ?>" alt="OrganicLife.">
            </figure>
            <div class="info">
              <h3>OrganicLife.</h3>
              <div class="text">
                <p>オーガニックは食材だけではなく、私たちの生活すべてに関係しています。衣食住から始まり、この地球や宇宙に至るまで、たくさんのオーガニックを知ることで、私たちの社会も変わっていきます。今回の特集では、オーガニックの実践者からそのエッセンスを学んでいきます。新しい世界を知るための旅をお楽しみください。</p>
              </div>
              <p class="btn"><a href="<?php echo esc_url(home_url('/features/organincllife/')); ?>">もっと見る</a></p>
            </div>
          </div>

          <!-- <div class="feature-item">
            <figure>
              <img src="https://picsum.photos/1120/400/?random">
            </figure>
            <div class="info">
              <h3>あなたの起こすワンアクションが、オーガニックな世界を創っていく。</h3>
              <div class="text">
                <p>テキストいろはにほへとちりぬるを、わかよたれそつねならむ。うゐのおくやまけふこえて、あさきゆめみしゑひもせすん。色は匂へど散りぬるを、我が世誰そ常ならむ。強調テキスト1有為の奥山今日越えて、浅き夢見じ酔ひもせず。テキストいろはにほへとちりぬるを、わかよたれそつねならむ。うゐのおくやまけふこえて、あさきゆめみしゑひもせすん。色は匂へど散りぬるを、我が世誰そ常ならむ。強調テキスト2有為の奥山今日越えて、浅き夢見じ酔ひもせず。テキストいろはにほへとちりぬるを、わかよたれそつねならむ。うゐのおくやまけふこえて、あさきゆめみしゑひもせすん。色は匂へど散りぬるを、我が世誰そ常ならむ。有為の奥山今日越えて、浅き夢見じ酔ひもせず。テキストいろはにほへとちりぬるを、わかよたれそつねならむ。うゐのおくやまけふこえて、あさきゆめみしゑひもせすん。色は匂へど散りぬるを、我が世誰そ常ならむ。有為の奥山今日越えて、浅き夢見じ酔ひもせず。</p>
              </div>
              <p class="btn"><a href="">もっと見る</a></p>
            </div>
          </div> -->

        </div>
        <!-- /feature-wrap -->

      </div>
    </div>
    <!-- /page-body -->

  </main>

<?php get_footer(); ?>