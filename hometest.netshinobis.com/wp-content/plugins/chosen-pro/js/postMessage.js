( function( $ ) {

    // establish variables for common site elements
    var panel = $('html', window.parent.document);
    var body = $('body');
    var overflowContainer = $('#overflow-container');
    var siteTitle = $('#site-title');
    var tagline = $('.tagline');
    var menuPrimary = $('#menu-primary');
    var toggleNavigation = $('#toggle-navigation');
    var postTitle = $('.post-title');
    var postDate = $('.post-date');
    var moreLink = $('.more-link');
    var postCategories = $('.post-categories');
    var postTags = $('.post-tags, .post-meta .tags');
    var postNav = $('.further-reading');
    var commentsNumber = $('.comments-number');
    var commentsLink = $('.comments-link');
    var commentsDate = $('.comment-date');
    var commentReplyLink = $('.comment-reply-link');
    var archiveTitle = $('.archive-header');
    var siteFooter = $('.site-footer');

    // header image height
    wp.customize( 'header_image_height', function( value ) {
        value.bind( function( to ) {

            var headerType = panel.find('#customize-control-header_image_height_type').find('input:checked').val();

            if( headerType == 'fixed' ) {
                $('#header-image').css( {
                    'height'         : to * 5,
                    'padding-bottom' : 0
                });
            } else {
                $('#header-image').css( {
                    'padding-bottom' : to + '%',
                    'height'         : 0
                });
            }
            if ( body.hasClass('parallax') ) {
                overflowContainer.css('margin-top', $('#header-image').outerHeight() + 'px');
            }
        } );
    } );

    /***** Layout *****/

    const layouts = ['layout', 'layout_posts', 'layout_pages', 'layout_archives', 'layout_search'];
    layouts.forEach(function(layout) {
        wp.customize( layout, function( value ) {
            if ( 
                layout == 'layout' && body.hasClass('blog') 
                || layout == 'layout_posts' && body.hasClass('single-post') 
                || layout == 'layout_pages' && body.hasClass('page') 
                || layout == 'layout_archives' && body.hasClass('archive') 
                || layout == 'layout_search' && body.hasClass('search') 
            ) {
                value.bind( function( to ) {

                    // remove existing layout class
                    body.removeClass('two-column one-column right-sidebar left-sidebar two-right two-left three-column');

                    // add new class
                    body.addClass( to );

                    // if two-column layout, add trigger to rebuild layout
                    if ( to == 'two-left' || to == 'two-right' || to == 'two-narrow' || to == 'two-wide' ) {
                        body.trigger('layout-change');
                    }
                } );
            }
        } );
    });

    /***** Display Controls *****/

    wp.customize( 'display_site_title', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                siteTitle.css('display', 'none');
            } else {
                siteTitle.css('display', 'block');
            }
        } );
    } );
    wp.customize( 'display_tagline', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                tagline.css('display', 'none');
            } else {
                tagline.css('display', 'block');
            }
        } );
    } );
    wp.customize( 'display_primary_menu', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                menuPrimary.css('display', 'none');
                toggleNavigation.addClass('hide').removeClass('show');
            } else {
                menuPrimary.css('display', 'block');
                toggleNavigation.addClass('show').removeClass('hide');
            }
        } );
    } );
    wp.customize( 'display_post_title', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                postTitle.css('display', 'none');
            } else {
                postTitle.css('display', 'block');
            }
        } );
    } );
    wp.customize( 'display_post_date', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                postDate.css('display', 'none');
            } else {
                postDate.css('display', 'inline-block');
            }
        } );
    } );
    wp.customize( 'display_more_link', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                moreLink.css('display', 'none');
            } else {
                moreLink.css('display', 'inline-block');
            }
        } );
    } );
    wp.customize( 'display_comments_link', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                commentsLink.css('display', 'none');
                moreLink.css('margin-right', 0);
            } else {
                commentsLink.css('display', 'inline-block');
                moreLink.css('margin-right', 12);
            }
        } );
    } );
    wp.customize( 'display_post_categories', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                postCategories.css('display', 'none');
            } else {
                postCategories.css('display', 'inline-block');
            }
        } );
    } );
    wp.customize( 'display_post_tags', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                postTags.css('display', 'none');
            } else {
                postTags.css('display', 'inline-block');
            }
        } );
    } );
    wp.customize( 'display_post_nav', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                postNav.css('display', 'none');
            } else {
                postNav.css('display', 'block');
            }
        } );
    } );
    wp.customize( 'display_comment_count', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                commentsNumber.css('display', 'none');
            } else {
                commentsNumber.css('display', 'block');
            }
        } );
    } );
    wp.customize( 'display_comment_date', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                commentsDate.css('display', 'none');
                commentReplyLink.addClass('hide');
                commentReplyLink.removeClass('show');
            } else {
                commentsDate.css('display', 'inline-block');
                commentReplyLink.removeClass('hide');
                commentReplyLink.addClass('show');
            }
        } );
    } );
    wp.customize( 'display_archive_title', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                archiveTitle.css('display', 'none');
            } else {
                archiveTitle.css('display', 'block');
            }
        } );
    } );
    wp.customize( 'display_footer', function( value ) {
        value.bind( function( to ) {
            if ( to == 'hide' ) {
                siteFooter.css('display', 'none');
            } else {
                siteFooter.css('display', 'block');
            }
        } );
    } );

    /* Footer Text */
    wp.customize( 'footer_text', function( value ) {
        value.bind( function( to ) {
            if ( to == '' ) {
                to = '<a target="_blank" href="https://www.competethemes.com/chosen/">Chosen WordPress Theme</a> by Compete Themes.';
            }
            $('.design-credit').children('span').html(to);
        });
    } );

} )( jQuery );