/*
* additional jQ-validation method for email:
* add "there is no dot in address" validation
* lib [jquery.validate.min.js])
*
*/
function validatorEmail() {
    $.validator.addMethod('myEmailCheck', function (value, element) {
        let pattern = /(^[-!#$%&'*+/=?^_`{}|~0-9A-Z]+(\.[-!#$%&'*+/=?^_`{}|~0-9A-Z]+)*|^"([\001-\010\013\014\016-\037!#-\[\]-\177]|\\[\001-\011\013\014\016-\177])*")@((?:[A-Z0-9](?:[A-Z0-9-]{0,61}[A-Z0-9])?\.)+(?:[A-Z]{2,6}\.?|[A-Z0-9-]{2,}\.?)$)|\[(25[0-5]|2[0-4]\d|[0-1]?\d?\d)(\.(25[0-5]|2[0-4]\d|[0-1]?\d?\d)){3}\]$/i;
        return this.optional(element) || pattern.test(value);
    }, 'Verify you have a valid email address.');
}


/*
* additional jQ-validation method for phone:
* lib [jquery.validate.min.js])
* https://blog.knoldus.com/intl-tel-input/
*
*/

// validatorEmail();


/*
* form validation
* lib [jquery.validate.min.js])
*
*/
form.$contactForm.validate({
    // focusCleanup: true, // clear error when user focuses back in field
    focusInvalid: false,
    errorElement: 'span',
    errorClass: 'contact-error',
    // ignore: '.ignore',
    ignore: [],
    rules: {
        contactEmail: {
            email: true,
            maxlength: 77,
            required: true,
            myEmailCheck: true,
        },

        contactInstructions: {
            required: true,
            minlength: 1,
            maxlength: 8000,
        },
        // conditions from [jquery.validate.file.js] lib
        contactFile: {
            fileType: {
                types: [
                    'image/png',
                    'image/jpeg',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'application/zip',
                    'application/pdf',
                    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                    'application/vnd.ms-powerpoint',
                    'text/plain',
                    'application/x-7z-compressed',
                    'application/x-zip-compressed',
                    'application/rtf',
                    'application/vnd.oasis.opendocument.spreadsheet',
                    'application/vnd.oasis.opendocument.text',
                    'image/bmp',
                    'application/vnd.rar'
                ]
            },
            maxFileSize: {
                'unit': 'B',
                'size': form.MAX_FILE_SIZE
            }
        },

        /*hiddenRecaptcha: {
            required: function () {
                return grecaptcha.getResponse() === '';
            }
        },*/
    },
    messages: {
        contactEmail: {
            email: 'Please enter a valid email address.',
            required: 'Email is required'
        },

        /*phone: {
            required: 'Phone number is required field.'
        },*/
        contactFile: {
            maxFileSize: 'File must be less than 50MB',
            fileType: 'Unacceptable file format.',
            required: 'This field is required'
        },
            
    },
    // submit click
    invalidHandler: function (invalidObject, validatorObject) {

        // on any errors - scroll up to first of them
        if (!validatorObject.numberOfInvalids()) {
            return;
        }
        animatejQueryScroll(validatorObject.errorList[0].element, form.headerOffset, 500);

    },

    submitHandler: function () {
        // if (grecaptcha.getResponse() !== '') {
        form.fetchData();
        // }
    }

});