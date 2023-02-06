jQuery(document).ready(function ($) {
    $("#okmg-data-form").submit(function (e) {


        if ($('#okmg-form-result').is(':visible')) {
            $('#okmg-form-result').slideUp();
        }
        $('#okmg-form-result').removeClass('success warning error');
        e.preventDefault();

        $('.okmg-submit-button').attr('disabled', true);
        $('.okmg-submit-button').addClass('is-disabled');
        $('.okmg-submit-button').text('Submitting form...');
        let formHasErrors = false;

        if (!validateEmail($('#msf-email').val())) {
            console.log('Please enter a valid email.');
            $('#msf-email').addClass('has-error');
            formHasErrors = true;

            showResult(
                'Warning',
                'Email is invalid'
            );
            return false;
        }

        if (!validatePhone($('#msf-phone').val())) {
            console.log('phone is invalid');
            $('#msf-phone').addClass('has-error');
            formHasErrors = true;

            showResult(
                'warning',
                'Phone number is invalid.'
            );
            return false;
        }

        if (formHasErrors) {
            showResult(
                'warning',
                'Please fix errors to continue.'
            );
            return false;
        } else {
            console.log('Submit form');
            let formData = $('#okmg-data-form').serializeArray();
            $.ajax({
                url: $('#okmg-data-form').attr('action'),
                type: "POST",
                data: { formData },
                success: function (result) {
                    $('#okmg-form-result').slideDown();
                    console.log(result);
                    if (result == 'success') {
                        showResult(
                            'success',
                            'Thank you for submitting the form. We will get back to you soon.'
                        );
                    } else {
                        showResult(
                            'error',
                            'There is some error. Please try again later!'
                        );
                    }
                    //rest form and button
                    $('.okmg-input').removeClass('has-error');
                    $('#okmg-data-form').trigger("reset");

                },
                error: function () {
                    showResult(
                        'error',
                        'There is some error. Please try again later!'
                    );
                }
            })
        }
    });

    const validateEmail = (email) => {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    };


    const validatePhone = (phone) => {
        return String(phone)
            .toLowerCase()
            .match(
                /^0[0-8]\d{8}$/g
            );
    };

    const showResult = (elementClass, message) => {
        $('#okmg-form-result').slideDown();
        $('#okmg-form-result').addClass(elementClass);
        $('#okmg-form-result').text(message);


        $('.okmg-submit-button').text('Submit');
        $('.okmg-submit-button').removeClass('is-disabled');
        $('.okmg-submit-button').attr('disabled', false);
    }

})

