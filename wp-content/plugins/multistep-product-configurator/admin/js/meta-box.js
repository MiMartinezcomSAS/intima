jQuery(document).ready(function($) {

	$('#_mspc').change(function() {
		if($(this).is(':checked')) {
			$('.hide_if_mspc').show();
		}
		else {
			$('.hide_if_mspc').hide();
		}
	}).change();

});