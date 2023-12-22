<?php $heading = get_sub_field( 'heading' ); ?>
<?php $sub_text = get_sub_field( 'sub_text' ); ?>
<?php $button_label = get_sub_field( 'button_label' ); ?>
<?php $button_url = get_sub_field( 'button_url' ); ?>
<section class="join-section">
	<div class="container">
		<div class="text-holder">
			<?php if($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if($sub_text): ?>
				<?php echo apply_filters('the_content', $sub_text); ?>
			<?php endif; ?>
			<?php if($button_label && $button_url): ?>
				<a href="<?php echo esc_url( $button_url ); ?>" class="btn white">
					<span><?php echo $button_label; ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</section>