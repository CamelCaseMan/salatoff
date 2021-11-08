window.onload = function () {

    /**
     * Отправка кода на телефон
     */
    $('#wndw-signin #btn_code').click(function () {
        event.preventDefault();
        alert('d');
        $.ajax({
            url: '/generate-code/login',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            dataType: 'JSON',

            success: function (data) {
                console.log(data);

            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    /**
     * Вход
     */
    $('#wndw-signin form .modal__button').click(function () {
        event.preventDefault();

        let name = 'Иван';
        let phone = $('#wndw-signin form .input-phone');
        let code = $('#wndw-signin form input[name="code"]');


        if (phone.val() == '') {
            phone.addClass('error_form');
            return false;
        }

        phone = phone.val().replace(/[^+\d]/g, '');

        console.log(name);
        console.log(phone);
        console.log(code.val());

      //  return false;

        $.ajax({
            url: '/register',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {phone: phone, name: name, code: code.val()},
            dataType: 'JSON',

            success: function (data) {
                console.log(data);
                //window.location.href = '/customer';

            },
            error: function (msg) {
                console.log(msg['responseJSON']['errors']);
                // password.addClass('error_form');
                // phone.addClass('error_form');
            }
        });
    });

};