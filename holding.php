<?php
/*
Template Name: Holding Page
*/
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
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
	<div class="col-1 centered">
		<h1><img src="<?php header_image('Header Image'); ?>" alt="The Big Shopping Shakeup" /></h1>
	</div>
</div>

<div class="grid">
	<div class="col-1 centered">
		<h1>Coming Soon</h1>
	</div>		
</div>


<?php get_footer(); ?>