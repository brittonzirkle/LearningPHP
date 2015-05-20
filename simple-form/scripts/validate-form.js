
$(document).ready(function () {

    $('#myForm').validate({
        rules: {
            firstName: {
                strLength: true
            },
            food: {
                strLength: true
            },
            messages: {
                food: {
                    strLength: 'Enter a favorite food'
                }
            }
        }
    });

    $.validator.addMethod("strLength", validationMethods.strLengthValidation, 'Value is required');

});