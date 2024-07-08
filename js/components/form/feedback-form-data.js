const formData = new FormData();

let form = {

    // ---------------- params
    contactForm: document.querySelector('#contact-form'),
    $contactForm: $('#contact-form'),
    frontFormWrap: document.querySelector('.feedback'),

    contactSubmit: document.querySelector('#contact-submit'),

    ipInfoUrl: 'https://ipinfo.io',
    headerOffset: 75, // main container offset from header(px) + 3(px)
    mailerUrl: '/wp-content/special/feedback-form-send.php',

    responseTextSuccess: 'Message has been sent', // look at "/wp-content/special/feedback-form-send.php"

    // overlay
    overlayIconSuccessImageSrc: '/wp-content/themes/Etudes/images/form-success.svg',
    overlayTitleSuccessText: 'Thank you for your request!',
    overlaySubtitleSuccessText: 'We will get in touch with you shortly!',
    // overlaySubtitleSuccessText2: 'We look forward to helping you with your work ;)',

    overlayIconErrorImageSrc: '/wp-content/themes/Etudes/images/form-error.svg',
    overlayTitleErrorText: 'Sorry, something went wrong',
    overlaySubtitleErrorText: 'We\'re working on getting this fixed as soon as we can.',

    appendFieldsToFormData : [
        {
            'fieldId' : '#contact-email',
            'fieldName' : 'contactEmail'
        },
        {
            'fieldId' : '#contact-name',
            'fieldName' : 'contactName'
        }
    ],

    freezeOnSubmit: function () {

        form.contactSubmit.setAttribute('disabled', true);
        form.contactSubmit.textContent = 'Sending...';
        document.body.classList.add('modal');

    },


    /*
    * revert submit button title after response
    *
    */
    defaultSubmitStatus: function () {

        form.contactSubmit.removeAttribute('disabled');

    },


    appendFormData : function () {
        form.appendFieldsToFormData.map( function ( field ) {

            const fieldValue = $( field.fieldId ).val();

            formData.delete( field.fieldName );
            formData.append(field.fieldName, fieldValue );
        } );
    },

   
    /*
    * form sent - overlay method
    *
    * @icon - path to image
    * @title - Info sentense
    * @subtitle - fist sub-sentence
    * @subtitle2 - (if present) second sub-sentence
    *
    */
    onFormSentOverlay: function (icon, title, subtitle) {

        let contactResponseOverlay = document.createElement('div');
        contactResponseOverlay.classList.add('contact-response');
        contactResponseOverlay.innerHTML = `
                <div class="contact-response__icon"><img src="${icon}" ></div>
                <h2 class="typo-title contact-response__title">${title}</h2>
                <div class="typo-subtitle_b contact-response__subtitle"><p>${subtitle}</p></div>
                <div class="typo-body contact-response__bot">click to continue...</div>`;

        form.frontFormWrap.insertAdjacentElement('beforebegin', contactResponseOverlay);
        form.frontFormWrap.classList.add('hidden');

    },


    /*
    * reset form inputs after sent
    *
    */
    resetForm: function () {

        form.contactForm.reset();
    },


    /*
    * form server sending
    *
    */
    fetchData: function () {

        form.appendFormData();

        // beforesend status
        form.freezeOnSubmit();

        // ajax request
        fetch(form.mailerUrl, {
            method: 'POST',
            body: formData,
            enctype: 'multipart/form-data'
        })
        // base promise - server response
            .then((response) => {
                // check for response type: text (not json)
                let contentType = response.headers.get('content-type');
                if (contentType.includes('text/html')) {
                    // promise return text data
                    response.text()
                    // text-data promise - check for server feedback message
                        .then(function (serverMessage) {
                            // on success response
                            // if (serverMessage === form.responseTextSuccess) {
                            //     form.onFormSentOverlay(form.overlayIconSuccessImageSrc, form.overlayTitleSuccessText, form.overlaySubtitleSuccessText);
                            //     // on error response
                            // } else {
                            //     form.onFormSentOverlay(form.overlayIconErrorImageSrc, form.overlayTitleErrorText, form.overlaySubtitleErrorText);
                            // }
                        });
                }
            })
            .catch(() => {
                form.onFormSentOverlay(form.overlayIconErrorImageSrc, form.overlayTitleErrorText, form.overlaySubtitleErrorText);
            })
            .finally(() => {
                form.defaultSubmitStatus();
                form.resetForm();
                // form.removeUploadedFile();
            });
    },


    /*
    * close responce overlay
    *
    */
    closeResponceOverlay: function () {

        let overlayWindow = document.querySelector('.contact-response');
        if (overlayWindow !== null) {
            overlayWindow.parentNode.removeChild(overlayWindow);
            form.frontFormWrap.classList.remove('hidden');
            document.body.classList.remove('modal');
        }

    },

};


