jQuery(document).ready(function($) {
    
    // set context to customizer panel outside iframe site content is in
    var panel = $('html', window.parent.document);

    addLayoutThumbnails();
    addProlabel();

    // replaces radio buttons with images
    function addLayoutThumbnails() {

        // get layout inputs
        var layoutInputs = panel.find('#customize-control-layout, #customize-control-layout_posts, #customize-control-layout_pages, #customize-control-layout_archives, #customize-control-layout_search').find('input');

        // add the appropriate image to each label
        layoutInputs.each( function() {

            $(this).next().css('background-image', 'url("' + ct_chosen_pro_objectL10n.CHOSEN_PRO_URL + 'assets/images/' + $(this).val() + '.png")');

            // add initial 'selected' class
            if ( $(this).prop('checked') ) {
                $(this).next().addClass('selected');
            }
        });

        // watch for change of inputs (layouts)
        panel.on('click', '#customize-control-layout input, #customize-control-layout_posts input, #customize-control-layout_pages input, #customize-control-layout_archives input, #customize-control-layout_search input', function () {
            addSelectedLayoutClass(layoutInputs, $(this));
        });
    }

    // add the 'selected' class when a new input is selected
    function addSelectedLayoutClass(inputs, target) {

        // remove 'selected' class from all labels
        inputs.next().removeClass('selected');

        // apply 'selected' class to :checked input
        if ( target.prop('checked') ) {
            target.next().addClass('selected');
        }
    }

    // label Unlimited Pro customizer sections
    function addProlabel() {

        // to prevent running more than once per session
        if (!panel.hasClass('pro-labels')) {

            var sections = [ 'header_image', 'colors', 'layout', 'fonts', 'featured_image_size', 'display_controls', 'fixed_menu', 'footer_text', 'spacing' ];

            var proLabel = '<span class="pro-label">PRO</span>';

            $.each(sections, function (key, value) {
                if (value == 'colors' || value == 'layout' || value == 'display_controls' || value == 'fonts') {
                    panel.find('#accordion-panel-ct_chosen_pro_' + value + '_panel').children('h3').append(proLabel);
                }
                else {
                    panel.find('#accordion-section-ct_chosen_pro_' + value).children('h3').append(proLabel);
                }
            });
            panel.addClass('pro-labels');
        }
    }

    //----------------------------------------------------------------------------------
	// Fonts
    //----------------------------------------------------------------------------------
    
    // For storing the weights for each font
    var fontData = []
    // Select the basic and advanced font panels
    const fontPanels = panel.find('#sub-accordion-section-ct_chosen_pro_fonts, #sub-accordion-section-ct_chosen_pro_fonts_advanced');
    // Store all the font weight data in fontData
    $.getJSON("/wp-content/plugins/chosen-pro/assets/fonts.json", function (data) {
        // Create an associative array with font names as keys and their respective weights as values
        $.each(data['items'], function (index, value) {
            fontData[value.family] = value.variants;
            // Convert "regular" to 400
            if ( fontData[value.family].includes('regular') ) {
                const index = fontData[value.family].indexOf('regular');
                fontData[value.family][index] = '400';
            }
        });
        // Update weights in Customizer controls after data is stored
        updateAvailableFontWeights();
    });

    // Update the Customizer controls with the font weights available (or a single control)
    function updateAvailableFontWeights( control ) {
        var userUpdate = true;
        if ( typeof control === 'undefined' ) {
            control = '.customize-control'
            userUpdate = false;
        }
        // Get all the font weight Customizer controls
        fontPanels.find(control).each(function() {
            // If it's a weight control (not a family control)
            if ( $(this).attr('id').indexOf('weight') > 0 ) {
                // store the selected font
                const font = $(this).prev().find('select option:selected').val();
                // loop through all of the weight options
                $(this).find('select option').each( function() {
                    // hide weight controls that aren't one of the font's available weights
                    if ( $(this).val() != 'default' && font != 'default' ) {
                        if ( !fontData[font].includes( $(this).val() ) ) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    }
                    // reset to default if user just changed fonts
                    if ( userUpdate && $(this).val() == 'default') {
                        // change the value of the select element
                        $(this).parent().val($(this).val());
                        /**
                         * Calling change() triggers the Customizer API to save the new 400 value.
                         * This prevents the old CSS from being output so that the option doesn't say
                         * 'Regular' while outputting a different weight, for instance.
                         */
                        $(this).parent().change();
                    }
                });
            }
        });
    }

    // Update available weights when font family is changed
    fontPanels.find('.customize-control').each(function() {
        // If it's NOT a weight control (a family control)
        if ( $(this).attr('id').indexOf('weight') == -1 ) {
            // When a new font family is selected...
            const control = '#' + $(this).next().attr('id');
            $(this).find('select').on('change', function() {
                // Update the available font weights for this single control
                updateAvailableFontWeights(control);
            })
        }
    });

    // show/remove 'custom' class to highlight fonts/weights user has set
    function updateSelectClass(select) {
        if ( select.val() != 'default' ) {
            select.addClass('custom');
        } else {
            select.removeClass('custom');
        }  
    }
    // add 'custom' class to font family and weight controls and watch for live changes
    fontPanels.find('select').each(function() {
        updateSelectClass($(this))
        $(this).on('change', function() {
            updateSelectClass($(this))
        });
    });
});