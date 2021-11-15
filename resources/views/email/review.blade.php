@component('mail::message')
# Получен новый отзыв, проверьте

@component('mail::panel')
    <p>Имя автора: {{$review->name}}</p>
    <p>Текст отзыва:{{$review->text}}</p>
@endcomponent

@component('mail::button', ['url' => $url, 'color' => 'green'])
Включить данный отзыв
@endcomponent



Поддержка сайта <br>
<a href="mailto:work3212@mail.ru">salatoff.ru</a>
@endcomponent
