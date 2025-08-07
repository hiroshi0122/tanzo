<?php

/**
 * Home template file
 *
 * @link https:/xxxxx/
 *
 * @package KURAFT
 * @since 2024.10.17
 * @version 1.0
 *
 * Template Name: ALL POST（投稿一覧）
 **/

// 現在のページ番号を取得
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

/* 投稿記事の取得 */
$args = array(
    'post_type' => 'post',
    'orderby' => 'date',  // ソート条件を日付
    'posts_per_page' => 12,  // 1ページ内の記事数
    'paged' => $paged,
);
$posts = new WP_Query($args);



get_header();?>

<section class="all-post first-sec">
    <div class="kuraft-container">
        <div class="row">
            <div class="col-auto">
                <div class="main-title-template">
                    <h2 class="d-flex align-items-center">投稿<span class="sub-title"> 一覧<span></h2>
                    <span>All Post</span>
                </div>
            </div>
            <div class="col">
                <div class="news-contents row">
                    <!-- 投稿取得 -->
                    <?php if ($posts->have_posts()) :?>
                        <?php while($posts->have_posts()) : $posts->the_post(); ?>
                            <div class="col-xl-6">
                                <div class="news-box">
                                    <div class="row align-items-center">
                                        <div class="image-area col-4 col-md-3 col-lg-2 col-xl-3">
                                            <a class="parmalink" href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail("medium"); ?>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="text-area col-8 col-md-9 col-lg-10 col-xl-9">
                                            <span class="date"><?php echo get_the_date('Y.n.j'); ?></span>
                                            <h5 class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></h5>
                                            <p class="excerpt"><?php echo custom_trim_excerpt(get_the_excerpt(), wp_is_mobile() ? 30 : 50); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : //記事が存在しない場合 ?>
                        <p>投稿記事がありません。</p>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php //** PAGINATION ****************************//?>
<section class="pagination pt-0">
	<div class="container">
		<div class="pagenation-nav">
			<?php
			echo paginate_links(array(
                'total' => $posts->max_num_pages, // 総ページ数を設定
                'current' => $paged,                 // 現在のページ番号
                'format' => 'page/%#%/',             // ページ番号のURLフォーマット
				'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
				'next_text' => '<i class="fa-solid fa-angle-right"></i>',
			));
			?>
		</div>
	</div>
</section>



<?php get_footer(); ?>