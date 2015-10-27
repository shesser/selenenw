//ToDo: Make sure this runs with $
jQuery(document).ready(function () {
    jQuery('[name="year-filter"]').click(function () {
        if(jQuery('[name="year-filter"]:checked').length > 1) {
            var checkedValue = jQuery(this).val();
            jQuery.each(jQuery('[name="year-filter"]'), function() {
                if(jQuery(this).val() != checkedValue) {
                    jQuery(this).attr('checked', false);
                    jQuery(this).parent().removeClass('checked');
                }
            });
        }
        loadYachts ();
    });

    jQuery('[name="listing-filter"]').click(function () {
        if(jQuery('[name="listing-filter"]:checked').length > 1) {
            var checkedValue = jQuery(this).val();
            jQuery.each(jQuery('[name="listing-filter"]'), function() {
                if(jQuery(this).val() != checkedValue) {
                    jQuery(this).attr('checked', false);
                    jQuery(this).parent().removeClass('checked');
                }
            });
        }
        loadYachts ();
    });

    jQuery('#sort-filter').change(function () {
        loadYachts ();
    });
});

function loadYachts () {
    jQuery('#yacht-listing-load').show();

    var listing = (typeof jQuery('[name="listing-filter"]:checked').val() != 'undefined') ? jQuery('[name="listing-filter"]:checked').val() : 0;
    var built = (typeof jQuery('[name="year-filter"]:checked').val() != 'undefined') ? jQuery('[name="year-filter"]:checked').val() : 0;
    var sort = (typeof jQuery('#sort-filter').val() != 'undefined') ? jQuery('#sort-filter').val() : 0;

    jQuery.post(
        selenenw_ajax.ajax_url,
        {
            action: 'selenenw_get_yacht_listing',
            listing: listing,
            built: built,
            sort: sort,
        }, function(data) {
            //console.log(data);
            var listing = '';
            var tapLink = '';
            jQuery.each(data, function(i, v) {
                if ( jQuery(window).width() <= 1024 )
                    tapLink = 'onclick="javascript:window.location.href=\'' + v.url + '\'; return false;"';

                listing += '<!-- Item -->' +
                    '<figure class="one-fourth item" ' + tapLink + '>' +
                    '<img src="' + v.primary_image + '" alt="' + v.name + '" />' +
                    '<div class="item-bottom-strip"><h1>' + v.name + '</h1></div>'
                    '<figcaption>' +
                    '<dl>' +
                    '<dt>' + v.name + '</dt>' +
                    '<dd>Built: ' + v.built + '</dd>' +
                    '<dd>Length: ' + v.length + '</dd>' +
                    '</dl>' +
                    '<div class="price">Asking price  <strong>$' + v.price + '</strong></div>' +
                    '<a href="' + v.url + '" title="" class="button small gold">Learn more</a>' +
                    '</figcaption>' +
                    '</figure>' +
                    '<!-- //Item -->';
            });

            jQuery('.results.offset').html( listing );
            jQuery('#yacht-listing-load').fadeOut();
        }, "json"
    ) .fail(function() {
            alert('Oops! there was an error. Please try again.');
        }
    );
}

function loadModels () {
    jQuery('#yacht-listing-load').show();

    jQuery.post(
        selenenw_ajax.ajax_url,
        {
            action: 'selenenw_get_model_listing',
        }, function(data) {
            var listing = '';
            var tapLink = '';
            jQuery.each(data, function(i, v) {
                if ( jQuery(window).width() <= 1024 )
                    tapLink = 'onclick="javascript:window.location.href=\'' + v.url + '\'; return false;"';

                listing += '<!-- Item -->' +
                    '<figure class="one-fourth item" ' + tapLink + '>' +
                    '<img src="' + v.primary_image + '" alt="' + v.name + '" />' +
                    '<figcaption>' +
                    '<dl>' +
                    '<dt>' + v.name + '</dt>' +
                    
                    '</dl>' +
                    '<a href="' + v.url + '" title="" class="button small gold">Learn more</a>' +
                    '</figcaption>' +
                    '</figure>' +
                    '<!-- //Item -->';
            });

            jQuery('.results').html( listing );
            jQuery('#yacht-listing-load').fadeOut();
        }, "json"
    ) .fail(function() {
            alert('Oops! there was an error. Please try again.');
        }
    );
}