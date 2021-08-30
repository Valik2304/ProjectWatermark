var divModal = document.querySelector('#basicModal');
var form = divModal.querySelector('form');
var validateButton = divModal.querySelector('.validateButton');
var phone = form.querySelector('#emailmessagephone').value;
var fields = form.querySelectorAll('.field');
var fieldsLength = fields.length;
var label = form.querySelectorAll('label');
var input = form.querySelector('.phone');
var regular = /[0-9+\-()\s]/i;
var regularletters = /[a-zа-яє]/i;
var regularexception = /[_!?@#$%&<>.,;"₴]/i;
var mainModal = document.querySelector('.mainModal');


var removeValidation = function () {
    var errors = form.querySelectorAll('.error');
    for (var i = 0; i < errors.length; i++) {
        errors[i].remove();
    }
};

var generateError = function (text,) {
    var error = document.createElement('div');
    error.className = 'error';
    // error.style.color = 'red';
    error.style.fontSize = 10 + 'px';
    error.style.textAlign = 'left';
    error.style.marginBottom = -5 + 'px';
    // error.style.marginTop = -3 + 'px';
    error.style.marginLeft = 27 + 'px';
    error.style.marginTop = -10 + 'px';
    // error.style.textTransform = 'uppercase';
    error.innerHTML = text;
    return error
};


var checkFields = function () {
    for (var e = 0; e < fieldsLength; e++) {
        if (!fields[e].value.match(regular) || fields[e].value.match(regularletters) || fields[e].value.match(regularexception)) {
            event.preventDefault();
            var errormessage = 'Номер введено не коректно  ' + fields[e].value;
            var error = generateError(errormessage);
            error.style.color = "red";
            label[e].parentElement.appendChild(error);

        } else {
            if (fields[e].value.length < 10 || fields[e].value.length > 20) {
                var successmessage = 'Номер введено HE коректно, кількість символів - ' + fields[e].value.length;
                event.preventDefault();
            } else {
                var successmessage = 'Номер введено  коректно, кількість символів - ' + fields[e].value.length;
                mainModal.classList.toggle('show');
                validateButton.setAttribute('data-target', '#messageModal');
            }
            var error = generateError(successmessage);
            error.style.color = "green";
            label[e].parentElement.appendChild(error);
        }
    }
};

validateButton.addEventListener('click', function (event) {
    console.log('ok');
    removeValidation();

    checkFields();

    // checkFile();
});

