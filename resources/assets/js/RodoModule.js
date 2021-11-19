import intlTelInput from 'intl-tel-input';
import utilsScript from 'intl-tel-input/build/js/utils';

const phone = document.querySelector("#phone");
let iti = intlTelInput(phone, {
    utilsScript: utilsScript,
    initialCountry: 'pl',
});

const marker = $(".popup__marker");
const popup = $(".popup--choose");
const popupPhone = $(".popup--phone");
const popupEmail = $(".popup--email");
const popupSuccess = $(".popup--success");
const popupError = $(".popup--error");

function onSubmitEmail(token) {
    let form = document.getElementById("popup__form-email");
    let inputs = form.querySelectorAll('input');
    let validation = Array.prototype.filter.call(inputs, function(input) {
        validate(input);
        input.addEventListener('change', function(event) {
            if (!validate(input)) {
                event.preventDefault();
                event.stopPropagation();
            }
        }, false);
    });
    if (isValid(form)) {
        submitForm(form, false);
    }
}

function onSubmitPhone(token) {
    let form = document.getElementById("popup__form-phone");
    let inputs = form.querySelectorAll('input');
    let validation = Array.prototype.filter.call(inputs, function(input) {
        validate(input);
        input.addEventListener('change', function(event) {
            if (!validate(input)) {
                event.preventDefault();
                event.stopPropagation();
            }
        }, false);
    });
    if (isValid(form)) {
        submitForm(form, true);
    }
}

function validate(input) {
    input.classList.remove('is-invalid')
    input.classList.remove('is-valid')

    let validate = false;
    if (input.checkValidity() === false) {
        input.classList.add('is-invalid')
    } else {
        if (input.id === 'phone' && !iti.isValidNumber()) {
            input.classList.add('is-invalid')
        } else {
            input.classList.add('is-valid')
            validate = true;
        }
    }
    return validate;
}

function isValid(form) {
    return (form.querySelectorAll("input.is-invalid").length === 0);
}

function submitForm(form, phone) {
    const xhr = new XMLHttpRequest();
    let formData = new FormData(form);
    if (phone) {
        formData.append('phone', iti.getNumber());
    }

    xhr.addEventListener( "load", function(event) {
        popupPhone.fadeOut();
        popupEmail.fadeOut();
        if (xhr.status === 200) {
            popupSuccess.fadeIn();
        } else {
            popupError.fadeIn();
        }
    });

    xhr.addEventListener( "error", function( event ) {
        popupPhone.fadeOut();
        popupEmail.fadeOut();
        popupError.fadeIn();
    });

    xhr.open("POST", form.getAttribute('action'));
    xhr.send(formData);
}

$(window).on('load', function() {
    window.onSubmitEmail = onSubmitEmail;
    window.onSubmitPhone = onSubmitPhone;
});

$(function () {
    marker.click(function () {
        popup.fadeIn();
    });

    $("button[name='phone']").click(function() {
        popup.fadeOut();
        popupPhone.fadeIn();
    });

    $("button[name='email']").click(function() {
        popup.fadeOut();
        popupEmail.fadeIn();
    });

    $(".popup__body").click(function (e) {
        e.stopPropagation();
    });

    $(".popup__overlay, .popup__close").click(function () {
        popup.fadeOut();
        popupPhone.fadeOut();
        popupEmail.fadeOut();
        popupSuccess.fadeOut();
        popupError.fadeOut();
    });

    $(".popup__back").click(function () {
        popup.fadeIn();
        popupPhone.fadeOut();
        popupEmail.fadeOut();
    });
});
