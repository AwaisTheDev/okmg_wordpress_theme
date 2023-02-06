jQuery(document).ready(function ($) {
    $("#okmg-data-form").submit(function (e) {

        e.preventDefault();
        let formHasErrors = false;


        // if (!validateEmail($('#msf-email').val())) {
        //     console.log('email is invalid');
        //     $('#msf-email').addClass('has-error');
        //     formHasErrors = true;
        // }

        // if (!validatePhone($('#msf-phone').val())) {
        //     console.log('phone is invalid');
        //     $('#msf-phone').addClass('has-error');
        //     formHasErrors = true;
        // }

        if (formHasErrors) {
            console.log('Please fix error in the form to continue');
            return false;
        } else {
            console.log('Submit form');
            let formData = $('#okmg-data-form').serializeArray();
            $.ajax({
                url: $('#okmg-data-form').attr('action'),
                type: "POST",
                data: { formData },
                success: function (result) {
                    console.log("result= " + result);
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

    console.log('s');
})