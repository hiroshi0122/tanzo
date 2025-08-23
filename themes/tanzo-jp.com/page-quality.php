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
 * Template Name: QUALITY（TANZOのこだわり）
 **/


$picture = [
    [
        'title' => '調理からテーブルへ',
        'image' => 'to_table',
    ],
    [
        'title' => '食卓へ彩りを添えるデザイン',
        'image' => 'color',
    ],
    [
        'title' => '食べ終わるまで料理が冷めません',
        'image' => 'hot',
    ],
];


get_header();
?>

<?php // DAILY PAGE FIRST SECTION // *********************************************************** // ?>
<section class="first-sec daily-page-first-sec quality">
    <div class="container-fluid">
        <div class="main-title blur center">
            <span>TANZO’s Commitment to Quality</span>
            <h1>TANZOのこだわり</h1>
            <h3>キャッチが入ります<br>キャッチが入ります</h3>
        </div>
    </div>
</section>


<?php // MATERIAL SECTION // *********************************************************** // ?>
<section class="material-sec pt-0">
    <div class="container">
        <div class="upper-part blur">
            <div class="row align-items-center">
                <div class="col-md-7 order-1 order-md-0">
                    <div class="text-side">
                        <div class="numbering-title border-bt blur">
                            <span>01.</span>
                            <h2>妥協のない素材</h2>
                        </div>
                        <div class="image-side d-md-none">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_material_4.webp" alt="素材のイメージ">
                        </div>
                        <p>TANZOは、国内最高品質の炭素鋼を使用し、鉄を1200℃まで熱して何度も叩く「鍛造」によって生まれたフライパンです。2,000トンの圧力で鍛えられることで、酸化被膜や不純物を飛ばして、金属内部の結晶構造が変化し、高い強度と耐久性を実現。人工的なコーティングは一切施していないため、安心して毎日の料理にご使用いただけます。</p>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <div class="image-side">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_material_4.webp" alt="素材のイメージ">
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part blur">
            <div class="row align-items-end">
                <div class="col-md-7">
                    <div class="image-part">
                        <div class="row g-2 g-md-4">
                            <div class="col-3 col-md-3">
                                <div class="detail-image">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_material_5.webp" alt="素材のイメージ">
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="detail-image">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_material_1.webp" alt="素材のイメージ">
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="detail-image">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_material_2.webp" alt="素材のイメージ">
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="detail-image">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_material_3.webp" alt="素材のイメージ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="text-part">
                        <div class="radius-box">
                            <p>炭素鋼はその優れた強度と耐久性により、自動車・建築・工具などさまざまな分野で広く使用されている特殊な素材です。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // THICKNESS SECTION // *********************************************************** // ?>
<section class="thickness-sec">
    <div class="container s-container">
        <div class="text-part">
            <div class="numbering-title blur center border-bt">
                <span>02.</span>
                <h2>こだわりの厚み</h2>
            </div>
            <p>6年にわたる試行錯誤の末にたどり着いたのは、熱効率と使い勝手を両立する“理想の厚み”でした。<br>直径20cmの個食に適したフライパンのサイズに、側面3mm・底面4mmというこだわりの厚み設計。<br>熱がムラなく均等に伝わり、食材を芯までじっくり加熱します。<br>どんな熱源でもしっかり熱を蓄え、調理の質を一段上げてくれる一枚です。</p>
        </div>
        <div class="image-part">
            <div class="row">
                <div class="col-6">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_thickness_1.webp" alt="厚みのイメージ">
                </div>
                <div class="col-6">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_thickness_2.webp" alt="厚みのイメージ">
                </div>
            </div>
        </div>
    </div>
</section>


<?php // HEAT SECTION // *********************************************************** // ?>
<section class="heat-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 d-none d-md-block">
                <div class="image-side">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_heat_1.webp" alt="蓄熱性のイメージ">
                </div>
            </div>
            <div class="col-md-7">
                <div class="text-side">
                    <div class="numbering-title blur border-bt">
                        <span>03.</span>
                        <h2>高い熱伝導率と蓄熱性</h2>
                    </div>
                    <div class="image-side d-md-none">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_heat_1.webp" alt="蓄熱性のイメージ">
                    </div>
                    <p class="description">高い熱伝導率と蓄熱性を備えたTANZOは、通常のフライパンよりも少ない火力で短時間調理が可能。予熱を活かせば火を止めた後もじんわり熱が伝わり、素材の旨味をやさしくとじこめます。高温調理にも適しているため手早く仕上がり、調理時間の短縮にも効果的。料理はさいごのひと口まで温かく、美味しさが長続きします。</p>
                    <div class="detail-image">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_heat_2.webp" alt="蓄熱性のイメージ">
                        <small>（加熱何秒後の表面温度（約何度 等）</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // HEAT SOURCE SECTION // *********************************************************** // ?>
<section class="heat-source-sec">
    <div class="container s-container">
        <div class="text-part">
            <div class="numbering-title blur center border-bt">
                <span>04.</span>
                <h2>すべての熱源に対応</h2>
            </div>
            <p>TANZOは、IHやガスコンロはもちろん、<br>魚焼きグリルやオーブン、さらには直火でも使える万能調理器です。<br class="d-none d-sm-block">ガス火で焼き色を付けた後、そのままオーブンで仕上げるなど、幅広い調理が可能です。<br>すべての熱源に対応し、加熱による劣化や変形の心配もありません。<br>自宅でもアウトドアでも頼れる一枚です。</p>
        </div>
        <div class="image-part">
            <div class="row g-2 g-md-4">
                <div class="col-6">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_heat_source_2.webp" alt="熱源に対応イメージ１">
                </div>
                <div class="col-6">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/image_heat_source_1.webp" alt="熱源に対応イメージ２">
                </div>
            </div>
        </div>
        <div class="list-part">
            <h4>TANZOが対応している熱源</h4>
            <img src="<?php bloginfo('template_url'); ?>/assets/images/quality/heat_source_list.svg" alt="対応リスト">
            <p>2,000トンのちからで叩き出されるTANZOは非常に頑強です。<br>熱による変形や落下による破損などを全く気にせず使えます。</p>
        </div>
    </div>
</section>


<?php // KV MESSAGE SECTION // *********************************************************** // ?>
<section class="kv-message-sec">
    <div class="container-fluid g-0">
        <div class="kv-area">
            <img class="image-1 photo" src="<?php bloginfo('template_url'); ?>/assets/images/quality/lv_image_1.webp" alt="kvイメージ">
            <img class="image-2 photo" src="<?php bloginfo('template_url'); ?>/assets/images/quality/lv_image_2.webp" alt="kvイメージ">
            <img class="image-3 photo" src="<?php bloginfo('template_url'); ?>/assets/images/quality/lv_image_3.webp" alt="kvイメージ">
            <img class="image-4 photo" src="<?php bloginfo('template_url'); ?>/assets/images/quality/lv_image_4.webp" alt="kvイメージ">
            <img class="catch blur" src="<?php bloginfo('template_url'); ?>/assets/images/quality/catch.svg" alt="だからTANZOはおいしい">
        </div>
    </div>
</section>


<?php get_template_part('template-parts/components/sec-btn'); ?>



<?php get_footer(); ?>