<?php
/**
 * Template Name: Home Template
 * A full-width template.
 *
 * @package 
 * @subpackage 
 */


get_header();?>
	
	<main class="main">
		<?php if(get_field('banner_bg_image')): ?>
			<?php get_template_part( 'blocks/block', 'banner' ); ?>
		<?php endif; ?>
		<?php if( have_rows('home_flexible_content') ):
			while ( have_rows('home_flexible_content') ) : the_row(); ?>
				 <?php get_template_part( 'blocks/flexible/block', get_row_layout() ); ?>
	    	<?php endwhile; ?>
		<?php endif; ?>
	</main>

<?php get_footer();