// window.onload = function () {
{

    /**
     * Отправка отзыва
     */
    $('#wndw-001 form .modal__button').click(function () {
        event.preventDefault();

        alert('d');

        let name = $('#wndw-001 form #wndw-001-name').val();
        let text = $('#wndw-001 form #wndw-001-text').val();


        $.ajax({
            url: '/send/review',
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {name: name, text: text},
            dataType: 'JSON',

            success: function (data) {
                console.log(data);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

};