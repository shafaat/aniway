<!-- feature section -->
<?php $top_heading = get_sub_field( 'top_heading' ); ?>
<?php $heading = get_sub_field( 'heading' ); ?>
<?php $sub_text = get_sub_field( 'sub_text' ); ?>
<?php $button_label = get_sub_field( 'button_label' ); ?>
<?php $button_url = get_sub_field( 'button_url' ); ?>
<?php $section_image = get_sub_field( 'section_image', false ); ?>
<section class="feature-section" id="features">
	<div class="container">
		<?php if($top_heading): ?>
			<strong class="title-head primary"><?php echo $top_heading; ?></strong>
		<?php endif; ?>
		<?php if($heading): ?>
			<h2><?php echo $heading; ?></h2>
		<?php endif; ?>
		<?php if($sub_text): ?>
			<?php echo apply_filters('the_content', $sub_text); ?>
		<?php endif; ?>
		<div class="twocols">
			<?php if($section_image): ?>
				<div class="image">
					<div class="img-frame">
						<?php echo wp_get_attachment_image($section_image,'full',false,false);?>
					</div>
				</div>
			<?php endif; ?>
			<div class="slide-area">
				<?php if(have_rows('features')):?>
				<div class="feedback-list">
					<?php while(have_rows('features')): the_row();?>
						<?php $feature_no = get_sub_field( 'feature_no' ); ?>
						<?php $heading = get_sub_field( 'heading' ); ?>
						<?php $content = get_sub_field( 'content' ); ?>
						<div class="item-slide">
							<?php if($feature_no): ?>
								<span class="number"><?php echo $feature_no; ?></span>
							<?php endif; ?>
							<?php if($heading): ?>
								<h4><?php echo $heading; ?></h4>
							<?php endif; ?>
							<?php if($content): ?>
								<?php echo apply_filters('the_content', $content); ?>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				</div>
				<?php endif; ?>
				<?php if($button_label && $button_url): ?>
				<a href="<?php echo esc_url( $button_url ); ?>" class="btn">
					<span><?php echo $button_label; ?></span>
					<span><img src="<?php echo get_template_directory_uri(); ?>/images/arrow.svg" alt="Image Description"></span>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>