jQuery(document).ready(function ($) {

	// Re-write Custom Field Suite Loop Names

	$.fn.phoneMask = function(label) {
		$('label:contains(' + label + ')').next('.cfs_text').find('input').mask("(999) 999-9999");
	};

	$('body').phoneMask('Phone');
	$('body').phoneMask('Cell');
	$('body').phoneMask('Fax');

});