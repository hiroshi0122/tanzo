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

// スライダーの配列処理
$slides = [
    [
        'img' => get_template_directory_uri() . '/assets/images/home/kv_visual_1.webp',
        'alt' => 'スライダー1',
    ],
    [
        'img' => get_template_directory_uri() . '/assets/images/home/kv_visual_2.webp',
        'alt' => 'スライダー2',
    ],
    [
        'img' => get_template_directory_uri() . '/assets/images/home/kv_visual_3.webp',
        'alt' => 'スライダー3',
    ],
    [
        'img' => get_template_directory_uri() . '/assets/images/home/kv_visual_4.webp',
        'alt' => 'スライダー4',
    ],
    [
        'img' => get_template_directory_uri() . '/assets/images/home/kv_visual_5.webp',
        'alt' => 'スライダー5',
    ],
    [
        'img' => get_template_directory_uri() . '/assets/images/home/kv_visual_6.webp',
        'alt' => 'スライダー6',
    ],
];

// ラインナップの製品情報
$products = [
    [
        'img' => 'flying_pan_1',
        'title' => 'TANZO フライパン',
        'text' => '使いやすいを目指し、デザインや細部までこだわり抜いた、世界的にも珍しい鍛造（たんぞう）フライパン。取手を外してそのまま食卓へ。',
        'price' => '25,300',
        'link' => '/products/tanzo-frying-pan',
    ],
    [
        'img' => 'bowl_2',
        'title' => 'TANZO ボウル',
        'text' => '使いやすいを目指し、デザインや細部までこだわり抜いた、世界的にも珍しい鍛造（たんぞう）ボウル。浅型鍋として、無水調理や煮込み料理、揚げ物料理にも使いやすい万能ボウル。お鍋としても使えます。',
        'price' => '29,700',
        'link' => '/products/tanzo-bowl',
    ],
    [
        'img' => 'glass_lid_hole_2',
        'title' => 'TANZOフライパン 専用ガラス蓋 蒸気穴付き',
        'text' => 'フライパン調理をより快適にサポートするガラス蓋。蒸気穴を通じて蒸気が逃げることで、鍋の中の温度や湿度が適切に保たれ、食材が均一に加熱されます。煮物や蒸し料理などで、適切な水分量を保ちながら調理することが可能です。',
        'price' => '0,000',
        'link' => '/products/tanzo-frying-pan',
    ],
    [
        'img' => 'glass_lid_2',
        'title' => 'TANZO TANZOボウル専用 ガラス蓋',
        'text' => '調理をより快適にサポートするガラス蓋。蒸気穴を通じて蒸気が逃げることで、鍋の中の温度や湿度が適切に保たれ、食材が均一に加熱されます。煮物や蒸し料理などで、適切な水分量を保ちながら調理することが可能です。',
        'price' => '0,000',
        'link' => '/products/tanzo-frying-pan',
    ],
    [
        'img' => 'glass_lid_2',
        'title' => 'TANZO×SKYWOOD 吉野杉ウッドプレート大・中・小',
        'text' => '熱いTANZOをそのまま食卓に！側面に持ちやすいカットを施していただきました。鍋敷きにつかっても、木製プレートとして使っても、カッティングボードとして使ってもOK。',
        'price' => '0,000',
        'link' => '/products/tanzo-frying-pan',
    ],
];



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

<?php // FIRST SECTION // *********************************************************** // ?>
<section class="first-sec" id="first-view-sec">
    <div class="container-fluid">
        <div class="slider-wrapper">
            <div class="slider-container blur">
                <?php foreach ($slides as $index => $slide) : ?>
                    <div class="slide <?php echo ($index === 0) ? 'active' : ''; ?>">
                        <img src="<?php echo esc_url($slide['img']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>">
                    </div>
                <?php endforeach; ?>

                <div class="progress-bar">
                    <div class="progress" id="progress"></div>
                </div>
            </div>
            <div class="dots">
                <?php foreach ($slides as $index => $slide) : ?>
                    <div class="dot <?php echo ($index === 0) ? 'active' : ''; ?>"></div>
                <?php endforeach; ?>
            </div>
             <img class="catch" src="<?php bloginfo('template_url'); ?>/assets/images/home/kc_catch.svg" alt="いつもの料理をもっと美味しく">
        </div>
    </div>
</section>


<?php // DAILY LIFE SECTION // *********************************************************** // ?>
<section class="daily-life-sec">
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
                            <h5>弱火と予熱で旨みを凝縮</h5>
                            <div class="text-end">
                                <a href="" class="btn-more">More >>></a>
                            </div>
                        </li>
                        <li class="col-auto">
                            <span>02.</span>
                            <h5>TANZOのこだわり</h5>
                            <div class="text-end">
                                <a href="" class="btn-more">More >>></a>
                            </div>
                        </li>
                        <li class="col-auto">
                            <span>03.</span>
                            <h5>調理からテーブルへ<br>暮らしを彩るTANZO</h5>
                            <div class="text-end">
                                <a href="" class="btn-more">More >>></a>
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


<?php // STORY SECTION // *********************************************************** // ?>
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
                        <h3 class="sub-catch">簡単なキャッチが入ります。<br>簡単なキャッチが入ります。</h3>
                    </div>
                    <div class="image-side blur d-md-none">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/home/story_image.webp" alt="開発の物語">
                    </div>
                    <p class="description">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                    <div class="btn-area">
                        <a class="btn-view-more" href="/story">VIEW MORE >>></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // LINUP SECTION // *********************************************************** // ?>
<section class="lineup-sec">
    <div class="container">
        <div class="main-title center blur">
            <span>PRODUCT</span>
            <h2 class="daily-title">商品ラインアップ</h2>
        </div>
        <div class="row">
            <?php $i = 1; // カウンター初期化 ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-6">
                    <div class="content">
                        <span class="number"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?>.</span>
                        <div class="product-image">
                            <a href="<?php echo esc_html($product['link']); ?>" target="_blank" rel="noopener">
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/products/<?php echo esc_html($product['img']); ?>.webp" alt="<?php echo esc_html($product['title']); ?>">
                            </a>
                        </div>
                        <div class="product-info">
                            <h3><?php echo esc_html($product['title']); ?></h3>
                            <p><?php echo esc_html($product['text']); ?></p>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <div class="price">
                                    <span class="me-1">¥</span>
                                    <span><?php echo esc_html($product['price']); ?></span>
                                    <span>（税込）</span>
                                </div>
                                <a class="btn-more" href="<?php echo esc_html($product['link']); ?>" target="_blank" rel="noopener">More >>></a>
                                </div>
                        </div>
                    </div>
                </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php // MAINTENAINCE SECTION // *********************************************************** // ?>
<section class="maintenance-sec blur">
    <div class="container">
        <div class="maintenance-wrapper">
            <div class="main-title center blur">
                <span>Maintenance/Q&A</span>
                <h2 class="daily-title">メンテナンス・Q&A</h2>
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


<?php // NEWS SECTION // *********************************************************** // ?>
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
                    <a class="btn-more" href="/all-news">More >>></a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // CONTACT SECTION // *********************************************************** // ?>
<!-- <section class="contact-sec" id="contact">
    <div class="container xs-container">
        <div class="main-title blur">
            <span>お問い合わせ</span>
            <h2 class="yellow">CONTACT</h2>
        </div>
        <?php // echo do_shortcode('[contact-form-7 id="99f3a0e" title="お問い合わせフォーム"]'); ?>
    </div>
</section> -->



<?php get_footer(); ?>