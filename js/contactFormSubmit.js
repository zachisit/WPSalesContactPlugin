/**
 * Submit New Contact Form
 *
 *
 * @dependency jQuery
 * @package bwb-contact
 * @version 1.0.3
 */

jQuery(function($) {
    var $newContactForm = $('#newContactSubmission'),
        $formSubmit = $newContactForm.find('.submit');

    $formSubmit.click(function(e){
        e.preventDefault();
        var $feedbackMessageDiv = $newContactForm.next('.row').find('.feedbackMessage'),
            $spinner = $newContactForm.next('.row').find('.spinningDialog'),
            submit = true;

        $newContactForm.find('.required').each(function(){
            $(this).removeClass('inputError');

            //run through native inputs
            switch($(this).find('input').attr('type')) {
                case 'text':
                case 'email':
                    console.log('text input')
                    if ($(this).find('input').val().length === 0) {
                        $(this).closest('.row').addClass('inputError');
                        buildFeedbackMessage($feedbackMessageDiv,'A required input field is empty',$(this),'fail');
                        submit = false;
                    }
                    break;
                // case 'radio':
                //     var hasSelection = false;
                //
                //     $(this).find('input[type=radio]').each(function() {
                //         if ($(this).is(':checked')) {
                //             hasSelection = true;
                //         }
                //     });
                //     if (!hasSelection) {
                //         $(this).closest('section').addClass('inputError');
                //         buildFeedbackMessage($feedbackMessageDiv,'A required input field is empty',null,'fail');
                //         submit = false;
                //     }
                //     break;
                // case 'number':
                //
                //     if ($(this).find('input').val().length === 0) {
                //         $(this).closest('section').addClass('inputError');
                //         buildFeedbackMessage($feedbackMessageDiv,'A required input field is empty',$(this),'fail');
                //         submit = false;
                //     }
                //
                //     break;
                case 'hidden':
                    submit = true;

                    break;
                //no default
            }
            //check if select option has no value
            if ($(this).find('select').val() === 'Select Category') {
                $(this).closest('.row').addClass('inputError');
                buildFeedbackMessage($feedbackMessageDiv,'A required input field is empty',$(this),'fail');
                submit = false;
            }
        });

        if (submit) {
            spinnerDirection('hide',$spinner);

            return postDataToDatabase(
                new FormData($newContactForm[0]),
                $feedbackMessageDiv,
                $spinner,
                'Contact Success! Redirecting...'
            );
        }
    });

    /**
     * Show or Hide the Loading Spinner
     *
     * @param type
     * @param spinner
     */
    function spinnerDirection(type,spinner) {
        switch(type) {
            case 'show':
                spinner.hide();
                break;
            case 'hide':
                spinner.show();
                break;
        }
    }

    /**
     * Build Feedback Message Content
     *
     * @param element
     * @param message
     * @param focusElement
     */
    function buildFeedbackMessage(element,message,focusElement,type) {
        if (focusElement) {
            focusElement.focus();
        }

        switch (type) {
            case 'success':
                element.addClass('success');
                element.html('<i class="fa fa-angellist"></i> '+message+' Reloading..');
                break;
            case 'fail':
                element.addClass('fail');
                element.html('<i class="fa fa-ban"></i> '+message);
                break;
        }
    }

    /**
     * Post Data
     *
     * @param dataArray
     * @param successDiv
     */
    function postDataToDatabase(dataArray,successDiv,spinner,successMessage) {
        $.ajax({
            type:'POST',
            async: true,
            url:ajax.url,
            data: dataArray,
            dataType: 'json'
        })
            .success(function(response) {
                console.log(response)
                if (response === 0) {
                    buildFeedbackMessage(successDiv,successMessage,null,'success');
                    setTimeout(function(){
                        // location.reload();
                        window.location.replace('http://localhost/bwb/thank-you')
                    } , 1001);
                } else {
                    buildFeedbackMessage(successDiv,'Error: '+status,null,'fail');
                }
            })
            // .always(function(response){
            //     console.log(response)
            //     spinner.hide();
            // })
            .always( function( data,r,status,jqXHR) {
                if(typeof cb === 'function') cb(data);
                //do promise handling

                console.log('always:',data)
                console.log(r,status,jqXHR)
            })
    }

    //hideFeedbackMessage($userResponseForm,'textarea');
});