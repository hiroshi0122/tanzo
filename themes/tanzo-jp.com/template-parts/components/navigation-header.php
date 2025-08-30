<?php

/**
 * Displays header navigation
 *
 * @package TANZO
 * @since 2025.8.19
 * @version 1.0
 */

include 'navigation.php';  // 配列を読み込み
?>

<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-auto">
            <a class="logo-side" href="/">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/tanzo_japan.svg" alt="tanzoロゴ">
            </a>
        </div>
        <nav class="col d-none d-lg-block">
            <ul class="navigation row justify-content-end">
                <?php foreach ($navigation as $key => $menu): ?>
                    <?php
                    $has_children = !empty($menu['children']);
                    $raw = $menu['link'] ?? '';
                    // #始まりはそのまま、それ以外はサイトURLに連結
                    $href = (strpos($raw, '#') === 0)
                        ? $raw
                        : home_url('/' . ltrim($raw, '/'));
                    ?>
                    <li class="col-auto nav-item <?php echo $has_children ? 'has-children' : ''; ?>">
                        <a class="menu-link"
                            href="<?php echo esc_url($href); ?>"
                            <?php if ($has_children): ?> aria-haspopup="true" aria-expanded="false" <?php endif; ?>>
                            <p><?php echo esc_html($menu['menu']); ?></p>
                        </a>

                        <?php if ($has_children): ?>
                            <ul class="submenu" role="menu">
                                <?php foreach ($menu['children'] as $child):
                                    $childHref = (strpos($child['link'], '#') === 0)
                                        ? $child['link']
                                        : home_url('/' . ltrim($child['link'], '/'));
                                ?>
                                    <li role="none">
                                        <a role="menuitem" href="<?php echo esc_url($childHref); ?>">
                                            - <?php echo esc_html($child['menu']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <?php // # MOBILE NAVIGATION =======================/
        ?>
        <div class="hamburger d-lg-none">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="menu-contents d-lg-none">
            <ul class="menu-list">
                <a class="logo" href="/">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo/tanzo_logo_2.svg" alt="TANZOロゴ">
                </a>
                <?php foreach ($navigation as $key => $menu): ?>
                    <?php
                        $has_children = !empty($menu['children']);
                        $raw = $menu['link'] ?? '';
                        // #始まりはそのまま、それ以外はサイトURLに連結
                        $href = (strpos($raw, '#') === 0)
                            ? $raw
                            : home_url('/' . ltrim($raw, '/'));
                    ?>
                    <li class="menu modal-close hum-close">
                        <a href="<?php echo esc_html($menu['link']); ?>">
                            <?php echo esc_html($menu['menu']); ?>
                        </a>

                         <?php if ($has_children): ?>
                            <ul class="submenu" role="menu">
                                <?php foreach ($menu['children'] as $child):
                                    $childHref = (strpos($child['link'], '#') === 0)
                                        ? $child['link']
                                        : home_url('/' . ltrim($child['link'], '/'));
                                ?>
                                    <li role="none">
                                        <a role="menuitem modal-close hum-close" href="<?php echo esc_url($childHref); ?>">
                                            <?php echo esc_html($child['menu']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <nav class="header-second-nav">
                <ul class="navigation row">
                    <?php foreach ($second_navigation as $key => $menu): ?>
                        <?php
                            // リンク生成（#はそのまま／それ以外はサイトURL基準）
                            $raw  = $menu['link'] ?? '';
                            $href = (strpos($raw, '#') === 0) ? $raw : ltrim($raw, '');
                            $is_external = preg_match('/^https?:\/\//', $raw);
                        ?>
                        <li class="col-auto modal-close">
                            <a class="menu-link"
                            href="<?php echo esc_url($href); ?>"
                            <?php if ($is_external): ?>target="_blank" rel="noopener noreferrer"<?php endif; ?>>
                            <?php echo esc_html($menu['menu']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>