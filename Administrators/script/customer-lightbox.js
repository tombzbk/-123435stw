$(document).ready(function ($) {
    // delegate calls to data-toggle="lightbox"

    $(document).delegate('*[data-toggle="r-lightbox-slider"]:not([data-gallery="navigateTo"])', 'click', function (event) {

        event.preventDefault();

        return $(this).ekkoLightbox({
            onShown: function () {

                if (window.console) {

                    return console.log('Checking our the events huh?');

                }

            },
            onNavigate: function (direction, itemIndex) {

                if (window.console) {

                    return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);

                }

            }

        });

    });

});