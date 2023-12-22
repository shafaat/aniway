<?php $top_heading = get_sub_field( 'top_heading' ); ?>
<?php $heading = get_sub_field( 'heading' ); ?>
<section class="services-section" id="services">
	<div class="container">
		<div class="heading">
			<?php if($top_heading): ?>
				<strong class="primary title-head"><?php echo $top_heading; ?></strong>
			<?php endif; ?>
			<?php if($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
		</div>
		<?php if(have_rows('services')):?>
		<div class="cards">
			<?php while(have_rows('services')): the_row();?>
				<?php $heading = get_sub_field( 'heading' ); ?>
				<?php $content = get_sub_field( 'content' ); ?>
				<?php $icon = get_sub_field('icon', false);?>
				<div class="card">
					<div class="cardimage"><?php echo wp_get_attachment_image($icon,'full',false,false);?></div>
					<h3><?php echo $heading; ?></h3>
					<?php echo apply_filters('the_content', $content); ?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>