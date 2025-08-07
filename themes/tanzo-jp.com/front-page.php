<?php

/**
 * Home template file
 *
 * @link Unicra
 *
 * @package Unicra
 * @since 2025.3.17
 * @version 2.0
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

// 会社概要の情報
$company_info = [
    "施設名" => "就労支援B型事業所 ユニクラ",
    "作業内容" => "だるまや赤べこなどの民芸品制作、内職作業",
    "営業時間" => "月曜日～金曜日　10:00～12:00、13:00~15:00
    ※送迎あり（土・日・祝日休み）",
    "アクセス" => "福島県白河市中町53"
];

$slider = [
    'slide_1',
    'slide_2',
    'slide_3',
    'slide_5',
    'slide_6',
    'slide_7',
];

$motto = [
    'pink' => '失敗してもいい環境づくり',
    'light-blue' => 'ポジティブな環境整備',
    'blue' => '自信と能力を高める',
    'yellow' => 'やりがいの創出',
];



get_header();
?>

<?php // FIRST SECTION // *********************************************************** // ?>
<section class="first-sec" id="first-view-sec">
    <div class="container-fluid g-0">
        <div class="row align-items-center g-0">
            <div class="col-md-3 order-1 order-md-0 title-side">
                <img class="blur d-none d-md-block" src="<?php bloginfo('template_url'); ?>/assets/images/home/main_title.svg" alt="一人一人の可能性を発見する就労支援B型施設">
                <img class="blur d-md-none" src="<?php bloginfo('template_url'); ?>/assets/images/logo/unicra_logo_hr.svg" alt="一人一人の可能性を発見する就労支援B型施設">
            </div>
            <div class="col-md-9 order-0 order-md-1 slider-side">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach ($slider as $image) : ?>
                                <li class="splide__slide">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/home/<?php echo ($image); ?>.webp" alt="ファーストしライダーイメージ">
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php // ABOUT SECTION // *********************************************************** // ?>
<section class="about-sec pt-0" id="about">
    <div class="container text-center">
        <div class="radius-box">
            <img class="cloud blur pink" src="<?php bloginfo('template_url'); ?>/assets/images/common/cloud_pink.svg" alt="雲：ピンク">
            <img class="cloud blur tatsu-daruma" src="<?php bloginfo('template_url'); ?>/assets/images/home/tatsu_beko_1.webp" alt="辰だるま">
            <img class="cloud blur light-blue" src="<?php bloginfo('template_url'); ?>/assets/images/common/cloud_light_blue.svg" alt="雲：水色">
            <img class="cloud blur blue" src="<?php bloginfo('template_url'); ?>/assets/images/common/cloud_blue.svg" alt="雲：ブルー">
            <img class="cloud blur yellow" src="<?php bloginfo('template_url'); ?>/assets/images/common/cloud_yellow.svg" alt="雲：イエロー">
            <img class="cloud blur tora-daruma" src="<?php bloginfo('template_url'); ?>/assets/images/home/tora_daruma.webp" alt="とらだるま">
            <div class="main-title blur">
                <span>わたしたちについて</span>
                <h2 class="yellow">ABOUT US</h2>
            </div>
            <div class="lead-text">
                <p>
                    <span>だるまランドや、アカベコランドを運営する白河だるま総本舗。</span><br>
                    <span>その白河だるまの14代目が代表を務める就労継続支援B型施設です。</span><br>
                    <span>伝統工芸品の担い手不足解消と、</span><br>
                    <span>障害のある方一人ひとりの可能性を見つけるため、この施設を立ち上げました。</span><br>
                    <span>ものつくりを通して「達成感・挑戦心」を培い、</span><br>
                    <span>ひとりひとりが自信を持って生きることができる社会を目指しています。</span>
                </p>
            </div>
        </div>
        <div class="question">
            <dl>
                <dt>就労継続支援B型とは？</dt>
                <dd>就労継続支援B型とは、障害のある方が一般企業への就職が困難な場合に、雇用契約を結ばず、軽作業などの就労訓練を行う福祉サービスのことです。</dd>
                <dd>障害や体調に合わせて、自分のペースで働くことができます。ユニクラでは、身体障害や知的障害、発達障害を含む精神障害、または難病を抱えている方を対象としています。</dd>
            </dl>
        </div>
    </div>
</section>

<?php // MOTTO SECTION // *********************************************************** // ?>
<section class="motto-sec" id="motto">
    <img class="cloud blur gray" src="<?php bloginfo('template_url'); ?>/assets/images/common/cloud_gray.svg" alt="雲：グレー">
    <span class="radius-box"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 title-side">
                <div class="main-title blur">
                    <span class="yellow">わたしたちのモットー</span>
                    <h2 class="pink">OUR <br class="d-none d-sm-block">MOTTO</h2>
                </div>
                <p>以下の４つを私たちのモットーとして掲げています。</p>
            </div>
            <div class="col-lg-7 motto-side">
                <ul class="motto-list">
                    <?php 
                        $n = 1;
                        foreach ($motto as $key => $value ) : 
                    ?>
                        <li class="<?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?> fadeInUp">
                            <img class="number" src="<?php bloginfo('template_url'); ?>/assets/images/home/number_<?php echo $n++; ?>.svg" alt="No.">
                            <h3><?php echo nl2br(htmlspecialchars($value, ENT_QUOTES, 'UTF-8')); ?></h3>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>


<?php // OUTLINE SECTION // *********************************************************** // ?>
<section class="outline-sec" id="outline">
    <div class="container s-container">
        <div class="main-title blur center">
            <span>施設概要</span>
            <h2 class="yellow">OUTLINE</h2>
        </div>
        <table class="info-table">
            <tbody>
                <?php foreach ($company_info as $key => $info) : ?>
                    <tr>
                        <th><?php echo htmlspecialchars($key, ENT_QUOTES, 'UTF-8'); ?></th>
                        <td><?php echo nl2br(htmlspecialchars($info, ENT_QUOTES, 'UTF-8')); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3191.9462028441876!2d140.21365503444233!3d37.12787917205818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60203aed8ce8a5dd%3A0x8b528ef3c58da174!2z44CSOTYxLTA5NTEg56aP5bO255yM55m95rKz5biC5Lit55S677yV77yT!5e0!3m2!1sja!2sjp!4v1744765579894!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php // CONTACT SECTION // *********************************************************** // ?>
<section class="contact-sec" id="contact">
    <div class="container xs-container">
        <div class="main-title blur">
            <span>お問い合わせ</span>
            <h2 class="yellow">CONTACT</h2>
        </div>
        <?php echo do_shortcode('[contact-form-7 id="99f3a0e" title="お問い合わせフォーム"]'); ?>
    </div>
</section>



<script>
    var splide = new Splide('.splide', {
        type: 'fade',
        perPage: 1,
        autoplay: true,
        rewind: true,
        speed: 400,
        arrows: boolean = false,
    });

    splide.mount();
</script>


<?php get_footer(); ?>