<?php

/**
 * Home template file
 *
 * @link TANZO
 *
 * @package TANZO
 * @since 2025.8.11
 * @version 1.0
 *
 * Template Name: HOME
 **/


/* NEWSの投稿取得 */
$args = array(
    'post_type' => 'post',  // すべての記事
    // 'category_name' => 'news', //カテゴリー
    'orderby' => 'date',  // ソート条件を日付
    'posts_per_page' => 3,  // 1ページ内の記事数
    'paged' => $paged,
);
$posts = new WP_Query($args);


get_header();
?>

<?php // FIRST SECTION // *********************************************************** // 
?>
<section class="first-sec" id="first-view-sec">
    <div class="container-fluid">
        <div class="movie-area">
            <iframe
                src="https://www.youtube.com/embed/pzHDbVPkHv0?autoplay=1&mute=1&loop=1&playlist=pzHDbVPkHv0&controls=0&modestbranding=1&rel=0"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
            </iframe>
            <img class="catch" src="<?php bloginfo('template_url'); ?>/assets/images/home/kc_catch.webp" alt="いつもの料理をもっと美味しく">
        </div>
    </div>
</section>


<?php // DAILY LIFE SECTION // *********************************************************** // 
?>
<section class="daily-life-sec" id="daily-life">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-side">
                    <div class="main-title blur">
                        <span>Life with TANZO</span>
                        <h2 class="daily-title">TANZOのある暮らし</h2>
                    </div>

                    <div class="image-side blur d-md-none">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/home/life_image.webp" alt="TANZOのある暮らし">
                    </div>

                    <p class="description">エアースタンプハンマーが生み出す2,000トンの力で、鉄は生まれ変わります。長年培った独自の鍛造技術が、調理する食材一つひとつの隠された旨味を解き放ち、あなたの食卓に感動をお届けします。</p>

                    <ul class="second-page-menu row">
                        <li class="col-auto">
                            <span>01.</span>
                            <h5>手間なし・かんたん</h5>
                            <div class="text-end">
                                <a href="/simple" class="btn-more">More >>></a>
                            </div>
                        </li>
                        <li class="col-auto">
                            <span>02.</span>
                            <h5>TANZOのこだわり</h5>
                            <div class="text-end">
                                <a href="/quality" class="btn-more">More >>></a>
                            </div>
                        </li>
                        <li class="col-auto">
                            <span>03.</span>
                            <h5>調理からテーブルへ</h5>
                            <div class="text-end">
                                <a href="/to-table" class="btn-more">More >>></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 p-0 d-none d-md-block">
                <div class="image-side blur">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/home/life_image.webp" alt="TANZOのある暮らし">
                </div>
            </div>
        </div>
    </div>
</section>


<?php // STORY SECTION // *********************************************************** // 
?>
<section class="story-sec">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6 p-0 d-none d-md-block">
                <div class="image-side blur">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/home/story_image.webp" alt="開発の物語">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-side">
                    <div class="main-title blur">
                        <span>The Making of TANZO</span>
                        <h2 class="daily-title">開発の物語</h2>
                        <h3 class="sub-catch">ヤマコーがつくる<br>「美味しい道具」</h3>
                    </div>
                    <div class="image-side blur d-md-none">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/home/story_image.webp" alt="開発の物語">
                    </div>
                    <p class="description">1,250℃の炎、2,000トンの圧力、そして熟練「ハンマーマン」の勘。鉄はただの素材から、料理を変える道具へと姿を変えます。その誕生の物語へ。</p>
                    <div class="btn-area">
                        <a class="btn-view-more" href="/story">VIEW MORE >>></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // LINUP SECTION // *********************************************************** // 
