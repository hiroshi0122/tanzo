<?php

/**
 * Displays footer navigation
 *
 * @package TANZO
 * @since 2025.8.11
 * @version 1.0
 */

include 'navigation.php';  // 配列を読み込み
?>

<div class="row align-items-center">
    <div class="col-md-3">
        <a class="footer-logo" href="/">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/tanzo_japan.svg" alt="tanzoロゴ">
        </a>
        <div class="sns-area">
            <div class="sns-icons">
                <span>FOLLOW ME! ▶︎</span>
                <a class="facebook" href="https://www.facebook.com/profile.php?id=61579090658514&locale=ja_JP" target="_blank" rel="noopener">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/common/facebook.svg" alt="facebookアイコン">
                </a>
                <a class="instagram" href="https://www.instagram.com/tanzo__yamaco/" target="_blank" rel="noopener">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/common/instagram.svg" alt="instagramアイコン">
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <nav class="footer-nav">
            <ul class="navigation row justify-content-end">
                <?php foreach ($navigation as $key => $menu): ?>
                    <li class="col-6 col-md-auto g-0">
                        <a class="menu-link" href="<?php echo esc_html($menu['link']); ?>">
                            <p><?php echo esc_html($menu['menu']); ?></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>
<div class="second-nav-area">
    <div class="row align-items-center justify-content-between">
        <div class="col-md-auto order-1 order-md-0">
            <small class="copyright">&copy; <?php echo date("Y"); ?> TANZO Rights Reserved.</small>
        </div>
        <div class="col order-0 order-md-1">
            <nav class="footer-second-nav">
                <ul class="navigation row">
                    <?php foreach ($second_navigation as $key => $menu): ?>
                        <?php
                            // リンク生成（#はそのまま／それ以外はサイトURL基準）
                            $raw  = $menu['link'] ?? '';
                            $href = (strpos($raw, '#') === 0) ? $raw : ltrim($raw, '');
                            $is_external = preg_match('/^https?:\/\//', $raw);
                        ?>
                        <li class="col-auto g-0">
                            <a class="menu-link" href="<?php echo esc_url($href); ?>" <?php if ($is_external): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                                <p><?php echo esc_html($menu['menu']); ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>