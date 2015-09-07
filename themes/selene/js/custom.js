//ToDo: Make sure this runs with $
jQuery(document).ready(function () {
    loadYachts ();

    function loadYachts () {
        jQuery('#yacht-listing-load').show();

        var built = (typeof jQuery('[name="year-filter"]:checked').val() != 'undefined') ? jQuery('[name="year-filter"]:checked').val() : 0;
        var sort = (typeof jQuery('#sort-filter').val() != 'undefined') ? jQuery('#sort-filter').val() : 0;

        jQuery.post(
            selenenw_ajax.ajax_url,
            {
                action: 'selenenw_get_yacht_listing',
                built: built,
                sort: sort,
            }, function(data) {
                //console.log(data);
                var listing = '';
                jQuery.each(data, function(i, v) {
                    listing += '<!-- Item -->' +
                        '<figure class="one-fourth item">' +
                        '<img src="' + v.primary_image + '" alt="" />' +
                        '<figcaption>' +
                        '<dl>' +
                        '<dt>' + v.name + '</dt>' +
                        '<dd>Built: ' + v.built + '</dd>' +
                        '<dd>Length: ' + v.length + '</dd>' +
                        '</dl>' +
                        '<div class="price">Asking price  <strong>$' + v.price + '</strong></div>' +
                        '<a href="' + v.url + '" title="" class="button small gold">Read more</a>' +
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

    jQuery('#sort-filter').change(function () {
        loadYachts ();
    });
});
