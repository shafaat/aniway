<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aniway
 */

?>
			<footer class="footer">
				<div class="container">
					<div class="footer-info">
						<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
					</div>
					<div class="footer-content">
						<ul class="col accordion">
							<li class="active">
								<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
							</li>
						</ul>
						<ul class="col accordion">
							<li>
								<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
							</li>
						</ul>
						<ul class="col accordion">
							<li>
								<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
							</li>
						</ul>
					</div>
					<?php $facebook = get_field('facebook','option');?>
					<?php $twitter = get_field('twitter','option');?>
					<?php $youtube = get_field('youtube','option');?>
					<?php $instagram = get_field('instagram','option');?>
					<?php if($facebook || $twitter || $youtube || $instagram):?>
					<div class="footer-info mobile">
						<strong class="title"><?php _e('Follow us','aniway');?></strong>
						<ul class="social">
							<?php if($facebook):?>
								<li><a target="_blank" href="<?php echo esc_url($facebook); ?>"><img src="<?php echo get_template_directory_uri()?>/images/facebook.svg" alt="facebook"></a></li>
							<?php endif;?>
							<?php if($twitter):?>
								<li><a target="_blank" href="<?php echo esc_url($twitter); ?>"><img src="<?php echo get_template_directory_uri()?>/images/twitter.svg" alt="twitter"></a></li>
							<?php endif;?>
							<?php if($youtube):?>
								<li><a target="_blank" href="<?php echo esc_url($youtube); ?>"><img src="<?php echo get_template_directory_uri()?>/images/youtube.svg" alt="youtube"></a></li>
							<?php endif;?>
							<?php if($instagram):?>
								<li><a target="_blank" href="<?php echo esc_url($instagram); ?>"><img src="<?php echo get_template_directory_uri()?>/images/instagram.svg" alt="instagram"></a></li>
							<?php endif;?>
						</ul>
					</div>
					<?php endif;?>
				</div>
				<div class="copyright">
					<div class="holder">
						<p><?php _e('©','aniway') ?> <?php echo date('Y');?> <?php _e('Aniway. All Rights Reserved','aniway') ?></p>
						<div class="language">
							<?php echo do_shortcode('[active_language]');?>
							<?php echo do_shortcode('[languages_list]');?>
						</div>
					</div>
				</div>
			</footer>
			<?php if(!is_user_logged_in()) echo aniway_registration_form();?>
		</div>
		<?php wp_footer(); ?>
		<script type="text/javascript">
			jQuery('#register-button').on('click',function(e){
				e.preventDefault();
				var newUserName = jQuery('#new-username').val();
				var newUserEmail = jQuery('#new-useremail').val();
				var newUserPassword = jQuery('#new-userpassword').val();
				jQuery.ajax({
				type:"POST",
				url:"<?php echo admin_url('admin-ajax.php'); ?>",
				data: {
					action: "register_user_front_end",
					new_user_name : newUserName,
					new_user_email : newUserEmail,
					new_user_password : newUserPassword
				},
				success: function(results){
					console.log(results);
					jQuery('.register-message').text(results).show();
				},
				error: function(results) {
				}
				});
			});
    	</script>
	</body>
</html>