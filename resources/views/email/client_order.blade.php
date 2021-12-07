@component('mail::message')
    # Получен новый отзыв, проверьте

    @component('mail::panel')
        <p>Имя клиента: {{$order->name}}</p>
    @endcomponent


    Поддержка сайта <br>
    <a href="mailto:work3212@mail.ru">salatoff.ru</a>
@endcomponent
