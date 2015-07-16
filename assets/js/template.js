jQuery(document).ready(function() {

    jQuery('.shares').packery({
        itemSelector: '.shareItem',
    });

    jQuery('.shareCategories .js-shareCategory').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var categoryId = jQuery(this).data('categoryId');
        var shares = jQuery('.js-shares');

        var categories = [];
        if (categoryId != '-1' && categoryId > 0) {
            shares.children('.shareItem').each(function(index, el) {
                categories = jQuery(this).data('categories');
                if (categories.indexOf(categoryId) != -1) {
                    jQuery(this).show();
                } else {
                    jQuery(this).hide();
                }
            });
        } else {
            shares.children('.shareItem').show();
        }

        shares.packery();
        jQuery(this).parent().children('.btn').removeClass('active');
        jQuery(this).addClass('active');
    });
});