jQuery(document).on('click','.adc-offers-filter .show-more-btn', function(){
	if( jQuery(this).hasClass('hiding') ){
		jQuery('.adc-brands .adc-brand').show();
		jQuery(this).removeClass('hiding').addClass('showing');
		jQuery(this).text('Hide');
		jQuery(this).append('<i class="pl-2 fa fa-chevron-up"></i>');
	} else {
		jQuery('.adc-brands .adc-brand').hide();
		jQuery('.adc-brands .adc-brand:eq(0), .adc-brands .adc-brand:eq(1), .adc-brands .adc-brand:eq(2)').show();
		jQuery(this).removeClass('showing').addClass('hiding');
		jQuery(this).text(jQuery(this).data('label'));
		jQuery(this).append('<i class="pl-2 fa fa-chevron-down"></i>');
	}
});

jQuery(document).on('change','.adc_tag, .adc_brand',function(){
	location.href = getURL();
});

function getTags(){
	var tags = [];
	jQuery('.adc_tag:checked').each(function(){
		tags.push( jQuery(this).val() );
	});
	return tags;
}

function getBrands(){
	var brands = [];
	jQuery('.adc_brand:checked').each(function(){
		brands.push( jQuery(this).val() );
	});
	return brands;
}



function getURL(){
	var tags = getTags();

	var brands = getBrands();

	var url = location.protocol + '//' + location.host + location.pathname + '?';
	if( tags.length > 0 ){
		for(var i=0;i<tags.length;i++){
			url += 'tags[]=' + tags[i] + '&';
		}
	}

	if( brands.length > 0 ){
		for(var i=0;i<brands.length;i++){
			url += 'brands[]=' + brands[i] + '&';
		}
	}

	if( getCategory() ){
		url += 'category=' + getCategory();
	}

	return url;
}



jQuery(document).on('click','.clear-all-btn', function(){
	jQuery('.adc_cat.active').removeClass('active');
	jQuery('.adc_tag:checked').each(function(){
		jQuery(this).removeAttr('checked');
	});
	jQuery('.adc_brand:checked').each(function(){
		jQuery(this).removeAttr('checked');
	});
	location.href = getURL();
});