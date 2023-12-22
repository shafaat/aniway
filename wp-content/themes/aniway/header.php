<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aniway
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<?php $my_current_lang = apply_filters( 'wpml_current_language', NULL );?>
<?php if($my_current_lang == 'en') $body_class = 'english'; ?>
<?php if($my_current_lang == 'he') $body_class = 'hebrew'; ?>
<body <?php body_class($body_class); ?>>
<?php wp_body_open(); ?>
	<div class="wrapper">
		<!-- header of the page -->
		<header class="header">
			<div class="container">
				<div class="logo">
					<?php the_custom_logo();?>
				</div>
				<div class="nav-area">
					<?php if(has_nav_menu('menu-1')):?>
						<nav class="menu">
							<?php 
							wp_nav_menu( array('container' => false,
								'theme_location' => 'menu-1',
								'container_class' => 'menu',
								'items_wrap' => '<ul>%3$s</ul>') ); 
							?>
						</nav>
					<?php endif;?>
					<div class="user-area">
						<div class="language">
							<?php echo do_shortcode('[active_language]');?>
							<?php echo do_shortcode('[languages_list]');?>
						</div>
						<?php echo str_replace('href','class="login" href',wp_loginout(home_url('/'),false)); ?>
						<?php if(!is_user_logged_in()): ?>
							<a href="#" class="btn  modal-toggle">
								<span><?php _e('Join Us Today','aniway');?></span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<a href="#" class="nav-opener"><span></span></a>
		</header>