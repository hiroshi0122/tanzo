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
 * Template Name: SIMPLE（手間なし・かんたん）
 **/

// もっとおいしく
$method = [
    [
        'title' => '焼く',
        "catch" => "余熱で調理\n旨みを閉じ込める",
        'image' => 'grill',
        'text' => '高温をしっかり蓄えるTANZOだから、表面は香ばしく、中はジューシー。火入れのタイミングが味を決める。',
    ],
    [
        'title' => '蒸す',
        "catch" => "素材の香りが立ち上る",
        'image' => 'steam',
        'text' => 'TANZOは均質な厚みで熱をやさしく包み込み、じっくり蒸し上げる。素材の風味をそのままに、ふっくら仕上がる。',
    ],
    [
        'title' => '煮る',
        "catch" => "ぐつぐつと深く\n染みこむ味わい",
        'image' => 'boil',
        'text' => '高密度な鉄は、温度ムラが少なく穏やかな煮込みに最適。火を止めたあとも、余熱で味がしっかりなじむ。',
    ],
    [
        'title' => '炊く',
        "catch" => "一粒ずつ\n芯までおいしい",
        'image' => 'cook',
        'text' => '鍛造の蓄熱性で、米がしっかり対流。ふっくら立ち上がるごはんは、香り高く、冷めてもおいしい。',
    ],
];


get_header();
?>

<?php // DAILY PAGE FIRST SECTION // *********************************************************** // ?>
<section class="first-sec daily-page-first-sec simple">
    <div class="container-fluid">
        <div class="main-title blur center">
            <span>Effortless & Simple</span>
            <h1>手間なし・かんたん</h1>
            <h3>TANZOはシーズニング不要<br>届いたその日から使えます</h3>
        </div>
        <div class="description">
            <p>炭素鋼を、2,000トンもの力で叩くことにより生まれる鍛造フライパン。<br>密度の高い素材は、蓄熱性と耐久性に優れ、火の力をしっかりと受け止めてくれます。</p>
            <p>TANZOは、出荷時に丁寧にシーズニングされ、届いたその時からすぐに使い始められます。<br>鉄製の道具というと、扱いが難しそうと思われがちですが、<br class="d-none d-sm-block">じっくりとながく付き合っていける、そんなパートナーになれるようにと作っています。<br class="d-none d-sm-block">手に取ったその日から、料理が少しだけ楽しくなります。</p>
        </div>
    </div>
</section>


<?php // COOOKING METHOD SECTION // *********************************************************** // ?>
<section class="cooking-method-sec pt-0">
    <div class="container">
        <div class="row align-items-stretch fadeInUp-stagger">
            <?php foreach($method as $content): ?>
            <div class="col-md-6 stagger">
                <div class="cooking-contents">
                    <div class="border-title">
                        <h3><?php echo esc_html($content['title']); ?></h3>
                    </div>
                    <div class="image">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/simple/method_<?php echo esc_html($content['image']); ?>.webp" alt="<?php echo esc_html($content['title']); ?>">
                    </div>
                    <dl class="description">
                        <dt><?php echo nl2br(esc_html($content['catch'])); ?></dt>
                        <dd><?php echo esc_html($content['text']); ?></dd>
                    </dl>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php get_template_part('template-parts/components/sec-btn'); ?>



<?php get_footer(); ?>