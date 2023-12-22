<?php $top_heading = get_sub_field( 'top_heading' ); ?>
<?php $heading = get_sub_field( 'heading' ); ?>
<?php $content = get_sub_field( 'content' ); ?>
<?php $button_label = get_sub_field( 'button_label' ); ?>
<?php $button_url = get_sub_field( 'button_url' ); ?>
<?php $section_image = get_sub_field( 'section_image', false ); ?>
<section class="transport-section" id="partners">
	<div class="container">
		<div class="text-area">
			<?php if($top_heading): ?>
				<strong class="primary title-head"><?php echo $top_heading; ?></strong>
			<?php endif; ?>
			<?php if($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if($content): ?>
				<?php echo apply_filters('the_content', $content); ?>
			<?php endif; ?>
			<?php if($button_label && $button_url): ?>
				<a href="<?php echo esc_url( $button_url ); ?>" class="btn">
					<span><?php echo $button_label; ?></span>
				</a>
			<?php endif; ?>
		</div>
		<?php if($section_image): ?>
		<div class="image">
			<?php echo wp_get_attachment_image($section_image,'full',false,false);?>
		</div>
		<?php endif; ?>
	</div>
</section>