?>
<section class="lineup-sec" id="lineup">
    <div class="container">
        <div class="main-title center blur">
            <span>PRODUCT</span>
            <h2 class="daily-title">商品ラインアップ</h2>
        </div>
        <div class="row fadeInUp-stagger">
            <?php
            $args = [
                'post_type'      => 'products',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order date',
                'order'          => 'DESK',
            ];
            $q = new WP_Query($args);
            $i = 1;
            ?>

            <?php if ($q->have_posts()) : ?>
                <?php while ($q->have_posts()) : $q->the_post(); ?>
                    <?php
                    $num     = str_pad($i, 2, '0', STR_PAD_LEFT);
                    $price   = get_post_meta(get_the_ID(), 'price', true);
                    $title   = get_the_title();
                    $link    = get_field('ec_url');
                    $excerpt = get_the_excerpt();
                    ?>

                    <?php if ($i === 5): // ★ 5番目の前で見出しを挿入 
                    ?>
                        <div class="border-title center blur">
                            <h3 class="products-heading">TANZO×SKYWOOD<br>吉野杉ラウンドプレート</h3>
                        </div>
                        <p class="text-center">TANZO製品専用の木製プレートを<br class="d-sm-none">ご用意いたしました。<br>サイズはS・M・Lと、使用するシーンにあわせて３種類からお選びいただけます</p>
                    <?php endif; ?>

                    <div class="col-md-6">
                        <div class="product-content stagger">
                            <span class="number"><?php echo esc_html($num); ?>.</span>

                            <div class="product-image">
                                <a href="<?php echo esc_url($link); ?>" rel="noopener noreferrer" target="_blank">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', [
                                            'alt' => esc_attr($title),
                                            'loading' => 'lazy',
                                            'decoding' => 'async'
                                        ]); ?>
                                    <?php else: ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/noimage.webp'); ?>"
                                            alt="<?php echo esc_attr($title); ?>" loading="lazy" decoding="async">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <div class="product-info">
                                <h3><?php echo esc_html($title); ?></h3>
                                <a class="title-link" href="<?php echo esc_url($link); ?>" rel="noopener noreferrer" target="_blank">
                                    <?php echo wp_kses_post(wpautop($excerpt)); ?>
                                </a>
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <div class="price">
                                        <span class="me-1">¥</span>
                                        <span>
                                            <?php
                                            echo is_numeric($price)
                                                ? esc_html(number_format_i18n((float) $price))
                                                : esc_html((string) $price);
                                            ?>
                                        </span>
                                        <span>（税込）</span>
                                    </div>
                                    <a class="btn-more" href="<?php echo esc_url($link); ?>" rel="noopener noreferrer" target="_blank">
                                        More &gt;&gt;
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $i++; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p>商品がありません。</p>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php // MAINTENAINCE SECTION // *********************************************************** // 
?>
<section class="maintenance-sec blur">
    <div class="container">
        <div class="maintenance-wrapper">
            <div class="main-title center blur">
                <span>Maintenance/Q&A</span>
                <h2 class="daily-title">育てる道具・Q&A</h2>
            </div>
            <div class="text-center mb-5">
                <p>TANZOはシーズニング済み。<br>簡単・楽しくお使いいただけます。</p>
            </div>
            <div class="btn-area center">
                <a class="btn-view-more" href="/maintenance">VIEW MORE >>></a>
            </div>
        </div>
    </div>
</section>


<?php // NEWS SECTION // *********************************************************** // 
?>
<section class="news-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="main-title blur">
                    <span>NEWS</span>
                    <h2 class="daily-title">お知らせ</h2>
                </div>
            </div>
            <div class="col-md-8">
                <?php if ($posts->have_posts()) : ?>
                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                        <?php get_template_part('template-parts/components/news-list'); ?>

                    <?php endwhile; ?>
                <?php endif; ?>

                <div class="btn-area justify-content-end pt-5">
                    <a class="btn-more" href="/news">More >>></a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // CONTACT SECTION // *********************************************************** // 
?>
<!-- <section class="contact-sec" id="contact">
    <div class="container xs-container">
        <div class="main-title blur">
            <span>お問い合わせ</span>
            <h2 class="yellow">CONTACT</h2>
        </div>
        <?php // echo do_shortcode('[contact-form-7 id="99f3a0e" title="お問い合わせフォーム"]'); 
        ?>
    </div>
</section> -->



<?php get_footer(); ?>