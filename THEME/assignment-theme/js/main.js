/**
 * File main.js.
 *
 * Contains majority of the theme scripts
 */
( function( $ ) {
    
    // directory uri
    template_directory = directory_name.templateUrl;

    // portfolio view image handler
    $( '#portfolio-wrapper .view-image' ).on('click', function() 
    {
        $img_src = $(this).next().find('img').attr('src');
        // clone the title of the portfolio that was clicked on and append it to our container
        $title_div = $(this).next().next().clone();

        $img = $('#view-image-container .content-wrapper img');

        // make the container visible
        $('#view-image-container').css('display', 'flex');

        // append the title 
        $('#view-image-container .content-wrapper').append($title_div);
        // set image src
        $img.attr('src', $img_src);
    });

    // portfolio close view-image
    $('#view-image-container .close').on('click', function() 
    {
        // remove post-title div first
        $(this).next().remove();
        // then hide the whole container
        $(this).parent().parent().css('display', 'none');
    });

    // all image hover effects
    $('#header-search-button').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/search-icon-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/search-icon-1.png');
    });

    $('#feature-image-1').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/feature-icons-advertising-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/feature-icons-advertising.png');
    });

    $('#feature-image-2').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/feature-icons-multimedia-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/feature-icons-multimedia.png');
    });

    $('#feature-image-3').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/feature-icons-photography-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/feature-icons-photography.png');
    });

    $('#facebook').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/facebook-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/facebook.png');
    });

    $('#linkedin').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/linkedin-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/linkedin.png');
    });

    $('#pinterest').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/pinterest-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/pinterest.png');
    });

    $('#twitter').hover( function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/twitter-hover.png');
    }, function() {
        $(this).attr('src', template_directory + '/assets/image/social_media/twitter.png');
    });

}) ( jQuery );

