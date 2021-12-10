<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="message-box" style="font-family: sans-serif; padding: 20px; margin: 0 auto; color: #252525;">
        <div class="message-section" style="margin-bottom: 20px;">
            <h1 class="main-title" style="margin-bottom: 20px; font-size: 2rem;">Новый заказ <span style="color: #A2CD3A;">#{{$order->id}}</span></h1>
        </div>

        <div class="message-section" style="margin-bottom: 20px;">
            <div class="title" style="font-weight: 700; margin-bottom: 10px; font-size: 1.1rem; color: #A2CD3A;">Данные клиента</div>

            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Имя клиента</span>
                {{$order->name}}
            </div>

            @if(isset($order->organization))
            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Организация</span>
                {{$order->organization}}
            </div>
            @endif

            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Телефон</span>
                {{$order->phone}}
            </div>

            @if(isset($order->email))
            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Почта</span>
                {{$order->email}}
            </div>
            @endif

            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Дата доставки</span>
                {{ date("d-m-Y", strtotime($order->delivery_date))}}
            </div>
            @foreach($order->getInfoDelivery() as $key => $text)
                @if(!is_null($text))
                    <div class="char" style="padding: 6px 0;">
                        <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">{{$key}}</span>
                        {{$text}}
                    </div>
                @endif
            @endforeach
        </div>

        <div class="message-section" style="margin-bottom: 20px;">
            <div class="title" style="font-weight: 700; margin-bottom: 10px; font-size: 1.1rem; color: #A2CD3A;">Состав заказа</div>

            <table class="table" style="margin-bottom: 10px; border-collapse: collapse;">
                <tr class="thead" style="background-color: #A2CD3A;">
                    <td style="font-family: sans-serif; padding: 6px; font-size: 0.8rem; color: white; border: 1px solid rgba(37, 37, 37, 0.2);">Название</td>
                    <td style="text-align: right; font-family: sans-serif; padding: 6px; font-size: 0.8rem; color: white; border: 1px solid rgba(37, 37, 37, 0.2);">Количество</td>
                    <td style="text-align: right; font-family: sans-serif; padding: 6px; font-size: 0.8rem; color: white; border: 1px solid rgba(37, 37, 37, 0.2);">Цена</td>
                </tr>
                @foreach($order->products as $key => $product)
                <tr>
                    <td style="border: 1px solid rgba(37, 37, 37, 0.2); font-family: sans-serif; padding: 6px; color: #252525;">{{$key + 1}}. {{$product->name}}</td>
                    <td style="border: 1px solid rgba(37, 37, 37, 0.2); text-align: right; font-family: sans-serif; padding: 6px; color: #252525;">{{$product->pivot->count}} шт</td>
                    <td style="border: 1px solid rgba(37, 37, 37, 0.2); text-align: right; font-family: sans-serif; padding: 6px; color: #252525;">{{$product->price}} руб.</td>
                </tr>
                @endforeach
            </table>

            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Итого</span>
                {{$order->total}} руб.
            </div>
            @if(isset($order->cupon))
            <div class="char" style="padding: 6px 0;">
                <span class="prefix" style="font-size: 0.8rem; color: rgba(37, 37, 37, 0.6); margin-bottom: 5px; margin-right: 6px;">Была получена скидка по купону</span>
                {{$order->cupon->discount}} %
            </div>
            @endif
        </div>


    </div>

</body>

</html>