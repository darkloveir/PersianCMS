/*
 * MWS Admin v2.1 - Form Elements Demo JS
 * This file is part of MWS Admin, an Admin template build for sale at ThemeForest.
 * All copyright to this file is hold by Mairel Theafila <maimairel@yahoo.com> a.k.a nagaemas on ThemeForest.
 * Last Updated:
 * December 08, 2012
 *
 */

;(function( $, window, document, undefined ) {

    $(document).ready(function() {

        // PickList
        $.fn.pickList && $('#pickList').pickList();

        // CLEditor
        $.fn.cleditor && $( '#cleditor').cleditor({ width: '100%' });

        // AutoSize
        $.fn.autosize && $( '.autosize' ).autosize();

        // jQuery-UI Autocomplete
        if( $.fn.autocomplete ) {
            var availableTags = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"];
            $(".autocomplete").autocomplete({
                source: availableTags
            });
        }

        // ColorPicker
        if( $.fn.ColorPicker ) {
            $(".colorpicker").ColorPicker({
                onSubmit: function (hsb, hex, rgb, el) {
                    $(el).val(hex);
                    $(el).ColorPickerHide();
                },
                onBeforeShow: function () {
                    $(this).ColorPickerSetColor(this.value);
                }
            });
        }

        if( $.fn.spinner ) {

            $('.spinner').spinner();

            $('.spinner-decimal').spinner({
                step: 0.01,
                numberFormat: "n"
            });

            $.widget( "ui.timespinner", $.ui.spinner, {
                options: {
                    // seconds
                    step: 60 * 1000,
                    // hours
                    page: 60
                },
         
                _parse: function( value ) {
                    if ( typeof value === "string" ) {
                        // already a timestamp
                        if ( Number( value ) == value ) {
                            return Number( value );
                        }
                        return +Globalize.parseDate( value );
                    }
                    return value;
                },
         
                _format: function( value ) {
                    return Globalize.format( new Date(value), "t" );
                }
            });

            $( ".spinner-time" ).timespinner({
                value: new Date().getTime()
            });
        }

        /* Chosen Select Box Plugin */
        if( $.fn.select2 ) {
            $("select.select2").select2();
        }

        $.fn.iButton && $('.ibutton').iButton();

        // Validation
        if( $.validator ) {
            $("#validate").validate({
                rules: {
                    spinner: {
                        required: true,
                        max: 5
                    }
                },
                invalidHandler: function (form, validator) {
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                        var message = errors == 1 ? 'شما 1 فیلد را جا ضروری را جا گذاشتید. آنها مشخص شدند.' : 'شما ' + errors + ' فیلد ضروری را جا گذاشتید. آنها مشخص شدند.';
                        $("#validate-error").html(message).show();
                    } else {
                        $("#validate-error").hide();
                    }
                }
            });

            /* Form Wizard */
            var v = $("#wizard-form").validate({
                onsubmit: false
            });
            if ($.fn.mwsWizard) {
                $("#wizard-form").mwsWizard({
                    forwardOnly: false,
                    onLeaveStep: function (index, elem) {
                        return v.form();
                    },
                    onBeforeSubmit: function () {
                        return v.form();
                    }
                });
            }
        }
    });

}) (jQuery, window, document);