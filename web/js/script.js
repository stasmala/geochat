jQuery(function ($) {

	$('.subjects-block').on('change', 'input[name=subjects]', function(){
		if ($(this).is(':checked')) {
			console.log('csdc');
		}
	})
	/*jQuery.on('change', '#subjects', function() {
		alert('sdcdsc');
	});*/
	//alert('ok');
});