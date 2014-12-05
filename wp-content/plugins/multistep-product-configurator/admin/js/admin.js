jQuery(document).ready(function($) {

	var mediaUploader = null;

	$('#mspc-add-image').click(function(evt) {

		mediaUploader = wp.media({
            multiple: false
        });

		mediaUploader.on('select', function() {

			$('#mspc-image-url').val(mediaUploader.state().get('selection').toJSON()[0].url);

			mediaUploader = null;
        });

        mediaUploader.open();

		evt.preventDefault()

	});

});
