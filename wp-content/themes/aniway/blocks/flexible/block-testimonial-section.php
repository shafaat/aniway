<?php $top_heading = get_sub_field( 'top_heading' ); ?>
<?php $heading = get_sub_field( 'heading' ); ?>
<?php $button_label = get_sub_field( 'button_label' ); ?>
<?php $button_url = get_sub_field( 'button_url' ); ?>
<?php $no_of_testimonial = get_sub_field( 'no_of_testimonial' ); ?>
<?php $args = array(  
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'showposts' => $no_of_testimonial , 
);
$loop = new WP_Query( $args );
if($loop->have_posts()): ?>
<section class="testimonials">
	<div class="container">
		<div class="heading">
			<?php if($top_heading): ?>
				<strong class="title-head primary"><?php echo $top_heading; ?></strong>
			<?php endif; ?>
			<?php if($heading): ?>
				<h2><?php echo $heading; ?></h2>
			<?php endif; ?>
			<?php if($button_label && $button_url): ?>
				<a href="<?php echo esc_url( $button_url ); ?>" class="btn">
					<span><?php echo $button_label; ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="cards-slider container">
		<?php while ( $loop->have_posts() ): $loop->the_post();?>
			<?php $designation = get_field( 'designation' ); ?>
			<div class="slide">
				<div class="card">
					<?php the_content();?>
					<div class="profile">
						<span class="img">
							<?php the_post_thumbnail();?>
						</span>
						<div class="text">
							<strong class="name"><?php the_title(); ?></strong>
							<span class="designation"><?php echo $designation; ?></span>
						</div>
					</div>
				</div>
			</div>
	    <?php endwhile; ?>
	</div>
</section>
<?php endif;?>
<?php wp_reset_postdata(); ?>