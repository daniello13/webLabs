function remError(idInp, idRes, text) {
    $(idInp).removeClass('error').addClass('not_error');
    $(idInp).next(idRes).text(text)
        .addClass('non-error-res')
        .removeClass('error-res')
        .animate({ 'paddingLeft': '10px' }, 400)
        .animate({ 'paddingLeft': '5px' }, 400);
}

function addError(idInp, idRes, text) {
    $(idInp).removeClass('not_error').addClass('error');
    $(idInp).next(idRes).text(text)
        .removeClass('non-error-res')
        .addClass('error-res')
        .animate({ 'paddingLeft': '10px' }, 400)
        .animate({ 'paddingLeft': '5px' }, 400);
}

$(document).ready(function() {
    var regexp = /^[a-zA-Z]{2,64}$/;
    $('#name').blur(function() {
        if ($('#name').val().length > 2 && $('#name').val() != '' && regexp.test($('#name').val())) {
            remError('#name', '#resName', 'Данные об имени введены верно');
        } else {
            addError('#name', '#resName', 'Данные об имени введены неверно');
        }
    });
    $('#surname').blur(function() {
        if ($('#surname').val().length > 2 && $('#surname').val() != '' && regexp.test($('#surname').val())) {
            remError('#surname', '#resSur', 'Данные об фамилии введены верно');
        } else {
            addError('#surname', '#resSur', 'Данный о фамилии введены неверно');
        }
    });

    $('#seсondname').blur(function() {
        if ($('#seсondname').val().length > 2 && $('#seсondname').val() != '' && regexp.test($('#seсondname').val())) {
            remError('#seсondname', '#resSecond', 'Данные об отчестве введены верно');
        } else {
            addError('inpu#seсondname', '#resSecond', 'Данный об отчестве введены неверно');
        }
    });

    $('#form').submit(function() {

        if ($('.not_error').length == 3) {
            return true;
        } else {
            return false;
        }
    });

    $('#CheckAll').bind('click', function() {
        $("[type=checkbox]").prop('checked', true);
    });

    $('#disableCheckAll').bind('click', function() {
        $("[type=checkbox]").prop('checked', false);
    });

    $('#reverseCheckAll').bind('click', function() {
        var arr = [];
        arr = $("[type=checkbox]");
        $(arr).each(function() {
            if ($(this).prop('checked') == true) {
                $(this).prop('checked', false);
            } else {
                $(this).prop('checked', true);
            }
        });
    });
});