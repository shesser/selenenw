//ToDo: Make sure this runs with $
jQuery(document).ready(function () {
    jQuery.post(
        selenenw_ajax.ajax_url,
        {
            action: 'selenenw_get_yacht_listing',
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
                        '<div class="price">Asking price  <strong>' + v.price + '$</strong></div>' +
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
});
