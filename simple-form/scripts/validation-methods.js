
var validationMethods = {
    strLengthValidation: function (value, element) {
        var isValid = true;

        if (value == '') {
            isValid = false;
        }
        else if (value.length < 1) {
            isValid = false;
        }

        return isValid;
    }
};