(function ($) {
	'use strict';

	let mediaFrame;

	$('#ct_logo_upload').on('click', function (event) {
		event.preventDefault();

		if (mediaFrame) {
			mediaFrame.open();
			return;
		}

		mediaFrame = wp.media({
			title: 'Select Logo',
			button: {
				text: 'Use this logo'
			},
			multiple: false,
			library: {
				type: 'image'
			}
		});

		mediaFrame.on('select', function () {
			const attachment = mediaFrame.state().get('selection').first().toJSON();
			$('#ct_logo_id').val(attachment.id);
			$('#ct_logo_preview').html('<img src="' + attachment.url + '" alt="Selected logo" style="max-width:150px;height:auto;display:block;">');
		});

		mediaFrame.open();
	});

	$('#ct_logo_remove').on('click', function (event) {
		event.preventDefault();
		$('#ct_logo_id').val('');
		$('#ct_logo_preview').empty();
	});
})(jQuery);
