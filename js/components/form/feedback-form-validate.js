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


validatorEmail();


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

    },
    messages: {
        contactEmail: {
            email: 'Please enter a valid email address.',
            required: 'Email is required'
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
        form.fetchData();
    }

});