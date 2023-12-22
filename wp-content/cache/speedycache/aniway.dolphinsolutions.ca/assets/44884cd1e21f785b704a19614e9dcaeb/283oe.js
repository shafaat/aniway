jQuery(document).ready(function(jQuery){
jQuery('#btn-new-user').click(function(event){
if(event.preventDefault){
event.preventDefault();
}else{
event.returnValue=false;
}
jQuery('.indicator').show();
jQuery('.result-message').hide();
var reg_nonce=jQuery('#aniway_new_user_nonce').val();
var reg_user=jQuery('#aniway_username').val();
var reg_pass=jQuery('#aniway_pass').val();
var reg_repass=jQuery('#aniway_repass').val();
var reg_mail=jQuery('#aniway_email').val();
var reg_fname=jQuery('#aniway_fname').val();
var reg_lname=jQuery('#aniway_lname').val();
var reg_accept=jQuery('#aniway_accept').prop("checked");
var ajax_url=aniway_reg_vars.aniway_ajax_url;
data={
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
jQuery.post(ajax_url, data, function(response){
if(response){
jQuery('.indicator').hide();
if(response==='1'){
jQuery('.result-message').html('Your submission is complete.');
jQuery('.result-message').addClass('alert-success');
jQuery('.result-message').show();
}else{
jQuery('.result-message').html(response);
jQuery('.result-message').addClass('alert-danger');
jQuery('.result-message').show();
}}
});
});
});