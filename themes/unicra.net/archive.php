<?php

/**
 * Home template file
 *
 * @link https:/xxxxx/{id}
 *
 * @package kuraft
 * @since 2024.9.11
 * @version 1.0
 *
 * Template Name: ARCHIVE
 **/


// 現在表示しているカスタムポストタイプを取得
$post_type = get_post_type();
//カテゴリー一覧用のカテゴリー取得
$categories = get_categories();
//カテゴリーアーカイブページでカテゴリーIDを取得
$cat_id = get_query_var('cat');
//カテゴリーアーカイブページでカテゴリースラッグを取得
$cat_slug = get_query_var('category_name');
//先ほど取得したカテゴリーIDをget_category()に渡す
$cat = get_category($cat_id);

get_header(); ?>


<section class="archive first-sec">
	<div class="kuraft-container">
		<div class="row">
			<div class="col-auto">
				<div class="main-title-template">
					<?php if ($post_type) :
						// カスタムポストタイプの名称を取得
						$post_type_obj = get_post_type_object($post_type);
					?>
						<h2 class="d-flex align-items-center"><?php echo esc_html($post_type_obj->labels->name) ?><span class="sub-title"> 一覧<span></h2>
						<span>Archive</span>
					<?php endif; ?>
				</div>
			</div>
			<div class="col">
				<?php
				// 現在のURLのパス部分を取得
				$request_uri = $_SERVER['REQUEST_URI'];

				// `/recipe` または `/interview` の場合に "Coming Soon" を表示
				if (preg_match('#^/recipe(/|$)#', $request_uri) || preg_match('#^/interview(/|$)#', $request_uri)) : ?>
					<div class="coming-soon-msg">
						<h2>Coming Soon..</h2>
						<p>総意制作中です。今しばらくお待ちください。</p>
					</div>
				<?php else:?>
					
					<div class="post-contents row">
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<div class="medium-box col-lg-6 col-xl-6 col-xxl-4">
									<div class="d-flex h-100">
										<div class="text-area col-md-auto">
											<span class="date"><?php echo get_the_date('Y.n.j'); ?></span>
											<a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</div>
										<div class="image-area col">
											<a class="parmalink" href="<?php the_permalink(); ?>">
												<?php if (has_post_thumbnail()) : ?>
													<?php the_post_thumbnail('small'); ?>
												<?php endif; ?>
											</a>
											<div class="tags row">
												<?php display_post_tags(get_the_ID()); ?>
											</div>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>

<?php //** PAGINATION ****************************//
?>
<section class="pagination pt-0">
	<div class="container">


		<div class="pagenation-nav">
			<?php //ページリスト表示処理
			global $wp_rewrite;
			$paginate_base = get_pagenum_link(1);

			if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
				$paginate_format = '';
				$paginate_base = add_query_arg('paged', '%#%');
			} else {
				$paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
					user_trailingslashit('page/%#%/', 'paged');
				$paginate_base .= '%_%';
			}

			echo paginate_links(array(
				'base' => $paginate_base,
				'format' => $paginate_format,
				'mid_size' => 2,
				'end_size' => 1,
				'current' => ($paged ? $paged : 1),
				'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
				'next_text' => '<i class="fa-solid fa-angle-right"></i>',
			));
			?>
		</div>
	</div>
</section>

<?php get_footer();
