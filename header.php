<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#f6f3ec">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_url'); ?>/images/mstile-144x144.png">
<meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/images/browserconfig.xml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
<?php
$background_color = get_background_color();
$background_image = get_background_image();
echo "<style type=\"text/css\" id=\"custom-background-css\">
body.custom-background { background: #". $background_color ." url(". $background_image .") no-repeat top center fixed; }
</style>";
?>
</head>
<body <?php body_class(); ?>>

<div class="grid">
	<div class="col-1">
		<a href="<?php bloginfo('url'); ?>"><img src="<?php header_image('Header Image'); ?>" alt="The Big Shopping Shakeup" class="aligncenter" /></a>
	</div>
</div>

<div class="grid">
	<div class="col-1">
		<div class="menu-mobile">
			<span class="burger"></span>
			<span class="burger"></span>
			<span class="burger"></span>
		</div>
		<?php wp_nav_menu( array('menu' => 'Main Menu' )); ?>
	</div>		
</div>