window.onload = function () {

    let a = $('#wndw-login form .modal__button');
    console.log(a);
    /**
     * Вход
     */
    $('#wndw-login form .modal__button').click(function () {
        event.preventDefault();
        alert('d');

        let phone = $('#wndw-login form .input-phone');
        let password = 'OwhIoqU6';
        /*let code = $('#wndw-signin form input[name="code"]');*/


        phone = phone.val().replace(/[^+\d]/g, '');


        console.log(phone);


        //  return false;

        $.ajax({
            url: '/login',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {phone: phone, password: password /*code: code.val()*/},
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