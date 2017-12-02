(function( $ ) {
	'use strict';

	/**
	 * layout selector actions
	**/

	var layouts = function() {

		var layoutSelect = $('.taproot-metabox__setting--single-layout select'),
			sidebarSelect = $('.taproot-metabox__setting--single-sidebar');

		layoutSelect.on('change', function() {
			taprootUpdateSideBarMeta();
		});

		taprootUpdateSideBarMeta();

		function taprootUpdateSideBarMeta() {

			if( layoutSelect.val() == 'full' ) {
				sidebarSelect.slideUp();
			} else {
				sidebarSelect.slideDown();
			}
		}
	}; 

	/**
	 * Run on document ready
	**/

	$(document).ready(function() {
		layouts();
	});	


})( jQuery );
