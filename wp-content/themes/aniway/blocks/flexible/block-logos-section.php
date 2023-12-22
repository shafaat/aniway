<!-- company-section -->
<?php $heading = get_sub_field( 'heading' ); ?>
<section class="company-section">
	<div class="container">
		<?php if($heading): ?>
			<div class="heading">
				<h2 class="h3"><?php echo $heading; ?></h2>
			</div>
		<?php endif; ?>
		<?php if(have_rows('logos')):?>
			<div class="section-marquee">
		        <div class="logos-holder">
		            <ul>
		            	<?php while(have_rows('logos')): the_row();?>
		            		<?php $logo = get_sub_field('logo', false);?>
		            	<li>
		                   <div class="image">
								<?php echo wp_get_attachment_image($logo,'full',false,false);?>
							</div>
		                </li>
		                <?php endwhile; ?>
		            </ul>
		        </div>
		    </div>
	    <?php endif; ?>
	</div>
</section>