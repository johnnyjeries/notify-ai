jQuery(document).ready(function($) {

    var body = $('body');
    var overflowContainer = $('#overflow-container');
    var headerImage = $('#header-image');

    headerImageParallax();

    $(window).on( 'resize', function(){
        headerImageParallax();
    });

    // add fitVids to featured videos
    $('.featured-video, .header-image.video').fitVids({
        customSelector: 'iframe[src*="dailymotion.com"], iframe[src*="slideshare.net"], iframe[src*="animoto.com"], iframe[src*="blip.tv"], iframe[src*="funnyordie.com"], iframe[src*="hulu.com"], iframe[src*="ted.com"], iframe[src*="vine.co"], iframe[src*="wordpress.tv"], iframe[src*="soundcloud.com"], iframe[src*="wistia.net"]'
    });

    // Jetpack infinite scroll event that reloads posts. Reapply fitvids to new featured videos
    $( document.body ).on( 'post-load', function () {

        // add fitVids to featured videos
        $('.featured-video, .header-image.video').fitVids({
            customSelector: 'iframe[src*="dailymotion.com"], iframe[src*="slideshare.net"], iframe[src*="animoto.com"], iframe[src*="blip.tv"], iframe[src*="funnyordie.com"], iframe[src*="hulu.com"], iframe[src*="ted.com"], iframe[src*="vine.co"], iframe[src*="wordpress.tv"], iframe[src*="soundcloud.com"], iframe[src*="wistia.net"]'
        });
    } );

    function headerImageParallax() {

        if ( body.hasClass('parallax') && headerImage.length ) {
            var height = headerImage.outerHeight();
            if ( body.hasClass('fixed-menu') ) {
                height += 84;
            }
            overflowContainer.css('margin-top', height + 'px');
        }
    }
});