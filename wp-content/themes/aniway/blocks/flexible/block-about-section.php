<!-- about-section -->
<?php $heading = get_sub_field( 'heading' ); ?>
<?php $content = get_sub_field( 'content' ); ?>
<?php $button_label = get_sub_field( 'button_label' ); ?>
<?php $button_url = get_sub_field( 'button_url' ); ?>
<?php $bg_image = get_sub_field( 'bg_image', false ); ?>
<section class="about-section" id="about">
	<div class="container">
		<div class="tex-area">
			<?php if($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if($content): ?>
				<?php echo apply_filters('the_content', $content); ?>
			<?php endif; ?>
			<?php if($button_label && $button_url): ?>
				<a href="<?php echo esc_url( $button_url ); ?>" class="btn"><?php echo $button_label; ?></a>
			<?php endif; ?>
		</div>
		<div class="about-image">
			<?php if($bg_image): ?>
				<div class="img-wrap">
					<?php echo wp_get_attachment_image($bg_image,'full');?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>