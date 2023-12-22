<!-- visual-section -->
<?php $banner_bg_image = get_field( 'banner_bg_image', false, false); ?>
<?php $banner_heading = get_field( 'banner_heading' ); ?>
<?php $button_label = get_field( 'button_label' ); ?>
<?php $button_url = get_field( 'button_url' ); ?>
<section class="visual-section">
	<div class="container">
		<div class="heading">
			<?php if($banner_heading): ?>
				<h1><?php echo strip_tags($banner_heading,'<span>'); ?> </h1>
			<?php endif; ?>
			<?php if($button_label && $button_url): ?>
				<a href="<?php echo esc_url( $button_url ); ?>" class="btn">
					<span><?php echo $button_label; ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<?php if($banner_bg_image): ?>
		<div class="visual-img">
			<?php echo wp_get_attachment_image($banner_bg_image,'full',false,false);?>
		</div>
	<?php endif; ?>
</section>