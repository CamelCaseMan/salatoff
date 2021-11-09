window.onload = function () {

    /**
     * Вход
     */
    $('#wndw-login form .modal__button').click(function () {
        event.preventDefault();

        let phone = $('#wndw-login form .input-phone');
        let password = 'OwhIoqU6';
        let code = $('#wndw-login form input[name="code_2"]');


        phone = phone.val().replace(/[^+\d]/g, '');
        console.log(phone);
        console.log(code.val());

        $.ajax({
            url: '/login',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {phone: phone, password: password, code: code.val()},
            dataType: 'JSON',

            success: function (data) {
                window.location.href = '/';

            },
            error: function (msg) {
                console.log(msg['responseText']);
               // console.log(msg['responseJSON']['errors']);
            }
        });
    });

};