if ($(window).width() < 768) {
    $('.collapse').on('show.bs.collapse', function() {
        $('.site_logo').css('display', 'block');
        $('.navbar_menu1').removeClass('pull-left');
        $('.navbar_menu2').removeClass('pull-right');
    });

    $('.collapse').on('hide.bs.collapse', function() {
        $('.site_logo').css('display', 'none');
        $('.navbar_menu1').addClass('pull-left');
        $('.navbar_menu2').addClass('pull-right');
    });
} else {
    $('.site_logo').css('display', 'block');
    $('.navbar_menu1').addClass('pull-left');
    $('.navbar_menu2').addClass('pull-right');
}

/*==================================================================*/
$('#contact-form').bootstrapValidator({
        trigger: 'blur',
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Your name is required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Your first name cannot have numbers or symbols'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The phone number is required'
                    },
                    regexp: {
                        regexp: /^([0-9]){10}$/,
                        message: 'The input is not a valid mobile number'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'Message is required'
                    }
                }
            }
        },
        live: 'enabled',
        message: 'This value is not valid',
        submitButton: '$contact-form button[type="submit"]'
            // submitHandler: function(validator, form, submitButton) {
            //     $.ajax({
            //         type: 'POST',
            //         url: 'sendmail.php',
            //         data: $(form).serialize(),
            //         success: function(result) {
            //             $("#contact-form").find('.alert').html('Your message sent successfully your registered mail id: ' + validator.getFieldElements('mail').val()).show();
            //             $("#contact-form").data('bootstrapValidator').resetForm();
            //         }
            //     });
            //     // return false;
            // }
    })
    .on('success.form.bv', function(e) {

        // Prevent submit form
        e.preventDefault();
        var $form = $(e.target),
            validator = $form.data('bootstrapValidator');
        $.ajax({
            type: 'POST',
            url: 'sendmail.php',
            data: $form.serialize(),
            success: function(result) {
                $('.alert').html('Your message sent successfully your entered mail id: ' + $("input[name='email']").val() + '<button type="button" class="close" data-dismiss="alert">×</button>').show();
                $('.alert').fadeIn(100);
                $('.alert').delay(5000).fadeOut(1000);
                // validator.resetForm();
                $('#contact-form')[0].reset();
            }
        });
        //$form.find('.alert').html('Thanks for signing up. Now you can sign in as ' + validator.getFieldElements('email').val()).show();
    });
// .on('error.field.bv', '[name="phone"]', function(e, data) {
//     // change the data-bv-trigger value to keydown
//     $(e.target).attr('data-bv-trigger', 'keydown');
//     // destroy the plugin
//     // console.info(data.bv.getOptions());
//     data.bv.destroy();
//     // console.info(data.bv.getOptions());
//     // initialize the plugin
//     $('#contact-form').bootstrapValidator(data.bv.getOptions());
// });