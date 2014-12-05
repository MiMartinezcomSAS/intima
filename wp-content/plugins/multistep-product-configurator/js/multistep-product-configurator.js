jQuery(document).ready(function() {

	var $wrapper = jQuery('.mspc-wrapper'),
		$menuItems = $wrapper.find('.mspc-menu-item'),
		$content = $wrapper.find('.mspc-content'),
		$variationItems = jQuery('.mspc-variation'),
		$variationForm = jQuery('.variations_form'),
		$selectVariations = $variationForm.find('.variations select');

	jQuery('.mspc-clear-selection').click(function(evt) {

		$variationItems.removeClass('active').show().find('input[type="radio"]').prop('checked', false);
		$variationForm.find('.reset_variations').click();
		$menuItems.removeClass('active').first().removeClass('disabled').click().addClass('active');

		_menuItemsState();

		evt.preventDefault();

	});

	$variationItems.click(function() {

		var $this = jQuery(this);
		$this.parents('.mspc-variations').find('.mspc-variation').removeClass('active');
		$this.addClass('active').find('input[type="radio"]').prop('checked', true).change();

	});

	//set default checked radio buttons
	$selectVariations.each(function(i, item) {

		jQuery('input[name="'+this.id+'"]')
		.filter('[value="'+jQuery(this).val()+'"]')
		.parents('.mspc-variation').click();

	});


	//radio changed, update select boxes
	$content.find('input[type="radio"]').change(function() {

		var selectName = this.name,
			$selectBox = jQuery('select#'+selectName);

		//set select value
		$selectBox.focusin().val(this.value).change();

		_menuItemsState();

		if($wrapper.hasClass('mspc-auto-next')) {
			jQuery('.mspc-menu-item.active').nextAll('.mspc-menu-item:first').click();
		}


	});

	$menuItems.click(function(evt) {

		var $this = jQuery(this),
			selectId = $this.data('target').replace('.mspc-', ''),
			$select = jQuery('select#'+selectId+'').focusin();

		if($this.hasClass('disabled')) {
			return false;
		}

		//hide all variation items
		if($select.children('option.active').size() > 0)  {
			$variationItems.find('input[type="radio"]')
			.filter('[name="'+selectId+'"]')
			.parents('.mspc-variation').hide();
		}

		//loop through all active option and show corresponding variation item
		$select.children('option.active').each(function(i, option) {

			var $option = jQuery(option),
				selectId = $option.parent('select').attr('id');

			$variationItems.find('input[type="radio"]') //all radio buttons in variations
			.filter('[name="'+selectId+'"]') //filter by name
			.filter('[value="'+option.value+'"]') //filter by value
			.parents('.mspc-variation:first').show() //show variation


		});

		if($wrapper.find('.mspc-accordion').size() > 0) {

			//accordion
			if( !$this.hasClass('active') ) {

				$menuItems.children('.icon').removeClass('minus').addClass('add');
				$this.children('.icon').removeClass('add').addClass('minus');

				var time = 300;
				$content.slideUp(time);
				$this.next('.mspc-content:first').delay(time).slideDown(time);

			}

		}
		else {

			//steps, tabs
			$content.find('.mspc-variations').hide();
			jQuery($this.data('target')).show();

		}

		$menuItems.removeClass('active');
		$this.addClass('active');


		evt.preventDefault();

	});

	//delay to update select boxes
	setTimeout(function() {
		$menuItems.first().click();
	}, 1);

	function _menuItemsState() {

		if($wrapper.hasClass('mspc-step-by-step')) {

			$menuItems.filter(':not(.active,:first)').addClass('disabled');

			$selectVariations.each(function(i, item) {

				if(this.value && this.value != '') {

					$menuItems.filter('[data-target=".mspc-'+this.id+'"]')
					.nextAll('.mspc-menu-item:first').removeClass('disabled');

				}

			});

		}

	}

	//$menuItems.first().click().addClass('active');

	//_menuItemsState();

});