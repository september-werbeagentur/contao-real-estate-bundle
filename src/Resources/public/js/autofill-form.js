
$( document ).ready(function() {
	
	if($('#contact_footer .ce_form').length >= 1 && $('.swa-apartment-reader__appartment-full-name').length >= 1){
		$('#contact_footer .ce_form input[name=wohnung]').val($('.swa-apartment-reader__appartment-full-name')[0].innerText);
		$('#contact_footer .ce_form input[name=wohnung]').prop('readonly', true);
		
		if($('.swa-apartment-reader__project-name').length >= 1){
			$('#contact_footer .ce_form input[name=quartier]').val($('.swa-apartment-reader__project-name')[0].innerText);
			$('#contact_footer .ce_form input[name=quartier]').prop('readonly', true);
		}
	}else if($('#contact_footer .ce_form').length >= 1 && $('.swa-property-reader__title').length >= 1){
		$('#contact_footer .ce_form input[name=quartier]').val($('.swa-property-reader__title')[0].innerText);
		$('#contact_footer .ce_form input[name=quartier]').prop('readonly', true);
	}
});