<?php
  /* get page ID */
  if (is_home()) {
    $page_id = 'home';
  } else {
    $page_id = get_slug_id();
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <?php get_template_part('template-parts/structure/meta'); ?>
  <?php wp_head(); ?>
</head>

<body id="<?php echo esc_attr($page_id); ?>">

  <header class="site-header">
    <?php get_template_part('template-parts/components/navigation-header'); ?>
  </header>
