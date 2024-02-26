		<div class="bread">

			<ol itemscope itemtype="http://schema.org/BreadcrumbList" class="container">
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemprop="item" href="<?php echo home_url(); ?>">
						<span itemprop="name">ホーム</span>
					</a>
					<meta itemprop="position" content="1">
				</li>

				<?php if(is_search()): /* 〇serch result〇 */ ?>

					<li itemscope itemtype="http://schema.org/ListItem"><em itemprop="name">「<?php the_search_query(); ?>」で検索した結果</em><meta itemprop="position" content="2"></li>

				<?php elseif(is_tag()): /* 〇tag archive〇 */?>

					<li itemscope itemtype="http://schema.org/ListItem"><em itemprop="name">タグ : <?php single_tag_title(); ?></em><meta itemprop="position" content="2"></li>

				<?php elseif(is_404()): /* 〇404〇 */?>

					<li itemscope itemtype="http://schema.org/ListItem"><em itemprop="name">ページが見つかりませんでした</em><meta itemprop="position" content="2"></li>

				<?php elseif(is_single()): /* 〇single〇 */ ?>
					<?php	$categories = get_the_category($post->ID); /* カテゴリーを取得 */
						$cat = $categories[0]; /* 配列から最初のカテゴリーを取得 */
						if($cat -> parent != 0): /* 親カテゴリーの有無 */
							$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' )); /* 祖先カテゴリーを取得 */
							foreach($ancestors as $ancestor): ?>

						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?php echo get_category_link($ancestor); ?>">
								<span itemprop="name"><?php echo get_cat_name($ancestor); ?></span>
							</a>
							<meta itemprop="position" content="2">
						</li>

					<?php endforeach; endif; ?>

					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo get_category_link($cat -> cat_ID); ?>">
							<span itemprop="name"><?php echo $cat-> cat_name; ?></span>
						</a>
						<meta itemprop="position" content="3">
					</li>

					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo get_the_permalink(); ?>">
							<span itemprop="name"><?php the_title(); ?>	</span>
						</a>
						<meta itemprop="position" content="4">
					</li>

				<?php elseif(is_category()): /* 〇categroy〇 */ ?>
					<?php $cat = get_queried_object(); /* オブジェクトを取得 */ ?>
					<?php if($cat -> parent != 0): /* 親カテゴリーの有無 */?>
					<?php $ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' )); /* 祖先カテゴリーの取得 */ ?>
					<?php foreach($ancestors as $ancestor): /* 親カテゴリーの数だけ繰り返し処理 */ ?>

						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?php echo get_category_link($ancestor); ?>">
									<span itemprop="name"><?php echo get_cat_name($ancestor); ?></span>
							</a>
							<meta itemprop="position" content="2">
						</li>

					<?php endforeach; ?>
					<?php endif; ?>

					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo get_the_permalink(); ?>">
								<span itemprop="name"><?php echo $cat -> cat_name; ?></span>
						</a>
						<meta itemprop="position" content="3">
					</li>

				<?php elseif(is_date()): /* 日付アーカイブ */?>

					<?php if(is_day()): /* 日別アーカイブ */?>

						<li itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo get_year_link(get_query_var('year')); ?>"><?php echo get_query_var('year'); ?>年</a><meta itemprop="position" content="2"></li>
						<li itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="<?php echo get_month_link(get_query_var('year'), get_query_var('monthnum')); ?>"><?php echo get_query_var('monthnum'); ?>月</a><meta itemprop="position" content="3"></li>
						<li itemscope itemtype="http://schema.org/ListItem"><em itemprop="name"><?php echo get_query_var('day'); ?>日</em><meta itemprop="position" content="4"></li>

					<?php elseif(is_month()): /* 月別アーカイブ */?>

						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?php echo get_year_link(get_query_var('year')); ?>">
								<span itemprop="name"><?php echo get_query_var('year'); ?>年</span>
							</a>
							<meta itemprop="position" content="2">
						</li>

						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?php echo get_month_link(get_query_var('year'), get_query_var('monthnum')); ?>">
									<span itemprop="name"><?php echo get_query_var('monthnum'); ?>月</span>
							</a>
							<meta itemprop="position" content="3">
						</li>

					<?php elseif(is_year()): /* 年別アーカイブ */ ?>

						<li itemscope itemtype="http://schema.org/ListItem"><em itemprop="name"><?php echo get_query_var('year'); ?>年</em><meta itemprop="position" content="2"></li>

					<?php endif; ?>

				<?php elseif(is_page()): /* 固定ページ */ ?>

					<?php if($post -> post_parent != 0 ): /* 親ページの有無 */ ?>
					<?php $ancestors = array_reverse( $post-> ancestors ); /* 祖先ページの ID を取得 */ ?>
					<?php foreach($ancestors as $ancestor): /* 祖先ページの数だけ繰り返し処理 */ ?>

						<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<a itemprop="item" href="<?php echo get_permalink($ancestor); ?>">
								<span itemprop="name"><?php echo get_the_title($ancestor); ?></span>
							</a>
							<meta itemprop="position" content="2">
						</li>

					<?php endforeach; ?>
					<?php endif; ?>

					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo get_the_permalink(); ?>">
							<span itemprop="name"><?php the_title(); ?></span>
						</a>
						<meta itemprop="position" content="3">
					</li>

				<?php else: /* その他 */ ?>

					<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemprop="item" href="<?php echo get_the_permalink(); ?>">
							<span itemprop="name">	<?php the_title(); ?>	</span>
						</a>
						<meta itemprop="position" content="2">
					</li>
				<?php endif; ?>

			</ol>

		</div>
