$(document).ready(function() {
    $('[data-fancybox="gallery"]').fancybox({
        caption: function(instance, item) {
            var caption = $(this).data('caption') || '';
            var alt = $(this).find('img').attr('alt');

            if (item.type === 'image') {
                caption = (caption.length ? caption + '<br />' : '') + alt;
            }

            return caption;
        }
    });
});