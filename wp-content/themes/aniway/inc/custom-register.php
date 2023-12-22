<?php function aniway_registration_form() { ?>
    <div class="modal vb-registration-form">
        <form action="#" class="modal-register">
            <div class="cols">
                <div class="col">
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/modal-image.jpg" alt="Image Description">
                    </div>
                </div>
                <div class="col">
                    <a href="#" class="modal-close">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/close.svg" alt="Image" width="30">
                    </a>
                    <h2><?php _e('Create an Account','aniway');?></h2>
                    <div class="indicator" style="display:none"><?php _e('Please wait..','aniway');?></div>
                    <div class="alert result-message"></div>
                    <div class="input-holder">
                        <div class="input">
                            <input type="text" name="aniway_fname" id="aniway_fname" placeholder="<?php _e('First Name','aniway');?>">
                        </div>
                        <div class="input">
                            <input  name="aniway_lname" id="aniway_lname" type="text" placeholder="<?php _e('Last Name','aniway');?>">
                        </div>
                    </div>
                    <div class="input-holder">
                        <div class="input">
                            <input name="aniway_email" id="aniway_email" type="email" placeholder="<?php _e('Your Email','aniway');?>">
                        </div>
                    </div>
                    <div class="input-holder">
                        <div class="input">
                            <input name="aniway_pass" id="aniway_pass" type="password" placeholder="<?php _e('Password','aniway');?>">
                        </div>
                    </div>
                    <div class="input-holder">
                        <div class="input">
                            <input name="aniway_repass" id="aniway_repass" type="password" placeholder="<?php _e('Re-Password','aniway');?>">
                        </div>
                    </div>
                    <div class="input-holder">
                        <div class="input">
                            <label class="check-holder"><?php _e('I agree all statements in Terms of service','aniway');?>
                            <input type="checkbox" name="aniway_accept" value="1" required>
                            <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <?php wp_nonce_field('aniway_new_user','aniway_new_user_nonce', true, true ); ?>
                    <button type="submit" class="btn" id="btn-new-user"><span><?php _e('Join Now ','aniway');?></span></button>
                    <div class="info">
                        <p><?php _e('Have already an account? ','aniway');?><?php echo wp_loginout();?></p>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
    <?php
}
function aniway_register_user_scripts() {
    // Enqueue script
    wp_register_script('aniway_reg_script', get_template_directory_uri() . '/js/ajax-register.js', array('jquery'), null, false);
    wp_enqueue_script('aniway_reg_script');
    wp_localize_script( 'aniway_reg_script', 'aniway_reg_vars', array(
          'aniway_ajax_url' => admin_url( 'admin-ajax.php' ),
        )
    );
}
add_action('wp_enqueue_scripts', 'aniway_register_user_scripts', 100);
/**
 * New User registration
 *
 */
function aniway_reg_new_user() {
    // Verify nonce
    $lang = apply_filters( 'wpml_current_language', NULL );
    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'aniway_new_user' ) ){
        die( __('Ooops, something went wrong, please try again later.','aniway'));
    }
    // Post values
      $password = $_POST['pass'];
      $email    = $_POST['mail'];
      $fname     = $_POST['fname'];
      $lname     = $_POST['lname'];
      $agree     = $_POST['agree'];
    if($_POST['fname'] == ''){
        die( __('Please enter First Name','aniway') );
    }
    if($_POST['lname'] == ''){
        die( __('Please enter Last Name','aniway') );
    }
    if( empty( $_POST['pass'] )) {
        die( __('Please enter Password','aniway') );
    }
    if( strlen ($_POST['pass']) <  7){
        die( __('Password minimum should be minimum Eight Characters','aniway') );
    }
    if($_POST['pass'] != $_POST['repass'] ){
        die( __('Password and Re Enter should be Same','aniway'));
    }
    
      /**
       * IMPORTANT: You should make server side validation here!
       *
       */
      $userdata = array(
          'user_login' => $email,
          'user_pass'  => $password,
          'user_email' => $email,
          'first_name' => $fname,
          'last_name' => $lname,
          'nickname'   => $nick,
      );
      $user_id = wp_insert_user( $userdata ) ;
      // Return
      if( !is_wp_error($user_id) ) {
          echo '1';
      } else {
          echo $user_id->get_error_message();
      }
    die();
  }
  add_action('wp_ajax_register_user', 'aniway_reg_new_user');
  add_action('wp_ajax_nopriv_register_user', 'aniway_reg_new_user');