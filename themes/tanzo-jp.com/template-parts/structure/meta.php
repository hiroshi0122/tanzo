<?php
/**
 * Meta
 *
 * @package Unicra
 * @since 2025.3.17
 * @version 2.0
 * 
 */

?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php // FAVICON // ?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico"/>

<?php // FONT AWESOME // ?>
<link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<?php // ADOBE FONT // ?>
<script>
  (function(d) {
    var config = {
      kitId: 'vsg5rcj',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>

<?php // GOOGLE FONT // ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@300&display=swap" rel="stylesheet">

<?php // GSAP // ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/ScrollTrigger.min.js"></script>
<?php // LENIS // ?>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.19/dist/lenis.min.js" defer></script>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/css/all.css?ver=<?php echo time(); ?>"></link>
