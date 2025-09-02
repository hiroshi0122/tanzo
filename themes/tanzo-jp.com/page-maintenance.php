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
 * Template Name: MAINTENANCE
 **/

// 毎日の基本
$daily_basics = [
    [
        'title' => 'たわしで洗う',
        'sub-title' => 'たわしなどで汚れ、焦げ付きを取る',
        'image' => 'scrape',
        'text' => '日常のお手入れは、使用後にたわしで洗うだけで十分です。ひどい焦げ付きが起こった場合は、スチールたわしでこすり落とし、再度油ならしを行うことで復活します。',
    ],
    [
        'title' => '洗剤で洗う',
        'sub-title' => '洗剤で汚れ落とし',
        'image' => 'wash',
        'text' => 'TANZO は純度が高く、表面に人工的な加工をしていないため、鉄なのに洗剤で洗えます。水かお湯でたわしを使い洗います。',
    ],
    [
        'title' => '乾かす',
        'sub-title' => '火にかけて水分を飛ばす',
        'image' => 'dry',
        'text' => '洗浄後は中火で加熱し、水気をとばし、サビの発生を防ぎます。(サビの対策はたったこれだけです)',
    ],
    [
        'title' => '保管する',
        'sub-title' => 'そのまま次の出番を待つ',
        'image' => 'put_away',
        'text' => '乾燥後は風通しの良い場所で保管してください。通常はシーズニングは不要です。水気のないところで保管し、長期保存の場合は軽く油を塗ってから保管されることをおすすめします。',
    ],
];

// もっとおいしく
$more_delicious = [
    [
        'title' => 'じっくり「予熱」',
        'image' => 'more_delicious_1',
        'text' => '純度の高い鉄は熱伝導が非常に良く、急な加熱は焦げ付きの原因になります。フライパンなら弱火、ボウルなら中火弱で、2~3分かけてじっくり温めるのがポイントです。',
    ],
    [
        'title' => '「強火」は不要',
        'image' => 'more_delicious_2',
        'text' => 'しっかりと余熱をすれば、TANZOは高い蓄熱性で熱を保ちます。調理中に強火は必要ありません。食材に合わせて火加減を調整し、旨味を最大限に引き出しましょう。',
    ],
    [
        'title' => '「余熱調理」で仕上げる',
        'image' => 'more_delicious_3',
        'text' => '高い保温性を活かし、火から下ろす数分前に熱源を切って、余熱で最後の仕上げを。素材の旨味を逃さず、ワンランク上の味わいを生み出します。',
    ],
];

// Q&Aの取得
$args = [
    'post_type'      => 'qa',       // カスタム投稿タイプ
    'posts_per_page' => -1,         // 全件取得
    'orderby'        => 'menu_order', // 並び順（必要に応じて変更）
    'order'          => 'ASC',
];
$qa_query = new WP_Query($args);
$i = 1; // 番号カウンター


get_header();
?>

<?php // INNER PAGE FIRST SECTION // *********************************************************** // ?>
<section class="first-sec inner-page-first-sec maintenance">
    <div class="container">
        <div class="main-title blur">
            <span>A Tool That Grows with You</span>
            <h1>育てる道具</h1>
            <h3>一生使える<br>楽しい調理のパートナー</h3>
        </div>
        <!-- <div class="description">
            <p>簡単な説明が入ります。簡単な説明が入ります。簡単な説明が入ります。<br>簡単な説明が入ります。簡単な説明が入ります。簡単な説明が入ります。</p>
        </div> -->
    </div>
</section>


<?php // MAINTENANCE MESSAGE SECTION // *********************************************************** // ?>
<section class="maintenance-message-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="catch-side">
                    <h3 class="blur">生涯のパートナーとして。</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-side">
                    <h4>「TANZOを育てる」ということ</h4>
                    <p class="blur">鉄のキッチン用品は、使えば使うほど油がなじみ、あなただけの道具へと育っていきます。<br>正しいお手入れは、実はとてもシンプル。いくつかのコツを知るだけで、錆を防ぎ、生涯にわたって美味しく楽しい調理のパートナーとして使い続けることができます。</p>
                    <p class="blur">さあ、TANZOを育てる楽しみを始めましょう。</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // BEFORE USING SECTION // *********************************************************** // ?>
