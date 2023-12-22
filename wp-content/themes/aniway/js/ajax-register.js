jQuery(document).ready(function(jQuery) {
  /**
   * When user clicks on button...
   *
   */
  jQuery('#btn-new-user').click( function(event) {
    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
     // Show 'Please wait' loader to user, so she/he knows something is going on
    jQuery('.indicator').show();
 
    // If for some reason result field is visible hide it
    jQuery('.result-message').hide();
 
    // Collect data from inputs
    var reg_nonce = jQuery('#aniway_new_user_nonce').val();
    var reg_user  = jQuery('#aniway_username').val();
    var reg_pass  = jQuery('#aniway_pass').val();
    var reg_repass  = jQuery('#aniway_repass').val();
    var reg_mail  = jQuery('#aniway_email').val();
    var reg_fname  = jQuery('#aniway_fname').val();
    var reg_lname  = jQuery('#aniway_lname').val();
    var reg_accept  = jQuery('#aniway_accept').prop("checked");
    
 
    /**
     * AJAX URL where to send data
     * (from localize_script)
     */
    var ajax_url = aniway_reg_vars.aniway_ajax_url;
 
    // Data to send
    data = {
      action: 'register_user',
      nonce: reg_nonce,
      user: reg_user,
      pass: reg_pass,
      repass: reg_repass,
      mail: reg_mail,
      fname: reg_fname,
      lname: reg_lname,
      agree: reg_accept,
    };
 
    // Do AJAX request
    jQuery.post( ajax_url, data, function(response) {
 
      // If we have response
      if( response ) {
 
        // Hide 'Please wait' indicator
        jQuery('.indicator').hide();
 
        if( response === '1' ) {
          // If user is created
          jQuery('.result-message').html('Your submission is complete.'); // Add success message to results div
          jQuery('.result-message').addClass('alert-success'); // Add class success to results div
          jQuery('.result-message').show(); // Show results div
        } else {
          jQuery('.result-message').html( response ); // If there was an error, display it in results div
          jQuery('.result-message').addClass('alert-danger'); // Add class failed to results div
          jQuery('.result-message').show(); // Show results div
        }
      }
    });
 
  });
});