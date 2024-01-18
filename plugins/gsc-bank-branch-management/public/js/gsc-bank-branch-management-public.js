jQuery(document).on('change',"#gsc-branch-selection",function(){
	if( !jQuery(this).val() ){
		jQuery(".gsc-bank-branch").show();
	} else {
		jQuery(".gsc-bank-branch").hide();
		jQuery("#gsc-bank-branch-" + jQuery(this).val() ).show();
	}
});