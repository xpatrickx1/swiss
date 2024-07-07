const formData = new FormData();

let form = {

    // ---------------- params
    contactForm: document.querySelector('#contact-form'),
    $contactForm: $('#contact-form'),
    frontFormWrap: document.querySelector('.feedback'),

    $contactSubject: $('#contact-subject'),
    subjectOptionObject: {
        placeholder: 'Your subject',
        minimumResultsForSearch: Infinity,
    },
    $contactService: $('#contact-service'),
    serviceOptionObject: {
        placeholder: 'Service',
        minimumResultsForSearch: Infinity,
    },

    contactSubmitWrap: document.querySelector('.contact-submit__wrap'),
    contactSubmit: document.querySelector('#contact-submit'),

    // file input
    fileList : [],
    MAX_FILE_SIZE : 52428800,      //B
    MIN_FILE_SIZE : 10240,      //B
    contactFileInput: document.querySelector('#contactFile'),
    contactFileInputLabel: document.querySelector('.contact-file__label'),
    contactFileWrap: document.querySelector('.contact-file__wrap'),
    fileBox: document.querySelector('.file__box'),
    fileItem: document.querySelectorAll('.file__item'),
    fileClose: document.querySelectorAll('.file__close'),
    cutBorder: 27,
    errorTextForLimitingTheNumberOfFiles : 'There are too many files. Please send them to our email',
    contactInstruction : '#contact-instructions',

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
    defaultInstructionText : 'The instructions are included in the files attached.',

    // -------------------------------- methods

    /*
    * press in input only digit symbols
    *
    * @jqInput - jQ input selector
    * @maxNumb - maximum symbols
    *
    */
    pressOnlyDigits: function (jqInput, maxNumb) {

        jqInput.on('keypress keyup blur', function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ''));
            if ((event.which < 48 || event.which > 57) || ($(this).val().length > maxNumb)) {
                event.preventDefault();
            }
        });

    },

    /*
    * initialize telephone input like intlTelInput-object lib
    * http://websketches.ru/plugins/international-telephone-input
    *
    * @inputPhone - input selector
    * @ipInfoUrl - URL ('https://ipinfo.io')
    *
    */
    initTelInput: function (inputPhone, ipInfoUrl) {

        inputPhone.intlTelInput({
            allowDropdown: true,
            initialCountry: 'auto',
            geoIpLookup: function (success) {
                $.get(
                    ipInfoUrl,
                    function () {
                    }, 'jsonp').always(function (resp) {
                    let countryCode = (resp && resp.country) ? resp.country : '';
                    success(countryCode);
                });
            },
            separateDialCode: true,
        });

    },


    /*
    * validation trigger select-input ( under select2-lib )
    *
    * @jqSelectInput - jQ select-input selector
    * @select2optionObject - select2-lib options, wraped in object
    *
    */
    select2change: function (jqSelectInput, select2optionObject) {

        jqSelectInput.select2(select2optionObject).on('change', function () {
            // loose focus for init select-input-lib changes
            $(this).blur();
        });

    },


    /*
    * freeze body, form and button during server message loading
    *
    */
    freezeOnSubmit: function () {

        form.contactSubmit.setAttribute('disabled', true);
        form.contactSubmit.textContent = 'Sending... Please, wait';
        document.body.classList.add('modal');

    },


    /*
    * revert submit button title after response
    *
    */
    defaultSubmitStatus: function () {

        form.contactSubmit.textContent = 'Free request';
        form.contactSubmit.removeAttribute('disabled');

    },


    appendFormData : function () {
        form.appendFieldsToFormData.map( function ( field ) {

            const fieldValue = $( field.fieldId ).val();

            formData.delete( field.fieldName );
            formData.append(field.fieldName, fieldValue );
        } );
    },

    insertFileItem : function( fileInputWrap, fileName ) {                   // create file-name and insert it after file-input in file-name-wrap
        const fileItem = document.createElement( 'div' );
        fileItem.className = 'file__item';
        fileItem.innerHTML = `
                        <span class="file__box">${fileName}</span>
                        <span class="file__close"></span>
                    `;

        fileInputWrap.append( fileItem );
    },

    /*
    * render file input loaded file
    *
    *
    *
    */
    renderFileInputResult: function (fileInput, fileInputLabel) {

        fileInput.addEventListener('change', function (e) {

            if (!e.target.files.length) {
                return;
            }

            $( '#contactFile' ).valid();

            const targetFiles = Array.from( e.target.files ).filter( item => item.size < form.MAX_FILE_SIZE );

            $( 'textarea.contact-text' ).removeClass( 'contact-error' );
            $( '.contact-file__wrap' ).removeClass( 'error' );

            for( let i = 0; i < targetFiles.length; i++ ) {

                if( form.fileList.length >= 6 ) {

                    form.appendError( '.contact-file__label', 'contactFile', 'files-too-big', form.errorTextForLimitingTheNumberOfFiles );

                    fileInputLabel.classList.add( 'contact-error' );
                    $( '.contact-file__wrap' ).addClass( 'error' );
                    return;

                } else {

                    if( $( '#contactFile' ).valid() ) {
                        const file = targetFiles[i];

                        const newList = [ ...form.fileList, file ];
                        form.fileList = newList;
                    }

                }

                form.renderFileItem();

                form.checkInstruction();

            }

            fileInputLabel.classList.add( 'loaded' );

            // $( 'textarea.contact-text' ).removeClass( 'contact-error' );

            if ( fileInput.classList.contains( 'contact-error' ) ) {
                fileInputLabel.classList.add( 'contact-error' );
                $( '.contact-file__wrap' ).addClass( 'error' );
            } else {
                fileInputLabel.classList.remove( 'contact-error' );
                $( '.contact-file__wrap' ).removeClass( 'error' );
            }

            e.target.value = '';

        });

    },

    getFileName : function( fileItem ) {                // create file-name and insert it after file-input in file-name-wrap
        let fileName = fileItem.name;
        // cut long file name
        if (fileName.length > form.cutBorder) {
            fileName = fileName.substring(0, form.cutBorder);
            fileName = fileName + '...';
        }

        form.insertFileItem( form.contactFileWrap, fileName );
    },

    renderFileItem : function() {
        $( '.file__item' ).remove();
        formData.delete( 'userFiles[]' );

        // add only file name without path - as string
        for( let i = 0; i < form.fileList.length; i++ ) {

            formData.append( 'userFiles[]', form.fileList[i] );

            form.getFileName( form.fileList[i] );

        }
    },

    checkInstruction : function () {

        const insertInstructionText = text => $( form.contactInstruction ).val( text ).valid();
        const getInstructionText = $( form.contactInstruction ).val();

        if( form.fileList.length && !getInstructionText  ) {
            insertInstructionText( form.defaultInstructionText );
        } else if( !form.fileList.length && getInstructionText == form.defaultInstructionText ) {
            insertInstructionText( '' );
        }

    },
    
    appendError : function ( fieldToAppend, idForErrorField, classForField, errorText ) {
        const appendField = `<span id="${idForErrorField}-error" class="${classForField}">${errorText}</span>`;

        $( fieldToAppend ).append( appendField );
    },

    /*
    * clear all fields about file upload
    *
    */
    removeUploadedFile: function () {
        form.contactFileWrap.addEventListener('click', function (ev) {

            const fileItems = Array.from( document.querySelectorAll('.file__close') );
            
            if (ev.target.classList.contains('file__close')) {

                const fileItemIndex = fileItems.indexOf( ev.target );

                delete form.fileList[ fileItemIndex ];
                form.fileList = form.fileList.filter( item => item !== false );

                form.renderFileItem();

                form.checkInstruction();

                form.contactFileInputLabel.classList.remove('contact-error');
                form.contactFileInputLabel.classList.remove('loaded');

            }
        });

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

        animatejQueryScroll($('#frontForm'), 90, 150);

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
                            if (serverMessage === form.responseTextSuccess) {
                                form.onFormSentOverlay(form.overlayIconSuccessImageSrc, form.overlayTitleSuccessText, form.overlaySubtitleSuccessText);
                                // on error response
                            } else {
                                form.onFormSentOverlay(form.overlayIconErrorImageSrc, form.overlayTitleErrorText, form.overlaySubtitleErrorText);
                            }
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


