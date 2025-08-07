<?php

/**
 * Information single template file
 *
 * @link https:/xxxxx/{id}
 *
 * @package KURAFT
 * @since 2024
 * @version 1.0
 *
 *
 **/

// 投稿全てのカテゴリーを取得
$all_categories = get_categories();
$category_ID = array();

// 現在の投稿タイプを取得
$current_post_type = get_post_type($post->ID);

// カスタム投稿タイプオブジェクトを取得
$post_type_object = get_post_type_object($current_post_type);

// 「投稿」かどうかを確認し、URLを設定
if ($current_post_type === 'post') {
    // 投稿（post）の場合、/all-postにリンク
    $archive_url = home_url('/all-post');
} else {
    // カスタム投稿タイプの場合、アーカイブURLを取得
    $archive_url = get_post_type_archive_link($current_post_type);
}
// カスタム投稿タイプの名称を取得
$post_type_name = $post_type_object->labels->singular_name;

// 関連記事の投稿取得
$args = array(
    'post_type' => $current_post_type,
    // 今読んでいる記事を除く
    'post__not_in' => array($post->ID),
    'posts_per_page' => 10,
    'category__in' => $category_ID,
    'orderby' => 'DESC',
);
$query = new WP_Query($args);

get_header();
?>

<article>
    <section class="single-sec first-sec">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();
                $author_id = get_the_author_meta('ID');
                $author_position = get_the_author_meta('position', $author_id);
            ?>
                <div class="kuraft-container">
                <?php //output_breadcrumb(); ?>
                    <div class="row">

                        <?php //** MAIN ************************************/ ?>
                        <main class="col-xl-8">
                            <div class="day-category-title">
                                <div class="day col-auto"><span><?php the_time('Y.n.j'); ?></span></div>
                                <div class="post-title col">
                                    <?php the_category(); ?>
                                    <h1><?php the_title(); ?></h1>
                                </div>
                            </div>
                            <div class="thumbnail">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url('', 'full')); ?>">
                            </div>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                            <div class="post-author">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 d-flex d-lg-block align-items-center">
                                        <div class="author-image">
                                            <?php echo get_avatar( get_the_author_meta('ID')); ?>
                                        </div>
                                        <div class="name-position">
                                            <p class="position d-lg-none"><?php echo esc_html($author_position);?></p>
                                            <h3 class="author d-lg-none"><?php the_author(); ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 pt-3 p-lg-0">
                                        <p class="position d-none d-lg-block"><?php echo esc_html($author_position);?></p>
                                        <h3 class="author d-none d-lg-block"><?php the_author(); ?></h3>
                                        <p class="discription"><?php the_author_meta('description'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </main>

                        <?php //** ASIDE ************************************/ ?>
                        <aside class="col-xl-4">
                            <div class="related-post-area">
                                <div class="border-title-template">
                                    <h3>関連記事</h3>
                                </div>
                                <?php if ($query->have_posts()) : ?>
                                    <?php foreach ($query->posts as $post) :
                                        if (get_the_post_thumbnail_url($post->ID)) {
                                            $img_url = get_the_post_thumbnail_url($post->ID);
                                        } else {
                                            $img_url = get_bloginfo('template_url') . '/assets/img/common/no-image.png'; // デフォルト画像
                                        } ?>

                                        <div class="related-content">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-3">
                                                    <a class="image-area" href="<?php the_permalink(); ?>">
                                                        <img loading="lazy" src="<?php echo esc_url(get_the_post_thumbnail_url('','small')); ?>">
                                                    </a>
                                                </div>
                                                <div class="col-9">
                                                    <div class="text-area mb-0">
                                                        <div class="date-category">
                                                            <div class="date me-3">
                                                                <span><?php echo get_post_time('Y.n.j'); ?></span>
                                                            </div>
                                                            <?php the_category(); ?>
                                                        </div>
                                                        <h5 class="title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>記事はまだありません。</p>
                                <?php endif; wp_reset_postdata(); ?>
                                <div class="btn-area">
                                    <a class="btn-radius" href="<?php echo esc_url($archive_url); ?>"><?php echo esc_html($post_type_name); ?>の一覧を見る</a>
                                </div>
                            </div>

                            <div class="category-list-area">
                                <div class="border-title-template">
                                    <h3>カテゴリー</h3>
                                </div>
                                <ul class="post-categories">
                                    <?php wp_list_categories('title_li='); ?>
                                </ul>
                            </div>

                        </aside>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>


    

</article>

<?php get_footer(); ?>