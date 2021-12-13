@component('mail::message')
    # Клиент оплатил заказ онлайн

    @component('mail::panel')
        <p>Номер заказа: {{$order_id}}</p>
    @endcomponent

    Поддержка сайта <br>
    <a href="mailto:work3212@mail.ru">salatoff.ru</a>
@endcomponent