<section class="before-using-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-side">
                    <div class="numbering-title blur">
                        <div class="title">
                            <span>01.</span>
                            <h2>はじめてお使いになる前に</h2>
                        </div>
                    </div>
                    <div class="image-side blur d-md-none">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/maintenance/before_using.webp" alt="初めてお使いになる前に">
                    </div>
                    <div class="description">
                        <p>TANZOの調理道具は、職人の手で「油ならし」を済ませた状態でお手元に届きます。そのため、鉄製品に必要と言われる初のシーズニングは不要です。</p>
                        <p>袋から出してすぐに調理を始めていただけますが、もしよろしければ、最初の料理にアヒージョなど油をたっぷり使うものを選んでみてください 。フライパンがさらに油に馴染み、焦げ付きにくさが増して、より良いスタートを切ることができます 。</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block">
                <div class="image-side blur">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/maintenance/before_using.webp" alt="初めてお使いになる前に">
                </div>
            </div>
        </div>
    </div>
</section>


<?php // DAILY BASICS SECTION // *********************************************************** // 
?>
<section class="daily-basics-sec">
    <div class="container">
        <div class="numbering-title blur center">
            <div class="title">
                <span>02.</span>
                <h2>毎日の基本</h2>
            </div>
            <p class="sub-title">シンプルなお手入れ</p>
        </div>
        <div class="row fadeInUp-stagger">
            <?php foreach ($daily_basics as $content): ?>
                <div class="col-md-6 stagger">
                    <div class="daily-content">
                        <div class="title">
                            <h3><?php echo esc_html($content['title']); ?></h3>
                            <span><?php echo esc_html($content['sub-title']); ?></span>
                        </div>
                        <div class="image-area">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/maintenance/<?php echo esc_html($content['image']); ?>.webp" alt="<?php echo esc_html($content['title']); ?>">
                        </div>
                        <div class="text">
                            <p><?php echo esc_html($content['text']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php // MORE DELICIOUS SECTION // *********************************************************** // 
?>
<section class="more-delicious-sec">
    <div class="container">
        <div class="numbering-title blur">
            <div class="title">
                <span>03.</span>
                <h2>もっと美味しく</h2>
            </div>
            <p class="sub-title">TANZOを使いこなす3つのコツ</p>
        </div>

        <?php foreach ($more_delicious as $content): ?>
            <div class="delicious-content">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="image-side blur">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/maintenance/<?php echo esc_html($content['image']); ?>.webp" alt="<?php echo esc_html($content['title']); ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="text-side">
                            <h3 class="blur"><?php echo esc_html($content['title']); ?></h3>
                            <p><?php echo esc_html($content['text']); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</section>


<?php // Q&A SECTION // *********************************************************** // 
?>
<section class="qa-sec">
    <div class="container">
        <div class="numbering-title blur">
            <div class="title">
                <span>04.</span>
                <h2>Q&A</h2>
            </div>
            <p class="sub-title">こんな時どうする？</p>
        </div>
        <div class="qa-contents">
            <?php if ($qa_query->have_posts()): ?>
                <div class="qa-list blur">
                    <?php while ($qa_query->have_posts()): $qa_query->the_post(); ?>
                        <?php
                        $num   = $i;
                        $uid   = 'qa-' . get_the_ID();              // ユニークID
                        $btnId = $uid . '-btn';                     // ボタンID
                        ?>
                        <div class="accordion">
                            <button class="acc-btn"
                                id="<?php echo esc_attr($btnId); ?>"
                                aria-expanded="false"
                                aria-controls="<?php echo esc_attr($uid); ?>">
                                <span class="qa-num">Q<?php echo esc_html($num); ?>.</span>
                                <h5 class="qa-title"><?php the_title(); ?></h5>
                                <img class="arrow" src="<?php bloginfo('template_url'); ?>/assets/images/common/angle-right.svg">
                            </button>

                            <div class="acc-panel"
                                id="<?php echo esc_attr($uid); ?>"
                                role="region"
                                aria-labelledby="<?php echo esc_attr($btnId); ?>"
                                hidden>
                                <?php $has_thumb = has_post_thumbnail(); ?>
                                <div class="acc-inner <?php echo $has_thumb ? 'has-thumb' : 'text-only'; ?>">
                                    <?php if ($has_thumb): ?>
                                        <div class="qa-thumb">
                                            <?php the_post_thumbnail('large'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="qa-answer">
                                        <?php echo apply_filters('the_content', get_the_content()); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>