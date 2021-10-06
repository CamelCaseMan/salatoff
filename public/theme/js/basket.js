/**
 * Добавить товар в корзину
 */
$('.btn_buy').click(function () {
    event.preventDefault();
    let id = 13;

    $.ajax({
        url: '/basket/add',
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {productId: id},
        dataType: 'JSON',

        success: function (data) {
            console.log(data);
        },
        error: function (msg) {
            console.log(msg);
        }
    });
});
